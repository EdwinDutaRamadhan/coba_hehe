<?php

namespace App\Http\Controllers;

use App\Models\AdminRole;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAdminRoleRequest;
use App\Http\Requests\UpdateAdminRoleRequest;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.manajemen-user.admin-role', [
            'data' => AdminRole::active()->paginate(10)
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
    public function store(StoreAdminRoleRequest $request)
    {
        try {
            AdminRole::create([
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
    public function show(AdminRole $adminRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminRole $adminRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRoleRequest $request, AdminRole $adminRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $role_id = Crypt::decryptString(request()->delete_token);
        if($role_id == 1){
            Alert::html('Hapus gagal', 'Role ini tidak dapat dihapus -_-#','info');
            return back();
        }
        try {
            AdminRole::where('role_id',$role_id)->update(['iud_status' => 'd']);
            Alert::html('Hapus berhasil', 'Role berhasil dihapus','success');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::html('Hapus gagal', 'Role gagal dihapus','error');
        }
        return back();
    }
}
