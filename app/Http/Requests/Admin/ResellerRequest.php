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
            'website' => ['max:1023'],
            'email' => ['max:1023'],
            'tel' => ['max:1023'],
            'country_id' => ['required', 'numeric'],
            'facebook' => ['max:255'],
            'whatsapp' => ['max:1023'],
            'skype' => ['max:255'],
            'telegram' => ['max:255'],
            'sonork' => ['max:13'],
            'type' => ['required']
        ];
    }
}
