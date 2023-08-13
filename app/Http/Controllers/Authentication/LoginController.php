<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password'=>'required',
        ],
        ['email.required' => 'The email field is required.',
        'password.required' => 'The password field is required.',
        ]);
        $email = $request['email'];
        $password = $request['password'];
        $user = new User;
        $check_user = User::where('email',$email)->first();
        if( !empty($check_user) )
        {
           if(Hash::check($password,$check_user->password) )
            {
                session(['user_id'=>$check_user->id,
                        'user_name'=>$check_user->name,
                        'user_email'=>$email
                    ]);
                    if($check_user->user_role =='1')
                    {
                        return redirect('admin/dashboard');
                    }
                    else
                    {
                        return redirect('/');
                    }
            }
            else
            {
                return redirect()->back()->withErrors(['password' => 'Password does not match']);
            }
        }
        else
        {
            return redirect()->back()->withErrors(['no_user' => 'User Not Found']);
        }
    }
}
