<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Hash;
use DB;
use Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    public function index()
    {
        $users = User::select('email', 'first_name', 'last_name', 'account_type', 'status', 'created_at')->get();

        return view('admin.manage_users')->with('users', $users);
    }//index

    
    public function register_user(Request $request)
    {
        $request->validate([
            'first_name'=>'required|regex:/^[a-zA-Z\- ]+$/',
            'last_name'=>'required|regex:/^[a-zA-Z\- ]+$/',
            'email'=>'required|email|unique:users',
            'account_type'=>['required','regex:/^(Admin|User)$/']
        ]);

        $user = new User();
        $user->first_name = ucwords($request->first_name);
        $user->last_name = ucwords($request->last_name);
        $user->email = strtolower($request->email);
        $user->account_type = $request->account_type;
        $user->password = Hash::make(strtolower($request->last_name));
        $user->created_by = Session::get('loginID');
        $save = $user->save();

        if ($save)
        {
            return back()->with('success', 'User registered registered successfully. Default password is surname is lower case');
        }
        else
        {
            return back()->with('fail', 'Something went wrong');
        }

    }//register_user

    
    public function update_system_user(Request $request)
    {
        $request->validate([
            'edit_first_name'=>'required|regex:/^[a-zA-Z\- ]+$/',
            'edit_last_name'=>'required|regex:/^[a-zA-Z\- ]+$/',
            'email'=>'required|email|exists:users',
            'edit_account_type'=>['required','regex:/^(Admin|User)$/']
        ]);

        $user = [];
        $user['first_name'] = ucwords($request->edit_first_name);
        $user['last_name'] = ucwords($request->edit_last_name);
        $user['account_type'] = $request->edit_account_type;

        $is_update = User::where('email', $request->email)->update($user);

        if ($is_update)
        {
            return back()->with('success', 'Record editted successfully');
        }
        else
        {
            return back()->with('fail', 'Something went wrong');
        }

    }//update_system_user


    public function update_user_status(Request $request)
    {
        $request->validate([
            'user_email'=>'required|email',
            'current_status'=>'required|regex:/^[0-1]$/'
        ]);


        $user = [];
        $user['status'] = ($request->current_status)? '0':'1';

        $is_update = User::where('email', $request->user_email)
            ->update( $user );

        if ($is_update)
            return 1;

        else
            return 0;
    }//update_user_status
}
