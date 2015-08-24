<?php

namespace App;

use App\Providers\Pagination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class Student extends Model
{    
    protected $fillable = [
        'student_code',
        'fullname',
        'birthday',
        'sex',
        'address'
    ];
    
    protected $validateFactory;
    
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
     * @return array 
     */
    public function getListStudents($limit, $offset, $order, $search, $filter) {
        
        $column = $this->getOrderColumn($order[0]['column']);   // Get column name
        $dir = $order[0]['dir'];                                // Get direct order
        $searchKey = $search['value'];                          // Get search key

        // Filter
        $students = $this->whereIn('sex', $filter);        
        // Order by selected column
        if ($column && $dir) {
            $students = $students->orderBy($column, $dir);
        }
        // Search by student code, name or address
        if ($searchKey !== '') {
            $students = $students->where(function($query) use ($searchKey) {
                $query->where('student_code', 'like', "%{$searchKey}%")
                    ->orWhere('fullname', 'like', "%{$searchKey}%")
                    ->orWhere('address', 'like', "%{$searchKey}%");
                });
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
                'id'            => $student->id,
                'student_code'  => htmlspecialchars($student->student_code),
                'fullname'      => htmlspecialchars($student->fullname),
                'birthday'      => htmlspecialchars($student->birthday),
                'sex'           => htmlspecialchars($this->getGender($student->sex)),
                'address'       => htmlspecialchars($student->address),
                'created_at'     => $student->created_at,
                'updated_at'     => $student->updated_at
            ];
        }
        return $result;
    }
    
    /**
     * Get gender from ID
     * @param type $index
     * @return string
     */
    public function getGender($index) {
        $gender = ['Male', 'Female', 'Gay', 'Les'];
        return $gender[$index];
    }
    
    public function validate($request, $extra = []) {
        $rules = [
            'fullname' => 'required',
            'birthday' => 'required|date',
            'sex'      => 'required',
            'address'  => 'required'
        ];
        if (!empty($extra)) {
            $rules = array_merge($rules, $extra);
        }
        
//        $messages = [
//            'required' => 'Field is required',
//            'date' => 'Must be date type',
//        ];
        
        $validate = Validator::make($request->all(), $rules);
        return $validate;
    }
    
}
