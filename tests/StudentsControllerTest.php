<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudentsControllerTest extends TestCase
{
    
    public function testAll() {
        $response = $this->call('GET', 'students');
        $this->assertTrue($response->isOk());
    }
    
//    public function 
}
