<?php

use App\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task();

        $task->TID = 1;
        $task->Task_Name = 'Test';
        $task->Task_Desctiption = 'Test';
        $task->Estimate = 10;
        $task->OID = 1;
    }
}
