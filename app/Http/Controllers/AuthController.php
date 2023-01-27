<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    
    public function store()
    {
        $formdata=request()->validate([
            'name'=>['required','max:255','min:3'],
            'username'=>['required','max:255','min:3',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:8']
        ]);
        
        $user=User::create($formdata);
        auth()->login($user);
        return redirect('/')->with('success','Welcome Dear,'.$user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function post_login()
    {
        $formdata=request()->validate([
            'email'=>['required','email',Rule::exists('users','email')],
            'password'=>['required','min:8']
        ],[
            'email.required'=>'Need Email',
            'password.required'=>'Password must be aleast 8 characters'
        ]);
        if (auth()->attempt($formdata)) {
            if (auth()->user()->is_admin) {
                return redirect('/admin/blogs')->with('success','Welcome Back');
            }else
            {
                return redirect('/')->with('success','Welcome Back');
            }
        }
        else{
            return redirect()->back()->withErrors([
                'email'=>'Wrong User info'  
            ]);
        }
        
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','Goodbye');
    }

}
