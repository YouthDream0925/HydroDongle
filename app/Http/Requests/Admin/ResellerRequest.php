<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ResellerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:64'],
            'website' => ['string', 'max:1023'],
            'email' => ['string', 'max:1023'],
            'tel' => ['string', 'max:1023'],
            'country_id' => ['required', 'numeric'],
            'facebook' => ['string', 'max:255'],
            'whatsapp' => ['string', 'max:1023'],
            'skype' => ['string', 'max:255'],
            'telegram' => ['string', 'max:255'],
            'sonork' => ['string', 'max:13'],
            'activate' => ['required']
        ];
    }
}
