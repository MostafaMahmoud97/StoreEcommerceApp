<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "category_id" => "required|numeric",
            "name" => "required|string",
            "description" => "required|string",
            "price" => "required|numeric",
            "discount_price" => "required|numeric",
            "image_val" => "required|mimes:jpg,png,jpeg|max:2048",
            "colors" => "required|array",
            "sizes" => "required|array",
            "images" => "required|array|min:1",
            "images.*" => "mimes:jpg,png,jpeg|max:2048"
        ];
    }
}
