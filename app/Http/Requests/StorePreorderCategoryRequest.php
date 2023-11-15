<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePreorderCategoryRequest extends FormRequest
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
            'name' => 'required|max:255',
            'status' => 'required|max:1',
            'min_day_est' => 'required|min:0',
            'max_day_est' => 'required|min:0',
            'start_time' => 'required',
            'end_time' => 'required',
        ];
    }
}
