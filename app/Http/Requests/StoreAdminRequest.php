<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:6',
            'email' => 'required',
            'password' => 'required|min:6|max:64|same:password_confirmation',
            'password_confirmation' => 'required|min:6|same:password',
            'role' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Input nama tidak boleh kosong',
            'name.min' => 'Input nama harus berisi minimal 6 karakter',
            'email.required' => 'Input email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Input password tidak boleh kosong',
            'password.min' => 'Password harus lebih dari 6 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 64 karakter.',
            'password.same' => 'Password dan konfirmasi password harus sama',
            'password_confirmation.min' => 'Konfirmasi password harus lebih dari 6 karakter.',
            'password_confirmation.same' => 'konfirmasi password harus sama dengan password',
        ];
    }
}
