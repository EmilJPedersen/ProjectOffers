<?php

use App\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $template = new Template();

        $template->TempID = 1;
        $template->Template_Name = 'Test';
        $template->Template_Desctiption = 'Test';
        $template->Estimate = 10;
    }
}
