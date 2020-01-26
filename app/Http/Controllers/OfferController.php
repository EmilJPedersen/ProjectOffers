<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Template;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $offers = DB::table('offer')->get();

        if ($offers == null) {
            dd("fail");
        }else{
            // dd($offers->Offer_Name);
            return view('offer.viewOffer', compact('offers'));
        }
    }

    public function getTask($resault)
    {
        $tasks = DB::table('task')->where('OID', $resault)->get();
        return view('offer.viewTask', compact('tasks'));
    }

    public function getOffer($resault)
    {
        $offers = DB::table('offer')->where('CVR', $resault)->get();
        return view('offer.viewOffer', compact('offers'));
    }

    public function getTemplates()
    {
        $templates = DB::table('template')->get();
        return view('offer.viewTemplate', compact('templates'));
    }

    public function create()
    {
        $templates = DB::table('template')->get();
        $clients = DB::table('client')->get();
        // $clients = new Client;
        // $templates = new Template;
        // dd($templates, $clients);
        return view('offer.createOffer', compact('clients', 'templates'));
    }

    public function store(Request $request){
        // $validatedData = $request->validate([
        //     'projectName' => 'required',
        //     'projectDescription' => 'required',
        //     'cvr' => 'required',
        // ]);
        $offer = DB::table('offer')->get();
        // $offer = new Offer();
        $offer->Offer_Name = $request->projectName;
        $offer->Offer_Description = $request->projectDescription;
        $offer->CVR = $request->cvr;

        $tasks = $request->tasks;
            dd($request);
        foreach($request as $t){
            $task = $t->tasks;
            $task_ = DB::table('task')->get();
            $task_->Task_Name = $task->title;
            $task_->Task_Description = $task->description;
            $task_->Estimate = $task->estimate;

            $offer = DB::table('offer')->orderBy('OID', 'DESC')->first();
            $task_->Task_Name = $offer->OID;

            // $task->save();

            if($task->save == true){
                $template = DB::table('Template')->get();
                $template->Task_Name = $task->title;
                $template->Task_Description = $task->description;
                $template->Estimate = $task->estimate;
            }
        }


        if($offer->save() || $task->save())
        {
            return redirect()->route('offer.viewOffer'); //client.show
        }else{
            $error = "Client not created!";
            return view('offer.createOffer', compact('error'));
        }
    }
}
