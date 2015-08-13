<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    // Use trait
    use \App\Http\Controllers\AuthController\Login;
    
    /**
     * Render login view
     * @return Response
     */
    public function getLogin() {
        echo Auth::check();
        return view('auth.login');
    }
    
    /**
     * Processing login
     * @param Request $request
     */
    public function postLogin(Request $request) {
        // Validate Input
        $this->validate($request, $this->validator());

        // Get Credentials
        $credentials = $this->getCredentials($request);
        
        // Check if user login fail too many times
        if ($this->hasAttemptToLoginTooManyTimes() || $this->checkLockAccess()) {
            $this->lockAccess(time());

            Session::flash('error_flash', 'You have login to many times');
            return redirect()->route('auth.getLogin');
        }
        
        // Handle succesfully authenticate
        if (Auth::attempt($credentials)) {
            $this->clearLoginFail();
            Session::flash('error_flash', 'Success');
            return redirect()->route('auth.getLogin');
        }
        
        $this->loginFailTimeIncrement();
        
        return redirect()->route('auth.getLogin');
    }
    
    /**
     * logout
     * @return Response
     */
    public function logout() {
        Auth::logout();
        return redirect()->route('auth.getLogin');
    }
    
    /**
     * Get credentials from input
     * @return array
     */
    public function validator() {
        $validator = [
            $this->getUsername() => 'required',
            'password'           => 'required'
        ];
        return $validator;
    }
    
    public function getCredentials(Request $request) {
        $credentials = [
                $this->getUsername() => trim($request->input('email')),
                'password'           => trim($request->input('password'))
        ];
        return $credentials; 
    }
    
}
