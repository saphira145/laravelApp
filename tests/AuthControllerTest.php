<?php

use App\Http\Controllers\AuthController;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AuthControllerTest extends TestCase {
    
    protected $authController;


    public function setUp() {
        parent::setUp();
        $this->$authController = new AuthController;
    }
    
    public function testCheckLoginBlock() {
        $this->assertTrue(true);
        $loginFailsPoint = 120;
        $now = 240;
//        $this->ret
    }
}