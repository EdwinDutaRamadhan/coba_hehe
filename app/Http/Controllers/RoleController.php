<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.manajemen-user.admin-role.index', [
            'data' => Role::active()->paginate(10)
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
    public function store(StoreRoleRequest $request)
    {
        $status = false;
        try {
            $role = Role::create([
                'name' => request()->name,
                'iud_status' => 'i',
                'warehouse_all' => false
            ]);
            Alert::html('Tambah role berhasil', 'Role '.request()->name.' berhasil ditambahkan','success');
            $status = true;
        } catch (\Throwable $th) {
            //throw $th;
            //LOGGING & MODIFY RESPONSE
            Log::error($th);
            Alert::html('Tambah role gagal', 'Role '.request()->name.' gagal ditambahkan','failed');
        }
        if($status){
            Role::find($role->role_id)->feature()->sync($request->tags);
        }
        
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
