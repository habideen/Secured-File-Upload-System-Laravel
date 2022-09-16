<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;
use Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::select('email', 'password', 'account_type')->where('email', '=', $request->email)->first();

        if ($user)
        {
            if (Hash::check($request->password, $user->password))
            {
                $request->session()->put('loginID', $user->email);
                
                $request->session()->put('account_type', $user->account_type);

                if (Session::get('account_type') == 'User')
                {
                    $profile = User::select('email', 'first_name', 'last_name', 'image_path', 'status', 'created_at')
                        ->where('email', Session::get('loginID'))
                        ->first();

                    $request->session()->put('profile', $profile);

                    return redirect('/user/index');
                }

                elseif (Session::get('account_type') == 'Admin')
                {
                    $profile = User::select('email', 'first_name', 'last_name', 'image_path', 'status', 'created_at')
                        ->where('email', Session::get('loginID'))
                        ->first();

                    $request->session()->put('profile', $profile);

                    return redirect('/admin/index');
                }
            }
            else
                return redirect('/login')->with('fail', 'Username/password is incorrect');
        }
        else
        {
            return redirect('/login')->with('fail', 'Username/password is incorrect');
        }

    }//login


    public function update_password(Request $request)
    {
        $request->validate([
            'old_password'=>'required|',
            'new_password'=>'required|min:8',
            'confirm_password'=>'required|same:new_password'
        ]);

        $user = User::select('password')->where('email', Session::get('loginID'))->first();

        if (Hash::check($request->old_password, $user->password))
        {
            $user = [];
            $user['password'] = Hash::make($request->new_password);

            $is_update = user::where('email', Session::get('loginID'))
                ->update( $user );

            
            if ($is_update)
                return back()->with('success', 'Password Updated successfully');
    
            else
                return back()->with('fail', 'Something went wrong');
            
        }
        else
            return back()->with('fail', 'Old password is incorrect');

    }//update_password
    

    public function signout(Request $request)
    {
        if (Session::has('loginID'))
            Session::pull('loginID');
        
        if (Session::has('account_type'))
            Session::pull('account_type');
        
        if (Session::has('profile'))
            Session::pull('profile');

        return redirect('/login')->with('success', 'You have successfully logged out.');
    }
}
