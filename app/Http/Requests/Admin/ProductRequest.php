<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Product;

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
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        $id = $this->route('product');
        $product = Product::find($id);
        if($product != null && $product->hasMedia('product_image')) {
            if($request->file('product_image') != null) {
                return [
                    'code' => 'required|string',
                    'name' => 'required|string',
                    'price' => 'required|numeric|regex:/^\d*(\.\d{2})?$/',
                    'tax' => 'required|numeric|regex:/^\d*(\.\d{2})?$/',
                    'discount' => 'required|numeric|regex:/^\d*(\.\d{2})?$/',
                    'features' => 'required',
                    'product_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:5128']
                ];
            } else {
                return [
                    'code' => 'required|string',
                    'name' => 'required|string',
                    'price' => 'required|numeric|regex:/^\d*(\.\d{2})?$/',
                    'tax' => 'required|numeric|regex:/^\d*(\.\d{2})?$/',
                    'discount' => 'required|numeric|regex:/^\d*(\.\d{2})?$/',
                    'features' => 'required',
                ];
            }
        } else {
            return [
                'code' => 'required|string',
                'name' => 'required|string',
                'price' => 'required|numeric|regex:/^\d*(\.\d{2})?$/',
                'tax' => 'required|numeric|regex:/^\d*(\.\d{2})?$/',
                'discount' => 'required|numeric|regex:/^\d*(\.\d{2})?$/',
                'features' => 'required',
                'product_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:5128']
            ];
        }
    }
}
