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
        
        $column = $this->getOrderColumn($order[0]['column']);   // Get column name
        $dir = $order[0]['dir'];                                // Get direct order
        $searchKey = $search['value'];                          // Get search key
        $students = null;
        
        // Order by selected column
        if ($column && $dir) {
            $students = $this->orderBy($column, $dir);
        }
        
        // Search by student code, name or address
        if ($searchKey !== '') {
            $students = $students->where('student_code', 'like', "%{$searchKey}%")
                                ->orWhere('fullname', 'like', "%{$searchKey}%")
                                ->orWhere('address', 'like', "%{$searchKey}%");
        }
        
        // Get total records 
        $totalRecords = count($students->get());
        
        // Paginate
        if ($limit && $order) {
            $students = $students->skip($offset)->take($limit);
        }
        
        return [
            'totalRecords' => $totalRecords,
            'students' => $students->get()
        ];
            
    }
    
    protected function getOrderColumn($index) {
        $column = [
            'student_code',
            'fullname',
            'birthday',
            'sex',
            'address'
        ];
        return $column[$index];
    }
    
    /**
     * 
     * 
     * @param type $students
     * @return array
     */
    public function escapeHtml($students) {
        $result = [];
        foreach($students as $student) {
            $result[] = [
                'student_code'  => htmlspecialchars($student->student_code),
                'fullname'      => htmlspecialchars($student->fullname),
                'birthday'      => htmlspecialchars($student->birthday),
                'sex'           => htmlspecialchars($student->sex),
                'address'       => htmlspecialchars($student->address),
                'created_at'     => $student->created_at,
                'updated_at'     => $student->updated_at
            ];
        }
        return $result;
    }
}
