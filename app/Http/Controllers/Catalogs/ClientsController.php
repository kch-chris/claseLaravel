<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClientsRequest;
use App\Models\Clients;


class ClientsController extends Controller
{
    public function index(){

        $clients = Clients::where('clientsID','>', 0)->get();;
        
        return view('catalogs.clients.index')->with('clients',$clients);

    }

    public function create()
    {
        $method="post";
        $url="/clients";

        return view('catalogs.clients.form')->with([
            'method'=>$method ,
            'url' => $url
        ]);
    }

    public function store(ClientsRequest $request)
    {
        // dd($request->post('description'));

        $newClient = new Clients();

        $newClient->name = $request->post('name');
        $newClient->lastname = $request->post('lastname');
        $newClient->email = $request->post('email');
        $newClient->phone = $request->post('phone');
        $newClient->age = $request->post('age');
        $newClient->sex = $request->post('sex');
        $newClient->credit = $request->post('credit');

        $newClient->save();

        return redirect()->route('clients.index');
    }

    public function edit($client)
    {
        $method="put";
        $url="/clients/".$client;

        $client = Clients::where('clientsID', '=' , $client)->firstOrFail();
        // dd($client);
        return view('catalogs.clients.form')->with([
            'client'=>$client,
            'method'=>$method ,
            'url' => $url
            ]);
    }

    public function update($clientID,ClientsRequest $request)
    {
        $client = Clients::where('clientsID', '=' , $clientID)->firstOrFail();

        $client->name = $request->post('name');
        $client->lastname = $request->post('lastname');
        $client->email = $request->post('email');
        $client->phone = $request->post('phone');
        $client->age = $request->post('age');
        $client->sex = $request->post('sex');
        $client->credit = $request->post('credit');

        $client->save();

        return redirect()->route('clients.index');

    }

    public function destroy($clientID)
    {
        Clients::destroy($clientID);

        return redirect()->route('clients.index');
    }
}
