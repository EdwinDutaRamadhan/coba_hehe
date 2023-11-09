<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $destroy_token = Crypt::decryptString(request()->delete_token);
        try {
            if (request()->status == 'd') {
                Product::where('product_id', $destroy_token)->update([
                    'iud_status' => 'i'
                ]);
                Alert::html('Mengaktifkan berhasil', 'Product ' . request()->name . ' berhasil diaktifkan', 'success');
            } else {
                Product::where('product_id', $destroy_token)->update([
                    'iud_status' => 'd'
                ]);
                Alert::html('Menonaktifkan berhasil', 'Product ' . request()->name . ' berhasil dinonaktifkan', 'success');
            }
        } catch (\Throwable $th) {
            //throw $th;
            if (request()->status == 'd') {
                Alert::html('Mengaktifkan gagal', 'Product ' . request()->name . ' gagal diaktifkan', 'error');
            } else {
                Alert::html('Menonaktifkan gagal', 'Product ' . request()->name . ' gagal dinonaktifkan', 'error');
            }
            Log::error($th);
        }
        return back();
    }
}
