<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_offer_data();
     return view('dynamic_pdf')->with('customer_data', $customer_data);
    }

    function get_offer_data()
    {
        $tasks = DB::table('offer')->get();
        return $tasks;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_offer_data_to_html());
        return $pdf->stream();
    }

    function convert_offer_data_to_html()
    {
        $tasks = $this->get_offer_data();
        $output = '
        <h3 align="center">Customer Data</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
            <th style="border: 1px solid; padding:12px;">TID</th>
            <th style="border: 1px solid; padding:12px;">Task Name</th>
            <th style="border: 1px solid; padding:12px;">Task Description</th>
            <th style="border: 1px solid; padding:12px;">Estimate</th>
            <th style="border: 1px solid; padding:12px;">OID</th>
        </tr>
        ';
        foreach($tasks as $task)
        {
            $output .= '
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$task->TID.'</td>
                <td style="border: 1px solid; padding:12px;">'.$task->Task_Name.'</td>
                <td style="border: 1px solid; padding:12px;">'.$task->Task_Description.'</td>
                <td style="border: 1px solid; padding:12px;">'.$task->Estimate.'</td>
                <td style="border: 1px solid; padding:12px;">'.$task->OID.'</td>
            </tr>
           ';
        }
        $output .= '</table>';
        return $output;
    }
}
