<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clients = Client::orderBy('Client_Name');

        $clients = $clients->get();

        return view('client.viewClient', compact('clients'));
    }

    public function show(Client $client)
    {
        // $contacts = Contact::where('cust_id', $client->id)->get();

        $client->load([
            'projects' => function ($query) {
                $query->orderBy('statusKey', 'ASC');
                $query->orderBy('projectId', 'DESC');
            }
        ]);

        $projects = $client->projects;

        // $projects = Self::loadProjectsHours($projects);

        return view('client.show', compact('client', 'projects', 'contacts'));
    }

    public function create()
    {
        return view('client.createClient');
    }

    public function store(Request $request){
        //validate data
        // dd($request);
        $validatedData = $request->validate([
            'cvr' => 'required',
            'name' => 'required|max:255',
            'price' => 'required'
        ]);
        $client = new Client;
        $client->CVR = $request->cvr;
        $client->Client_Name = $request->name;
        $client->Default_Price = $request->price;

        if($client->save())
        {
            return redirect()->route('client.viewClient');
        }else{
            $error = "Client not created!";
            return view('client.createClient', compact('error'));
        }
    }

    public function delete(Request $request){
        DB::table('Clients')->where('CVR', '=', $request->cvr)->delete();
    }
}
