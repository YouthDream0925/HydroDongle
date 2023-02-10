<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\Editer\Test;
use Illuminate\Http\Request;

class TestRequest extends FormRequest
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
        $id = $this->route('test');
        $test = Test::find($id);
        if($test != null && $test->hasMedia('test_image')) {
            if($request->file('test_image') != null) {
                return [
                    'name' => ['required', 'string', 'max:255'],
                    'test_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
                ];
            } else {
                return [
                    'name' => ['required', 'string', 'max:255']
                ];
            }
        } else {
            return [
                'name' => ['required', 'string', 'max:255'],
                'test_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ];
        }
    }
}
