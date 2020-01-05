<?php

use App\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $client = new Client();
        // $client = DB::table('client')->get();

        // $client->CVR = 123456789;
        // $client->Client_Name = 'Uptime';
        // $client->Default_Price = 970;

        DB::table('client')->insert([
            'CVR' => '123456789',
            'Client_Name' => 'uptime',
            'Default_Price' => '970',
        ]);
    }
}
