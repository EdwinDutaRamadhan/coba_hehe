<?php

namespace App\Http\Controllers;

use App\Models\TagPlu;
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
        try {
            Product::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'brand_id' => $request->get('brand_id'),
                'category_id' => $request->get('category_id'),
                'preorder_category_id' => $request->get('preorder_category_id'),
                'weight' => $request->get('weight',0),
                'sku' => $request->get('sku'),
                'plu' => $request->get('plu'),
                'threshold' => $request->get('threshold',0),
                'iud_status' => $request->get('status') == 1 ? 'i' : 'd', 
            ]);
            Alert::html('Insert berhasil', 'Product <strong>' . request()->name . '</strong> berhasil ditambahkan', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            Alert::html('Insert gagal', 'Product <strong>' . request()->name . '</strong> gagal ditambahkan', 'error');
        }
        if ($request->tags != null) {
            //tags not null
            $data = explode(',', $request->tags);
            try {
                for ($i = 0; $i < count($data); $i++) {
                    TagPlu::updateOrCreate([
                        'plu' => $request->plu,
                        'value' => $data[$i]
                    ], [
                        'plu' => $request->plu,
                        'value' => $data[$i],
                        'iud_status' => 'i'
                    ]);
                }
            } catch (\Throwable $th) {
                //throw $th;
                Log::error($th);
            }
        }
        return to_route('productmass.index');
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
    public function edit()
    {
        // $data = Product::find(Crypt::decryptString(request()->product_id));
        try {
            $id = Crypt::decryptString(request()->product_id);
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            abort(404);
        }
        return view('content.manajemen-produk.productmass.edit', [
            'product' => Product::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product_id = Crypt::decryptString($request->update_token);
        try {
            Product::where('product_id', $product_id)->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'brand_id' => $request->get('brand_id'),
                'category_id' => $request->get('category_id'),
                'preorder_category_id' => $request->get('preorder_category_id'),
                'weight' => $request->get('weight',0),
                'sku' => $request->get('sku'),
                'plu' => $request->get('plu'),
                'threshold' => $request->get('threshold',0),
                'iud_status' => $request->get('status') == 1 ? 'i' : 'd', 
            ]);
            Alert::html('Update berhasil', 'Product <strong>' . request()->name . '</strong> berhasil diperbarui', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            Alert::html('Update gagal', 'Product <strong>' . request()->name . '</strong> gagal diperbarui', 'error');
        }
        if ($request->tags != null) {
            //tags not null
            $data = explode(',', $request->tags);
            TagPlu::where('plu',$request->plu)->whereNotIn('value',$data)->delete();//delete if not exist
            try {
                for ($i = 0; $i < count($data); $i++) {
                    TagPlu::updateOrCreate([//create if not exist and update if exist
                        'plu' => $request->plu,
                        'value' => $data[$i]
                    ], [
                        'plu' => $request->plu,
                        'value' => $data[$i],
                        'iud_status' => 'i'
                    ]);
                }
            } catch (\Throwable $th) {
                //throw $th;
                Log::error($th);
            }
        }else{
            if(TagPlu::where('plu',$request->plu)->exists()){
                TagPlu::where('plu',$request->plu)->delete();
            }
        }
        return to_route('productmass.index');
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
                Alert::html('Mengaktifkan berhasil', 'Product <strong>' . request()->name . '</strong> berhasil diaktifkan', 'success');
            } else {
                Product::where('product_id', $destroy_token)->update([
                    'iud_status' => 'd'
                ]);
                Alert::html('Menonaktifkan berhasil', 'Product <strong>' . request()->name . '</strong> berhasil dinonaktifkan', 'success');
            }
        } catch (\Throwable $th) {
            //throw $th;
            if (request()->status == 'd') {
                Alert::html('Mengaktifkan gagal', 'Product <strong>' . request()->name . '</strong> gagal diaktifkan', 'error');
            } else {
                Alert::html('Menonaktifkan gagal', 'Product <strong>' . request()->name . '</strong> gagal dinonaktifkan', 'error');
            }
            Log::error($th);
        }
        return back();
    }
}
