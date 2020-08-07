<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required|unique:products,product_title',
            'picture'=>'required|file|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'desc' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'user_id' => 'required',
        ];
    }
}

