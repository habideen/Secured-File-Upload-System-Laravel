<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AppHelper;
use Session;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Session::get('profile'); //profile set at login

        $profile_image = catcheFile( 
            public_path('images/upload/profile/' . Session::get('loginID') . '.' . $profile->image_path), 
            '/images/upload/profile/'.Session::get('loginID') . '.' . $profile->image_path );
        
        if (empty($profile_image))
        {
            $profile_image = catcheFile(
                public_path('images/upload/profile/profile-avatar.png'), 
                '/images/upload/profile/profile-avatar.png' );
        }

        return view('common.profile')->with('profile', $profile)->with('profile_image', $profile_image);
    }//index


    public function update_profile(Request $request)
    {
        $request->validate([
            'first_name'=>'required|regex:/^[a-zA-Z\- ]+$/',
            'last_name'=>'required|regex:/^[a-zA-Z\- ]+$/'
        ]);
        
        $user = [];
        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;

        
        $is_update = User::where('email', Session::get('loginID'))
            ->update( $user );

        if ($is_update)
        {
            $profile = Session::get('profile'); //profile set at login

            $profile->first_name = $request->first_name;
            $profile->last_name = $request->last_name;
            
            Session::put('profile', $profile);

            return back()->with('success', 'Profile Updated successfully');
        }

        else
            return back()->with('fail', 'Something went wrong');
    }//index


    public function update_profile_passport(Request $request)
    {
        //var_dump($request->profile_image); return;
        $request->validate([
            'profile_image'=>'required|max:2048|mimes:jpg,jpeg,png,gif'
        ]);

        $old_image = User::select('image_path')->where('email', Session::get('loginID'))->first();
        $old_image = $old_image->image_path;

        if ( file_exists(public_path('images/upload/profile/'.Session::get('loginID') . '.' .$old_image)) )
            unlink( public_path('images/upload/profile/'.Session::get('loginID') . '.' .$old_image) );
        
       
        $image_extension = $request->profile_image->extension();
        $request->profile_image->move(public_path('images/upload/profile'), Session::get('loginID') . '.' .$image_extension);
        
        $is_update = User::where('email', Session::get('loginID'))
            ->update( ['image_path'=>$image_extension] );

        if ($is_update)
        {
            $profile = Session::get('profile'); //profile set at login

            $profile->image_path = $image_extension;
            
            Session::put('profile', $profile);

            return back()->with('success', 'Image Updated successfully');
        }

        else
            return back()->with('fail', 'Something went wrong');
    }//index
}
