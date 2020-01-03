<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();

        $client->CVR = 123456789;
        $client->Client_Name = 'Uptime';
        $client->Default_Price = 970;
    }
}
