<?php

use App\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $offer = new Offer();

        $offer->OID = 1;
        $offer->Offer_Name = 'Test1';
        $offer->Offer_Desctiption = 'Test1';
        $offer->CVR = 123456789;

        $offer = new Offer();

        $offer->OID = 2;
        $offer->Offer_Name = 'Test2';
        $offer->Offer_Desctiption = 'Test2';
        $offer->CVR = 123456789;
    }
}
