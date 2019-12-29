<?php

namespace App\Http\Controllers;


// use App\Project\Enum\AccountTypeEnum;
// use App\Project\User\User;
use Illuminate\Http\Request;
use App\Project\Client\Client;
// use App\Project\Project\Project;
use App\Project\Address\Address;
// use App\Project\Contact\Contact;
use Illuminate\Support\Facades\DB;
// use App\Project\Task\Task;

class ClientController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clients = Client::orderBy('CVR');

        $clients = $clients->get();

        return view('client.index', compact('clients'));
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

    // public function loadProjectsHours (iterable $projects){

    //     $worked = [];
    //     $invoiced = [];

    //     foreach ($projects as $project) {
    //         $hours = Task::where('projectId', $project->projectId)
    //                                 ->select([
    //                                     DB::raw('IFNULL(SUM(worked), 0) as worked'),
    //                                     DB::raw('IFNULL(SUM(consumed), 0) as invoiced')
    //                                 ])
    //                                 ->first();

    //         array_push($worked, $hours->worked);
    //         array_push($invoiced, $hours->invoiced);

    //         $project['worked'] = $hours->worked;
    //         $project['invoiced'] = $hours->invoiced;

    //         if ($project->invoiced && $project->worked ) {
    //             $project['invoicedPercent'] = round(($project->invoiced / $project->worked) * 100, 0);
    //         }
    //         if (!$project->worked) {
    //             $project['invoicedPercent'] = 100;
    //         }
    //         if (!$project->invoiced) {
    //             $project['invoicedPercent'] = 0;
    //         }
    //         if (!$project->invoiced && !$project->worked){
    //             $project['invoicedPercent'] = '';
    //         }
    //     }

    //     return $projects;
    // }

    // public function timesheets(Client $client)
    // {
    //     $clients = Client::select('id', 'name')->where('enabled', '1')->orderBy('name')->get();
    //     $projects = Project::select('projectId', 'cust_id', 'name')->where('statusKey', '<=', '100')->orderBy('name')->get();
    //     $members = User::getAll();

    //     return view('client.timesheets', compact('client', 'clients', 'projects', 'members'));
    // }

    // public function contacts(Client $client)
    // {
    //     $clients = Client::select('id', 'name')->where('enabled', '1')->orderBy('name')->get();

    //     if (isset(request()->clientId)) {
    //         $client = Client::findOrFail(request()->clientId);
    //     }

    //     $contacts = $client->load('contacts')->contacts;
    //     return view('client.contacts', compact('client', 'clients', 'contacts'));
    // }

    public function create()
    {
        return view('client.createClient');
    }

    public function store(Request $request){
        //validate data
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
            return redirect()->route('client.index', $client->id); //client.show
        }else{
            $error = "Client not created!";
            return view('client.createClient', compact('error'));
        }
    }

    public function delete(Request $request){
        DB::table('Clients')->where('CVR', '=', $request->cvr)->delete();
    }
}
