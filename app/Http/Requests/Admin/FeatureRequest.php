<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Feature;

class FeatureRequest extends FormRequest
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
        $id = $this->route('feature');
        $feature = Feature::find($id);
        if($feature != null && $feature->hasMedia('icon')) {
            if($request->file('icon') != null) {
                return [
                    'name' => ['required', 'string', 'max:64'],
                    'sorting' => ['required', 'numeric', 'min:1'],
                    'icon' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
                ];
            } else {
                return [
                    'name' => ['required', 'string', 'max:255'],
                    'sorting' => ['required', 'numeric', 'min:1'],
                ];
            }
        } else {
            return [
                'name' => ['required', 'string', 'max:64'],
                'sorting' => ['required', 'numeric', 'min:1'],
                'icon' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ];
        }
    }
}
