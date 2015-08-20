<?php

use App\Student;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class StudentTest extends TestCase {
    
    protected $student;
    
    const MOCK_DATA = [
        [
            'student_code' => '123456789',
            'fullname' => 'Tran Duc Binh',
            'birthday' => '1993/5/14',
            'sex'       => 'male',
            'address'   => 'Vinh Yen Vinh Phuc',
            'create_at' => '2015/8/20',
            'update_at' => '2015/8/20'
        ],
        [
            'student_code' => '123456789',
            'fullname' => 'Tran Duc Binh',
            'birthday' => '1993/5/14',
            'sex'       => 'male',
            'address'   => 'Vinh Yen Vinh Phuc',
            'create_at' => '2015/8/20',
            'update_at' => '2015/8/20'
        ],
    ];


    public function setUp() {
        parent::setUp();
        $this->student = new Student;
    }
            
    function testGetListStudents() {
        
    }
}