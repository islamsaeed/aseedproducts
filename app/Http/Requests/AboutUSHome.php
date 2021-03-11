<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUSHome extends FormRequest
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
            'title_ar'          => 'required|unique:about_homes,title->ar,'.$this->id,
            'title_en'          => 'required|unique:about_homes,title->en,'.$this->id,
            'descreption_ar'    => 'required',
            'descreption_en'    => 'required',
            'logo'              => 'dimensions:min_width=100,min_height=100'
        ];
    }

    public function messages()
    {
        return
        [
            'title_ar.required'         => ' العنوان بالعربي مطلوب ',
            'title_en.required'         => 'العنوان بالانجليزي مطلوب',
            'descreption_ar.required'   => 'الوصف بالعربي مطلوب',
            'descreption_enc.required'  => 'الوصف بالانجليزي مطلوب',
            'title_ar.unique'           => 'العنوان بالعربي  مستخدم من قبل',
            'title_en.unique'           => ' العنوان بالانجليزي مستخدم من قبل',
            'logo.dimensions'           => 'اقل مقاس للصورة هو عرض 200px و طول 300px',
        ];
    }
}
