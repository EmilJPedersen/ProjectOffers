<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $offers = Offer::orderBy('OID');

        $offes = $offers->get();

        return view('offer.viewOffer', compact('offers'));
    }
}
