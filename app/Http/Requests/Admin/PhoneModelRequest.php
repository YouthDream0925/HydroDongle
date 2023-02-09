<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\Editer\PhoneModel;

class PhoneModelRequest extends FormRequest
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
            'brand_id' => ['required', 'numeric'],
            'cpu_id' => ['required', 'numeric'],
            'memory_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'link' => ['required', 'string'],
            'note' => ['required', 'string', 'max:255'],
            'model_image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ];
    }
}
