<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Cache;

trait Login {
    
    /**
     * Get username, could be userID/email...
     * Default will be email
     * @return type
     */
    public function getUsername() {
        return (property_exists($this, 'username')) ? $this->username : 'email';
    }
    
    /**
     * Get time block of login in minute, default value is 5 minutes
     * @return int
     */
    public function getTimeLockAccess() {
        $timeLockAccess = (property_exists($this, 'timeBlock')) ? $this->timeBlock : 5;
        return $timeLockAccess;
    }
    
    /**
     * Handle user login fail too many times
     * @return boolean
     */
    public function hasAttemptToLoginTooManyTimes() {
        if (Cache::has('loginTimeFail')) {
            $loginFails = Cache::get('loginTimeFail');
            if ($loginFails >= $this->getMaxTimesLoginFail()) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Increase number times of login fails
     */
    public function loginFailTimeIncrement() {
        if (Cache::has('loginTimeFail')) {
            Cache::increment('loginTimeFail');
        } else {
            Cache::put('loginTimeFail', 1, 1);
        }
    }
    
    /**
     * Get max time login fail, default will be 5 times
     * @return int;
     */
    public function getMaxTimesLoginFail() {
        $loginFailTimes = (property_exists($this, 'maxTimeLoginFail')) ? $this->maxTimeLoginFail : 5;
        return $loginFailTimes;
    }
    
    public function clearLoginFail() {
        Cache::forget('loginTimeFail');
        Cache::forget('timeBlock');
    }
    
    /**
     * time lock access start from the first login too many times
     * @param type $seconds
     */
    public function lockAccess($seconds) {
        if (!Cache::has('lastimeFails')) {
            $timeLockAccess = $this->getTimeLockAccess();
            Cache::put('lastimeFails', $seconds, $timeLockAccess);
        }
    }
    
    /**
     * Check login is being blocked or not
     * @return boolean
     */
    public function checkLockAccess() {
        $now = time();
        $timeLockAccess = $this->getTimeLockAccess();
        if (Cache::has('lastimeFails')) {
            $lastimeFails = Cache::get('lastimeFails');
            if (($now - $lastimeFails) / 60 < $timeLockAccess) {
                return true;
            }
        }
        return false;
    }
}