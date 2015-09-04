<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash as Hash;
//use Illuminate\Foundation\Auth\AuthentificatesAndRegistersUsers;

class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

//    use AuthentificatesAndRegistersUsers;
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

    public function getRegistration() {
        return view('auth.registration');
    }

    public function postRegistration(\Illuminate\Http\Request $request) {
        
        $email = $request->input('email');
        $password = \Illuminate\Support\Facades\Hash::make($request->input('password'));
        
        $user = \App\Models\User::create([
                    'email' => $email,
                    'password' => $password,
        ]);
        
//        var_dump($request->all());
//        die();
        
        if (Auth::loginUsingId($user->id)) {
            return redirect('/');
        } 
        else 
        {
            var_dump($user->id);
        }
    }
    
    public function getLogout()
    {
        Auth::logout();
        
        return redirect('/');
    }
    
    public function getLogin()
    {
        return view('auth.login');
    }
    
    public function postLogin(\Illuminate\Http\Request $request)
    {
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect('/');
        }
        else 
        {
            return redirect('auth/login');
        }
    }
}
