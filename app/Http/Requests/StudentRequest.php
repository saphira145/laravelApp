<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentRequest extends Request
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
//            'student_code' => 'required|unique:students',
            'student_code' => 'required',
            'fullname' => 'required',
            'birthday' => 'required|date',
            'sex'      => 'required',
            'address'  => 'required'
        ];
    }
}
