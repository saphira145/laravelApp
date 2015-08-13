<?php

use App\Http\Controllers\AuthController;
use Illuminate\Cache\CacheManager;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AuthControllerTest extends TestCase {
    
    protected $authController;
    
    public function setUp() {
        parent::setUp();
        $cacheManager = $this->getMockBuilder('Illuminate\Cache\CacheManager', array('get'))
                ->disableOriginalConstructor()->getMock();

        $cacheManager->expects($this->any())->method('get')->with($this->equalTo('timeLoginFails'))
                    ->will($this->returnValue(6));
                dd($cacheManager->get('timeLoginFails'));
        $this->authController = new AuthController($cacheManager);
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
//        $this->authController->getCacheManager()->expects($this->any())->method('has')
//                ->with($this->equalTo('timeLoginFails'))
//                ->will($this->returnValue(true));
//        $this->authController->getCacheManager()->expects($this->any())->method('get')
//                ->with($this->equalTo('timeLoginFails'))
//                ->will($this->returnValue(6));
//        echo $this->authController->getCacheManager()->get('timeLoginFails');
        dd($this->authController->getCacheManager());
        
//        $this->assertTrue($this->authController->hasAttemptToLoginTooManyTimes());
    }
}

