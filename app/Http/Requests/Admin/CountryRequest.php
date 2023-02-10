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
        $id = $this->route('country');
        $country = Country::find($id);
        if($country != null && $country->hasMedia('country_image')) {
            if($request->file('country_image') != null) {
                return [
                    'name' => ['required', 'string', 'max:80'],
                    'code' => ['required', 'string', 'max:2'],
                    'code3' => ['max:3'],
                    'num_code' => 'max:9',
                    'phone_code' => 'max:9',
                    'country_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
                ];
            } else {
                return [
                    'name' => ['required', 'string', 'max:80'],
                    'code' => ['required', 'string', 'max:2'],
                    'code3' => ['max:3'],
                    'num_code' => 'max:9',
                    'phone_code' => 'max:9'
                ];
            }
        } else {
            return [
                'name' => ['required', 'string', 'max:80'],
                'code' => ['required', 'string', 'max:2'],
                'code3' => ['max:3'],
                'num_code' => 'max:9',
                'phone_code' => 'max:9',
                'country_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ];
        }
    }
}
