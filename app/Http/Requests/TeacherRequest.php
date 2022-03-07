<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        return [
            'email' => 'required|unique:teachers,Email,'.$this->id,
            'password'=>'required',
            'Name_ar'=>'required',
            'Name_en'=>'required',
            'Specialization_id'=>'required',
            'Gender_id'=>'required',
            'Joining_Date'=>'required',
            'Address'=>'required',
        ];
    }

    public function messages(){
        return [
            'email.required' => trans('validation.required'),
            'password.required' => trans('validation.required'),
            'Name_ar.required' => trans('validation.required'),
            'Name_en.required' => trans('validation.required'),
            'Specialization_id.required' => trans('validation.required'),
            'Gender_id.required' => trans('validation.required'),
            'Joining_Date.required' => trans('validation.required'),
            'Address.required' => trans('validation.required'),
        ];
    }

}
