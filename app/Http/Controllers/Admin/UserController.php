<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin_layout.user.index',compact('users'));
    }
    public function create()
    {
        return view('admin_layout.user.create');
    }

    public function insert( Request $request )
    {
        $validated_data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'user_role'=>'required|integer'
        ]);

        User::create([
            'name'=>    $request->name,
            'email'=>   $request->email,
            'password'=>Hash::make( $request->password ),
            'user_role'=>$request->user_role
        ]);

        return redirect('admin/users')->with('message','User Created');
    }

    public function edit( $user_id )
    {
        $user = User::where('id',$user_id)->first();
        return view('admin_layout.user.edit',compact('user'));
    }

    public function update( Request $request, $user_id )
    {

        $find_user = User::where('id',$user_id)->first();
     

        $validated_data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required',
            'user_role'=>'required|integer'
        ]);
        if( $find_user['email'] == $request->email)
        {
            User::findOrfail($user_id)->update([
                'name'=>    $request->name,
                'password'=>Hash::make( $request->password ),
                'user_role'=>$request->user_role
            ]);
        }
        else
        {
            User::findOrfail($user_id)->update([
                'name'=>    $request->name,
                'email'=>   $request->email,
                'password'=>Hash::make( $request->password ),
                'user_role'=>$request->user_role
            ]);
           
        }
        return redirect('admin/users')->with('message','User Updated');
    }

    public function delete( $user_id )
    {
        $user = User::findOrfail( $user_id );
        $user->delete();
        return redirect('admin/users')->with('message','User Deleted');
    }
}
