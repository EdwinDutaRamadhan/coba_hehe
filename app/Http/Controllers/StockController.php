<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Requests\StoreStockRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateStockRequest;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $berhasil = 0;
        $gagal = 0;
        //Stock::updateOrCreate(['store_id'=>1337,'product_id'=>12004],['current_stock'=>50,'price'=>'99','iud_status'=>'i'])     
        $collection = (new FastExcel)->import(request()->file('file')->getPathname());
        // dd($collection);
        try {
            foreach ($collection as $c) {
                if (Product::where('sku', $c['SKU Produk'])->exists()) {
                    Stock::updateOrCreate([
                        'store_id' => $request->store,
                        'product_id' => Product::where('sku', $c['SKU Produk'])->pluck('product_id')->first()
                    ], [
                        'current_stock' => $c['Stock'],
                        'price' => $c['Harga'],
                        'iud_status' => 'i',
                        'f_coret' => 'F',
                        'discount' => 0,
                    ]);
                    $berhasil++;
                }else{
                    $gagal++;
                }
            }
            Alert::html('Import berhasil', $berhasil.' Stok berhasil dan '.$gagal.' Stok gagal', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            Alert::html('Import Gagal', $berhasil.' Stok berhasil dan '.$gagal.' Stok gagal', 'error');
        }
        return back();
        // dd($collection->count(),request()->import_token);
        // for($i=0;$i<$collection->count();$i++){
        //     AkoinItemSyarat::create([
        //         'id_master' => request()->import_token,
        //         'plu' => $collection[$i]['Plu'],
        //         'tgl_input' => Carbon::now()->format('Y-m-d H:i:s.uO')
        //     ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
