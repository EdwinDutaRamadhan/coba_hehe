<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\StoreStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateStoreRequest;

class StoreController extends Controller
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
    public function store(StoreStoreRequest $request)
    {       
        dd($request->get('lat',0.0));
        try {
            Store::create([
                'name' => $request->get('name'),
                'store_code' => $request->get('store_code'),
                'branch_code' => $request->get('branch_code'),
                'location_id' => $request->get('location'),
                'plastic_product_id' => $request->get('plastic_product'),
                'address' => $request->get('address'),
                'phone_number' => $request->get('phone_number'),
                'enable_deficit'=>$request->get('enable_deficit',0),
                'lat' => $request->get('lat',0.0),
                'lng' => $request->get('lng',0.0),
                'iud_status' => 'd',
                'main_warehouse' => 0,
            ]);
            Alert::html('Insert berhasil', 'Toko <strong>' . request()->name . '</strong> berhasil ditambahkan', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            Alert::html('Insert gagal', 'Toko <strong>' . request()->name . '</strong> berhasil ditambahkan', 'error');
        }
        return to_route('pengaturan-stok.toko.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    public function stock(){
        // dd(request()->store_id);
        return view('content.pengaturan-stok.toko.stock',[
            'store_id' => request()->store_id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        try {
            $id = Crypt::decryptString(request()->store_id);
        } catch (\Throwable $th) {
            //throw $th;
            abort(404);
            Log::error($th);
        }
        return view('content.pengaturan-stok.toko.edit', [
            'data' => Store::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        try {
            Store::where('store_id',Crypt::decryptString($request->update_token))->update([
                'name' => $request->get('name'),
                'store_code' => $request->get('store_code'),
                'branch_code' => $request->get('branch_code'),
                'location_id' => $request->get('location'),
                'plastic_product_id' => $request->get('plastic_product'),
                'address' => $request->get('address'),
                'phone_number' => $request->get('phone_number'),
                'enable_deficit'=>$request->get('enable_deficit',0),
                'lat' => $request->get('lat',0.0),
                'lng' => $request->get('lng',0.0),
                'iud_status' => 'd',
                'main_warehouse' => 0,
            ]);
            Alert::html('Update berhasil', 'Toko <strong>' . request()->name . '</strong> berhasil diperbarui', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            Alert::html('Update gagal', 'Toko <strong>' . request()->name . '</strong> berhasil diperbarui', 'error');
            return back();
        }
        return to_route('store.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $destroy_token = Crypt::decryptString(request()->delete_token);
        try {
            if (request()->status == 'd') {
                Store::where('store_id', $destroy_token)->update([
                    'iud_status' => 'i'
                ]);
                Alert::html('Mengaktifkan berhasil', 'Store <strong>' . request()->name . '</strong> berhasil diaktifkan', 'success');
            } else {
                Store::where('store_id', $destroy_token)->update([
                    'iud_status' => 'd'
                ]);
                Alert::html('Menonaktifkan berhasil', 'Store <strong>' . request()->name . '</strong> berhasil dinonaktifkan', 'success');
            }
        } catch (\Throwable $th) {
            //throw $th;
            if (request()->status == 'd') {
                Alert::html('Mengaktifkan gagal', 'Store <strong>' . request()->name . '</strong> gagal diaktifkan', 'error');
            } else {
                Alert::html('Menonaktifkan gagal', 'Store <strong>' . request()->name . '</strong> gagal dinonaktifkan', 'error');
            }
            Log::error($th);
        }
        return back();
    }
}
