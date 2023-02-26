<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            'brand_id' => 'required',
            'cpu_id' => 'required',
            'driver_name' => 'required|max:200',
            'driver_version' => 'required|max:10',
            'driver_link' => 'required|max:500',
            'description' => 'required|max:2000'
        ];
    }
}
