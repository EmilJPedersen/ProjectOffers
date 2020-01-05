<?php

use App\Offer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $offer = DB::table('offer')->get();

        // $offer->OID = 1;
        // $offer->Offer_Name = 'Test1';
        // $offer->Offer_Desctiption = 'Test1';
        // $offer->CVR = 123456789;

        DB::table('offer')->insert([
            'OID' => '1',
            'offer_Name' => 'offer 1',
            'Offer_Description' => 'offer 1',
            'CVR' => '123456789',
        ]);

        // $offer = DB::table('offer')->get();

        // $offer->OID = 2;
        // $offer->Offer_Name = 'Test2';
        // $offer->Offer_Desctiption = 'Test2';
        // $offer->CVR = 123456789;

        DB::table('offer')->insert([
            'OID' => '2',
            'offer_Name' => 'offer 2',
            'Offer_Description' => 'offer 2',
            'CVR' => '123456789',
        ]);
    }
}
