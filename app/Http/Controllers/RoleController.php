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
        return view('content.manajemen-user.admin-role', [
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
        try {
            Role::create([
                'name' => request()->name,
                'access' => [
                    'dashboard' => [
                        'home' => true
                    ],
                    'manajemen-user' => [
                        'admin' =>  isset(request()->manajemen_user_admin) ? true : false,
                        'admin-role' => isset(request()->manajemen_user_admin_role) ? true : false,
                    ]
                ],
                'iud_status' => 'i'
            ]);
            Alert::html('Tambah role berhasil', 'Role '.request()->name.' berhasil ditambahkan','success');
        } catch (\Throwable $th) {
            //throw $th;
            //LOGGING & MODIFY RESPONSE
            Log::error($th->getMessage());
            Alert::html('Tambah role gagal', 'Role '.request()->name.' gagal ditambahkan','failed');
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
