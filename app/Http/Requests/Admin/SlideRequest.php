<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Other\Slide;

class SlideRequest extends FormRequest
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
        $id = $this->route('slide');
        $slide = Slide::find($id);
        if($slide != null && $slide->hasMedia('ads_images')) {
            if($request->file('ads_images') != null) {
                return [
                    'title' => ['required', 'string', 'max:255'],
                    'btn_text' => ['required', 'string', 'max:40'],
                    'btn_link' => ['required', 'string', 'max:255'],
                    'sort' => ['required', 'numeric'],
                    'ads_images' => ['required'],
                    'ads_images.*' => ['required', 'mimes:jpeg,png,jpg,gif', 'max:5128']
                ];
            } else {
                return [
                    'title' => ['required', 'string', 'max:255'],
                    'btn_text' => ['required', 'string', 'max:40'],
                    'btn_link' => ['required', 'string', 'max:255'],
                    'sort' => ['required', 'numeric'],
                ];
            }
        } else {
            return [
                'title' => ['required', 'string', 'max:255'],
                'btn_text' => ['required', 'string', 'max:40'],
                'btn_link' => ['required', 'string', 'max:255'],
                'sort' => ['required', 'numeric'],
                'ads_images' => ['required'],
                'ads_images.*' => ['required', 'mimes:jpeg,png,jpg,gif', 'max:5128']
            ];
        }
    }

    public function messages()
    {
        return [
            'ads_images.required' => 'Slide Image is required' 
        ];
    }
}
