<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\FileTransfer;
use App\LinkExpiration;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }//index

    
    public function all_clients()
    {
        $clients = Client::select('id', 'email', 'first_name', 'last_name', 'created_by', 'created_at')->get();

        return view('user.all_clients')->with('clients', $clients);
    }//all_clients



    public function client_file_transfer($id)
    {
        $link_expiration = LinkExpiration::select('link_expiration')->first()->link_expiration;

        $client_profile = Client::select('first_name', 'last_name', 'email')->where('id', $id)->first();

        $transfer_links = FileTransfer::select('id', 'url_code', 'status', 'updated_at', 'created_by')
            ->where('client', $client_profile->email)->get();

        
        return view('user.client_transfers')->with('client_profile', $client_profile)->with('transfer_links', $transfer_links)
                ->with('link_expiration', $link_expiration);
    }//client_file_transfer
    
}
