<?php

namespace App\Http\Controllers;
use DB;
use Mail;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $to_name = 'Habideen Ibrahim';
        $first_name = 'Ibrahim';
        $last_name = 'Habideen';
        $to_email = 'habideenibrahim@gmail.com';
        $to_subject = 'Artisans Web Testing Mail';
        $data = array('name'=>"Sam Jose", "body" => upload_link_email($first_name, $last_name, '$token', '$home', '$link'));
            
        Mail::send('public.mail', $data, function($message) use ($to_email, $to_subject, $to_name) {
            $message->to('habideenibrahim@gmail.com', $to_name)
                    ->subject($to_subject);
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
        });


        $to_name = 'Habideen Ibrahim';
        $first_name = 'Ibrahim';
        $last_name = 'Habideen';
        $to_email = 'habideenibrahim@gmail.com';
        $to_subject = 'Artisans Web Testing Mail';
    
        Mail::send('mail.file_transfer_link', $data, function($message) use ($to_email, $to_subject, $to_name) {
            $message->to('habideenibrahim@gmail.com', $to_name)
                    ->subject($to_subject);
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
        });



        return view('public.index');
    }//index


    public function emails_mail()
    {

    }


    public function privacy_policy()
    {
        return view('public.privacy_policy');
    }//privacy_policy


    public function contact_us()
    {
        return view('public.contact_us');
    }//contact_us


    public function about_us()
    {
        return view('public.about_us');
    }//about_us


    public function login()
    {
        return view('public.login');
    }//login


    public function forgot_password()
    {
        return view('public.forgot_password');
    }//forgot_password
}
