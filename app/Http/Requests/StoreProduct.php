<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'name' => 'required|max:255',
                'code' => 'required|max:9',
                'details' => 'required',
                'price' => 'required|max:99999999',
                'stock' => 'required|max:999',
                'cooking' => 'required|max:99',
            ];
    }
}
