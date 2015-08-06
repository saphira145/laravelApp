<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentsRequest extends Request
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
        $rules = [
            'fullname' => 'required',
            'birthday' => 'required|date',
            'sex'      => 'required',
            'address'  => 'required'
        ];
        if ($this->route()->getAction()['as'] === 'students.store') {
            $rules['student_code'] = 'required|unique:students';
        }
        return $rules;
    }
}
