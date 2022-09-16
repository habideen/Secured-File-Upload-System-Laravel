<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\UpdateClientLog;
use Session;

class ManageClientController extends Controller
{
    public function index()
    {
        $clients = Client::select('id', 'email', 'first_name', 'last_name', 'created_by', 'created_at')
            ->where('created_by', Session::get('loginID'))->get();

        return view('user.manage_client')->with('clients', $clients);
    }//index

    
    public function all_clients()
    {
        $clients = Client::select('id', 'email', 'first_name', 'last_name', 'created_by', 'created_at')->get();

        return view('user.all_clients')->with('clients', $clients);
    }//index

    
    public function register_client(Request $request)
    {
        $request->validate([
            'first_name'=>'required|regex:/^[a-zA-Z\- ]+$/',
            'last_name'=>'required|regex:/^[a-zA-Z\- ]+$/',
            'email'=>'required|email|unique:clients'
        ]);

        $client = new Client();
        $client->first_name = ucwords($request->first_name);
        $client->last_name = ucwords($request->last_name);
        $client->email = strtolower($request->email);
        $client->created_by = Session::get('loginID');
        $save = $client->save();

        if ($save)
        {
            return back()->with('success', 'CLient registered registered successfully.');
        }
        else
        {
            return back()->with('fail', 'Something went wrong');
        }

    }//register_client

    
    public function update_client(Request $request)
    {
        $request->validate([
            'edit_first_name'=>'required|regex:/^[a-zA-Z\- ]+$/',
            'edit_last_name'=>'required|regex:/^[a-zA-Z\- ]+$/',
            'email'=>'required|email|exists:clients'
        ]);

        $client = [];
        $client['first_name'] = ucwords($request->edit_first_name);
        $client['last_name'] = ucwords($request->edit_last_name);

        $is_update = Client::where('email', $request->email)->update($client);

        $log = new UpdateClientLog();
        $log->updated_by = Session::get('loginID');
        $log->client = strtolower($request->email);
        $log->save();

        if ($is_update)
        {
            return back()->with('success', 'Record editted successfully');
        }
        else
        {
            return back()->with('fail', 'Something went wrong');
        }

    }//update_system_client

}
