<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Country;

class CountryRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:80'],
            'code' => ['required', 'string', 'min:2'],
            'code3' => ['max:3'],
            'num_code' => 'max:9',
            'phone_code' => 'max:9',
        ];
    }
}
