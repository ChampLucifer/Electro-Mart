<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegistrationController extends Controller
{
    public function index()
    {
        return view('authentication.register');
    }
    public function register(Request $request)
    {
       $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users,email',
            'password'=>'required',
            'cpassword'=>'required|same:password'
       ],
        ['name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.unique' => 'The email address is already registered.',
        'password.required' => 'The password field is required.',
        'cpassword.required' => 'The confirm password field is required.',
        'cpassword.same' => 'Password Not Match'
        ]);
        $user = new user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make( $request->input('password') );
           $register =  $user->save();
           if($register)
           {
            $lastInsertedId = $user->id;
            session()->put('user_id',$lastInsertedId);  
            return redirect('/');           
           }
            return redirect('/login')->with('status', 'Done');

    }
}
