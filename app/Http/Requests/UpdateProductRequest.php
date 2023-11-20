<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'preorder_category_id' => 'required',
            'weight' => 'required',
            'sku' => 'required',
            'plu' => 'required',
            'threshold' => 'required',
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'Input nama tidak boleh kosong',
            'brand.required' => 'Brand harus diisi',
            'category_id.required' => 'Category harus diisi',
            'preorder_category_id' => 'Preorder category harus diisi',
            'weight.required' => 'Input weight tidak boleh kosong',
            'sku.required' => 'Input sku tidak boleh kosong',
            'plu.required' => 'Input plu tidak boleh kosong',
            'threshold.required' => 'Threshold tidak boleh kosong',
        ];
    }
}
