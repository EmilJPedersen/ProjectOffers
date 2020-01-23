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
        DB::table('client')->insert([
            'CVR' => '123456789',
            'Client_Name' => 'uptime',
            'Default_Price' => '970',
        ]);
    }
}
