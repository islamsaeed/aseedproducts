<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return
        [
            // 'descreption.*' => 'required|unique:about_us,descreption,'.$this->id,
            'descreption.*' => [
                'required',
                'unique:about_us,descreption',
                'distinct',
            ],
        ];
    }

    public function messages()
    {
        return
        [

            'descreption.required'     => 'يجب ادخال وصف للشركة',
            'descreption.unique'       => 'هذه التفاصيل مسجلة من قبل',
        ];
    }
}
