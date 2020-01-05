<?php

use App\Template;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $template = DB::table('template')->get();

        // $template->TempID = 1;
        // $template->Template_Name = 'Test';
        // $template->Template_Desctiption = 'Test';
        // $template->Estimate = 10;

        DB::table('template')->insert([
            'TempID' => '1',
            'Template_Name' => 'template 1',
            'Template_Description' => 'template 1',
            'Estimate' => '10',
        ]);
    }
}
