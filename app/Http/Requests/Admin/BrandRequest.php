<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Brand;

class BrandRequest extends FormRequest
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
        $id = $this->route('brand');
        $brand = Brand::find($id);
        if($brand != null && $brand->hasMedia('brand_image')) {
            if($request->file('brand_image') != null) {
                return [
                    'brand_name' => ['required', 'string', 'max:32'],
                    'brand_link' => ['required', 'string', 'max:255'],
                    'brand_order' => ['required', 'numeric', 'min:1', 'max:9999'],
                    'brand_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048']
                ];
            } else {
                return [
                    'brand_name' => ['required', 'string', 'max:32'],
                    'brand_link' => ['required', 'string', 'max:255'],
                    'brand_order' => ['required', 'numeric', 'min:1', 'max:9999'],
                ];
            }
        } else {
            return [
                'brand_name' => ['required', 'string', 'max:32'],
                'brand_link' => ['required', 'string', 'max:255'],
                'brand_order' => ['required', 'numeric', 'min:1', 'max:9999'],
                'brand_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048']
            ];
        }
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Brand Name is required.',
            'brand_link.required' => 'Brand Link is required.',
            'brand_image.required' => 'Brand Image is required.',
            'brand_order.required' => 'Brand Order is required.',
        ];
    }
}
