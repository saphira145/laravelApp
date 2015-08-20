<?php

namespace App;

use App\Providers\Pagination;
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
        $students = Pagination::makeLengthAwarePaginator($collection->forPage($page, $perPage), 
                            count($collection), $perPage);
        return $students;
    }
    
    /**
     * 
     * Other search
     * 
     * 
     */
    
    
    /**
     * 
     * @param int $limit
     * @param int $offset
     * @param array $order
     * @param array $search
     */
    public function getListStudents($limit, $offset, $order, $search) {
        
        $column = $this->getOrderColumn($order[0]['column']);
        $dir = $order[0]['dir']; 
        $searchKey = $search['value'];
        $students;
        
        if ($limit && $order) {
            $students = $this->skip($offset)->take($limit);
        }
        
        if (!$column && !$dir) {
            $students = $students->orderBy($column, $dir);
        }

        if ($searchKey !== '') {
            $students = $students->where('student_code', 'like', "%{$searchKey}%")
                                ->orWhere('fullname', 'like', "%{$searchKey}%")
                                ->orWhere('address', 'like', "%{$searchKey}%");
        }
        return $students->get();
    }
    
    public function getOrderColumn($index) {
        $column =  [
            'student_code',
            'fullname',
            'birthday',
            'sex',
            'address'
        ];
       return $column[$index];
    }
}
