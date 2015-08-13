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
        $this->authController = new AuthController;
    }
    
    public function testGetTimeLockAccess() {
        $this->authController->timeBlock = 10;
        $this->assertTrue($this->authController->getTimeLockAccess() === 10);
    }
    
    public function testGetUsername() {
        $this->authController->username = 'username';
        $this->assertTrue($this->authController->getUsername() === 'username');
    }
    
    public function testHasLoginTooManyTimes() {
//        $this->o
    }
}