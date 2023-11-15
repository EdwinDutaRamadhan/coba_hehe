<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PreorderCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorePreorderCategoryRequest;
use App\Http\Requests\UpdatePreorderCategoryRequest;

class PreorderCategoryController extends Controller
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
    public function store(StorePreorderCategoryRequest $request)
    {
        $validated['name'] = $request->name;
        $validated['iud_status'] = $request->status == '1' ? 'i' : 'd';
        $validated['min_day_est'] = $request->min_day_est;
        $validated['max_day_est'] = $request->max_day_est;
        $validated['start_time'] = Carbon::createFromTime(explode(":",$request->start_time)[0], explode(":",$request->start_time)[1], "00")->toTimeString();
        $validated['end_time'] = Carbon::createFromTime(explode(":",$request->end_time)[0], explode(":",$request->end_time)[1], "00")->toTimeString();
        try {
            PreorderCategory::create($validated);
            Alert::html('Insert berhasil', 'Preorder <strong>' . request()->name . '</strong> berhasil ditambahkan', 'success');
        } catch (\Throwable $th) {
            Alert::html('Insert gagal', 'Preorder <strong>' . request()->name . '</strong> gagal ditambahkan', 'error');
            //throw $th;
            Log::error($th);
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PreorderCategory $preorderCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PreorderCategory $preorderCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePreorderCategoryRequest $request, PreorderCategory $preorderCategory)
    {
        $validated['name'] = $request->name;
        $validated['iud_status'] = $request->status == '1' ? 'i' : 'd';
        $validated['min_day_est'] = $request->min_day_est;
        $validated['max_day_est'] = $request->max_day_est;
        $request->start_time !== null ? $validated['start_time'] = Carbon::createFromTime(explode(":",$request->start_time)[0], explode(":",$request->start_time)[1], "00")->toTimeString() : $validated['start_time'] = null;
        $request->end_time !== null ? $validated['end_time'] = Carbon::createFromTime(explode(":",$request->end_time)[0], explode(":",$request->end_time)[1], "00")->toTimeString() : $validated['end_time'] = null;
        try {
            PreorderCategory::create($validated);
            Alert::html('Update berhasil', 'Preorder <strong>' . request()->name . '</strong> berhasil ditambahkan', 'success');
        } catch (\Throwable $th) {
            Alert::html('Update gagal', 'Preorder <strong>' . request()->name . '</strong> gagal ditambahkan', 'error');
            //throw $th;
            Log::error($th);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $destroy_token = Crypt::decryptString(request()->delete_token);
        try {
            if (request()->status == 'd') {
                PreorderCategory::where('preorder_category_id', $destroy_token)->update([
                    'iud_status' => 'i'
                ]);
                Alert::html('Mengaktifkan berhasil', 'Preorder <strong>' . request()->name . '</strong> berhasil diaktifkan', 'success');
            } else {
                PreorderCategory::where('preorder_category_id', $destroy_token)->update([
                    'iud_status' => 'd'
                ]);
                Alert::html('Menonaktifkan berhasil', 'Preorder <strong>' . request()->name . '</strong> berhasil dinonaktifkan', 'success');
            }
        } catch (\Throwable $th) {
            //throw $th;
            if (request()->status == 'd') {
                Alert::html('Mengaktifkan gagal', 'Preorder <strong>' . request()->name . '</strong> gagal diaktifkan', 'error');
            } else {
                Alert::html('Menonaktifkan gagal', 'Preorder <strong>' . request()->name . '</strong> gagal dinonaktifkan', 'error');
            }
            Log::error($th);
        }
        return back();
    }
}
