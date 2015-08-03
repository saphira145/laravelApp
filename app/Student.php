<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{    
    protected $fillable = [
        'student_code',
        'fullname',
        'birthday',
        'sex',
        'address'
    ];
    
//    public function getBirthdayAttribute($date) {
//        return date("Y-m-d", strtotime($date));
//    }
    
    /**
     * 
     * @param string $searchKey
     * @return \App\Student
     */
    public function search($searchKey) {
        $nameConstraints = $this->where('fullname', 'like', "%$searchKey%")->get();
        $codeConstraints = $this->where('student_code', 'like', "%$searchKey%")->get();
        $addressConstraints = $this->where('address','like', "%$searchKey%")->get();
        
        $results = $nameConstraints->merge($codeConstraints)
                                    ->merge($addressConstraints);
        return $results;
    }
}
