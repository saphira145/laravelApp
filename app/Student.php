<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Student extends Model
{    
    protected $fillable = [
        'student_code',
        'fullname',
        'birthday',
        'sex',
        'address'
    ];
    
    /**
     * Search students by name, student_code and address
     * 
     * @param string $searchKey
     * @return Students Collection
     */
    protected function search($searchKey) {
        $nameConstraints = $this->where('fullname', 'like', "%$searchKey%")->get();
        $codeConstraints = $this->where('student_code', 'like', "%$searchKey%")->get();
        $addressConstraints = $this->where('address','like', "%$searchKey%")->get();
        
        $results = $nameConstraints->merge($codeConstraints)
                                   ->merge($addressConstraints);
        return $results;
    }
    
    /**
     * get Search Results with paginate
     * 
     * @param string $search_key
     * @param int $page
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getSearchResults($search_key, $page, $perPage) {
        $collection = $this->search($search_key);
        $students = new LengthAwarePaginator($collection->forPage($page, $perPage), count($collection), $perPage);
        return $students;
    }
}
