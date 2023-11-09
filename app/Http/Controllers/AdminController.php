<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Admin;
use App\Models\AdminRole;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\StoreAdminRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.manajemen-user.admin', [
            'data' => Admin::active()->paginate(10),
            'role' => AdminRole::active()->get()
        ]);
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
    // public function store(StoreAdminRequest $request)
    public function store(StoreAdminRequest $request)
    {
        $validated = $request->all();
        try {
            Admin::query()->create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role_id' => $validated['role'],
                'iud_status' => 'i'
            ]);
            Alert::html('Successfully created', "Admin <b>" . $validated['name'] . "</b> berhasil dibuat", 'success');
        } catch (\Throwable $th) {
            switch ($th->getCode()) {
                case 23505: // duplicate unique key
                    Log::warning('Duplicate unique key by '.auth()->user()->name);
                    Alert::error('Failed to create', 'admin ' . $validated['name'] . ' sudah ada');
                    break;

                default:
                    Alert::error('Failed to create', 'admin ' . $validated['name'] . ' gagal dibuat');
                    Log::error($th->getMessage());
                    break;
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = Crypt::decryptString(request()->delete_token);
        if ($id == 1) {
            Alert::html('Lohh', "Admin <b>" . request()->name . "</b> tidak bisa dihapus", 'info');
            return back();
        }
        try {
            Admin::where('admin_id', $id)->update([
                'iud_status' => 'd'
            ]);
            Alert::html('Successfully removed', "Admin <b>" . request()->name . "</b> berhasil dihapus", 'success');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::html('Failed removed', "Admin <b>" . request()->name . "</b> gagal dihapus", 'error');
        }
        return back();
    }
}
