<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
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
            'store_code' => 'required',
            'enable_deficit' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'Input nama tidak boleh kosong',
            'name.min' => 'Input nama harus berisi minimal 6 karakter',
            'store_code'=>'Input kode toko tidak boleh kosong',
            'address' => 'Input lokasi toko tidak boleh kosong',
            'lat' => 'Input lokasi latitude tidak boleh kosong',
            'lng' => 'Input lokasi longitude tidak boleh kosong'
        ];
    }
}
