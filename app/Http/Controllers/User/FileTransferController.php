<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\FileTransfer;
use App\LinkExpiration;
use Session;
use Storage;
use Mail;


class FileTransferController extends Controller
{
    public function index($id)
    {
        $link_expiration = LinkExpiration::select('link_expiration')->first()->link_expiration;

        $client_profile = Client::select('first_name', 'last_name', 'email')->where('id', $id)->first();

        $transfer_links = FileTransfer::select('id', 'url_code', 'status', 'updated_at', 'created_by')
            ->where('client', $client_profile->email)->get();

        
        return view('user.client_transfers')->with('client_profile', $client_profile)->with('transfer_links', $transfer_links)
                ->with('link_expiration', $link_expiration);
    }//index




    public function generate_transfer_link(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:clients'
        ]);

        $random_str = random_str(100);
        $get_url_code = get_url_code();
        $get_transfer_token = get_transfer_token();//this code will be for URL security

        $link_expiration = LinkExpiration::select('link_expiration')->first()->link_expiration;
        
        $data = FileTransfer::select('id', 'client', 'url_code', 'token')
            //->whereDate('updated_at', '>=', date('Y-m-d', strtotime(date('Y-m-d') . " + {$link_expiration} days")))
            ->where('status', '0')
            ->where('client', $request->email)->first();

        if ( !empty($data) )
        {
            $transfer = [];
            $transfer['file_prefix'] = $random_str;
            $transfer['url_code'] = $get_url_code;
            $transfer['token'] = $get_transfer_token;

            $update = FileTransfer::where('client', $request->email)->where('status', '0')
                ->update($transfer);

            if ($update)
            {
                $this->send_link_mail($data->id);

                return back()->with('success', 'Transfer link updated successfully');
            }

            else
                return back()->with('fail', 'Something went wrong. Please try again.');
        }


        $transfer_link = new FileTransfer();
        $transfer_link->client = strtolower($request->email);
        $transfer_link->file_prefix = $random_str;
        $transfer_link->url_code = $get_url_code;
        $transfer_link->token = $get_transfer_token;
        $transfer_link->created_by = Session::get('loginID');
        $save = $transfer_link->save();


        if ($save)
        {
            $this->send_link_mail($transfer_link->id);

            return back()->with('success', 'Link generated successfully.');
        }
        else
        {
            return back()->with('fail', 'Something went wrong');
        }

    }//register_client




    private function send_link_mail($link_id)
    {
        $data = FileTransfer::select('client', 'url_code', 'token')->where('id', $link_id)->first();

        $client_profile = Client::select('first_name', 'last_name')->where('email', $data->client)->first();
            
        $message = upload_link_email(
            $client_profile->first_name, 
            $client_profile->last_name, 
            $data->token, 
            env('APP_URL'), 
            url('/upload/login/' . $data->url_code)
        );

        ///TODO : Send Email to client
        // $first_name = $client_profile->first_name;
        // $last_name = $client_profile->last_name;
        $to_email = $data->client;
        $to_name = $client_profile->first_name . ' ' . $client_profile->last_name;
        $to_subject = env('APP_NAME') . ' File Transfer Link';

        $mail_data = array(
            'first_name' => $client_profile->first_name,
            'last_name' => $client_profile->last_name,
            'to_email' => $data->client,
            'token' => $data->token,
            'url_code' => $data->url_code,
            'to_subject' => env('APP_NAME') . ' File Transfer Link',
            'home' => url('/'),
            'link' => url('/upload/login/'.$data->url_code)
        );
    
        Mail::send(
            'mail.file_transfer_link', 
            $mail_data, 
            function($message) use ( $to_subject, $to_email, $to_name ) {
            $message->to($to_email, $to_name)
                    ->subject($to_subject);
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
        });
    }




    public function upload_login(Request $request, $url_code)
    {
        return view('file_upload.login')->with('url_code', $url_code);
    }//upload_login()




    public function verify_code(Request $request, $url_code)
    {
        $request->validate([
            'email'=>'required|email',
            'token'=>'required'
        ]);
        
        $link_expiration = LinkExpiration::select('link_expiration')->first()->link_expiration;
        
        $data = FileTransfer::select('client', 'url_code', 'token')
            ->whereDate('updated_at', '<', date('Y-m-d', strtotime(date('Y-m-d') . " + {$link_expiration} days")))
            ->where('status', '0')
            ->where('client', $request->email)
            ->where('url_code', $url_code)
            ->where('token', $request->token)->first();

        if ( !empty($data) )
        {
            configureCookie(
                [
                    'url_code' => $data->url_code,
                    'token'    => $data->token,
                    'client'   => $data->client
                ], 

                'upload_token'//cookie_name
            ); //configure and set cookie
            
            return redirect('/upload/add_file/'.$data->url_code);
        }
        else
        {
            return back()->with('fail', 'Link does not exist or has expired');
        }

    }//verify_code()




    public function push_page(Request $request, $url_code)
    {
        //Decrypt cookie and verify
        $access = getCookie('upload_token');

        if ( empty($access) )
            return redirect('/upload/login/'.$url_code);


        $link_expiration = LinkExpiration::select('link_expiration')->first()->link_expiration;
        
        $data = FileTransfer::select('id', 'file_prefix', 'created_at')
            ->whereDate('updated_at', '<', date('Y-m-d', strtotime(date('Y-m-d') . " + {$link_expiration} days")))
            ->where('status', '0')
            ->where('client', $access->client)
            ->where('url_code', $access->url_code)
            ->where('token', $access->token)->first();

        
        //     $access->client       $access->token       $access->url_code
        
        if ( empty($data->file_prefix) )
        {
            echo 'This page has expired. You will be redirected to login page.';
            return;
        }
        

        $created_at = date('Ymdhis', strtotime($data->created_at));
        $file_path = "{$data->id}_{$data->file_prefix}_{$created_at}";

        $upload_path = 'private/file_upload'; //root director for upload

        $client_path = $upload_path . '/' . $file_path; //path for user to upload

        $file_list = Storage::disk('local')->files( $client_path . '/' . $request->name );
        //dd($file_list);
        return view('file_upload.upload')
            ->with('jwt', getCookie_raw('upload_token'))
            ->with('url_code', $url_code)
            ->with('file_list', $file_list);
    }//push_page()




    public function push_file(Request $request)
    {        
        //Decrypt cookie and verify
        $access = getCookie('upload_token');

        if ( empty($access) )
            return response('This page has expired. You will be redirected to login page.', 401);


        $link_expiration = LinkExpiration::select('link_expiration')->first()->link_expiration;
        
        $data = FileTransfer::select('id', 'file_prefix', 'created_at')
            ->whereDate('updated_at', '<', date('Y-m-d', strtotime(date('Y-m-d') . " + {$link_expiration} days")))
            ->where('status', '0')
            ->where('client', $access->client)
            ->where('url_code', $access->url_code)
            ->where('token', $access->token)->first();

        
        //     $access->client       $access->token       $access->url_code
        
        if ( empty($data->file_prefix) )
            return response('This link has expired. Please contact us to get a new link.', 401);

        
        //error repo for js plugin
        $custom_error= array();


        $created_at = date('Ymdhis', strtotime($data->created_at));
        $file_path = "{$data->id}_{$data->file_prefix}_{$created_at}";

        $upload_path = 'private/file_upload'; //root director for upload

        $client_path = $upload_path . '/' . $file_path; //path for user to upload
        
        if ( !Storage::disk('local')->exists( $client_path ) )        
            Storage::makeDirectory( $client_path );


        $contents = file_get_contents( $request->myFile->getRealPath() );

        
        if ( Storage::disk('local')->exists( $client_path . '/' . $request->myFile->getClientOriginalName() ) )
        {
            $custom_error['jquery-upload-file-error']="File already exists";
            echo json_encode($custom_error);
            die();
        }

            
        Storage::disk('local')->put( $client_path . '/' . $request->myFile->getClientOriginalName(), $contents);

        $ret[]= $request->myFile->getClientOriginalName();

        echo json_encode($ret); return;

    }//push_page()



    public function delete_file(Request $request)
    {   // echo 'abc'; return;
        if ( !(isset($request->op) && $request->op == 'delete' && isset($request->name)) )
        {
            echo 'Invalid data supplied.';
            return;
        }

              
        //Decrypt cookie and verify
        $access = getCookie('upload_token');

        if ( empty($access) )
        {
            echo 'This page has expired. You will be redirected to login page.';
            return;
        }

        
        $link_expiration = LinkExpiration::select('link_expiration')->first()->link_expiration;
        
        $data = FileTransfer::select('id', 'file_prefix', 'created_at')
            ->whereDate('updated_at', '<', date('Y-m-d', strtotime(date('Y-m-d') . " + {$link_expiration} days")))
            ->where('status', '0')
            ->where('client', $access->client)
            ->where('url_code', $access->url_code)
            ->where('token', $access->token)->first();
        
        if ( empty($data->file_prefix) )
        {
            echo 'This page has expired. You will be redirected to login page.';
            return;
        }


        $created_at = date('Ymdhis', strtotime($data->created_at));
        $file_path = "{$data->id}_{$data->file_prefix}_{$created_at}";

        $upload_path = 'private/file_upload'; //root director for upload

        $client_path = $upload_path . '/' . $file_path; //path for user to upload
        
        if ( Storage::disk('local')->exists( $client_path . '/' . $request->name ) )
        {
            Storage::disk('local')->delete( $client_path . '/' . $request->name );

            echo json_encode( $request->name . ' deleted' );

            return;
        }


        echo json_encode( ['msg'=>$client_path . '/' . $request->name] );
    }//delete_file




    public function submit_file(Request $request)
    {   
        //Decrypt cookie and verify
        $access = getCookie('upload_token');

        if ( empty($access) )
        {
            return back()->with('fail', 'This page has expired. You will be redirected to login page.');
        }

        
        $link_expiration = LinkExpiration::select('link_expiration')->first()->link_expiration;
        
        $data = FileTransfer::select('id', 'file_prefix', 'created_at')
            ->whereDate('updated_at', '<', date('Y-m-d', strtotime(date('Y-m-d') . " + {$link_expiration} days")))
            ->where('status', '0')
            ->where('client', $access->client)
            ->where('url_code', $access->url_code)
            ->where('token', $access->token)->first();
        
        if ( empty($data->file_prefix) )
        {
            return back()->with('fail', 'This page has expired. You will be redirected to login page.');
        }


        $is_update = FileTransfer::where('status', '0')
            ->where('client', $access->client)
            ->where('url_code', $access->url_code)
            ->where('token', $access->token)
            ->update(['status'=>'1']);

        if ($is_update)
        {
            removeCookie('upload_token');
            return redirect('/upload/login/'.$access->url_code)->with('success', 'File upload submited successfully');
        }

        else
            return back()->with('fail', 'Something went wrong');
    }//submit



    public function download_file($transfer_id)
    {   
        if (empty(Session::get('loginID')))
            return redirect('/login');


        $data = FileTransfer::select('id', 'file_prefix', 'created_at', 'client')
            ->where('id', $transfer_id)->first();
        
        if ( empty($data->file_prefix) )
        {
            return;
        }

        $created_at = date('Ymdhis', strtotime($data->created_at));
        $file_path = "{$data->id}_{$data->file_prefix}_{$created_at}";

        $upload_path = 'private/file_upload'; //root director for upload

        $client_path = $upload_path . '/' . $file_path; //path for user to upload

        if ( Storage::disk('local')->exists( $client_path .'/temp.zip' ) )
        {
            Storage::disk('local')->delete( $client_path .'/temp.zip' );
        }

        $storage = Storage::disk('local')->path( $client_path );
        
        zipFolder($storage, $storage.'/temp.zip');

        return Storage::disk('local')->download( 
                                $client_path . '/temp.zip',  
                                "{$data->id}_{$data->client}_{$data->created_at}.zip"
        );

    }
}
