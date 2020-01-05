<?php

use App\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $task = DB::table('task')->get();

        // $task->TID = 1;
        // $task->Task_Name = 'Test';
        // $task->Task_Description = 'Test';
        // $task->Estimate = 10;
        // $task->OID = 1;

        // $task = DB::table('task')->get();

        // $task->TID = 2;
        // $task->Task_Name = 'Test';
        // $task->Task_Description = 'Test';
        // $task->Estimate = 10;
        // $task->OID = 1;

        // $task = DB::table('task')->get();

        // $task->TID = 3;
        // $task->Task_Name = 'Test';
        // $task->Task_Description = 'Test';
        // $task->Estimate = 10;
        // $task->OID = 1;

        // $task = DB::table('task')->get();

        // $task->TID = 4;
        // $task->Task_Name = 'Test';
        // $task->Task_Description = 'Test';
        // $task->Estimate = 10;
        // $task->OID = 1;

        // $task = DB::table('task')->get();

        // $task->TID = 5;
        // $task->Task_Name = 'Test';
        // $task->Task_Description = 'Test';
        // $task->Estimate = 10;
        // $task->OID = 1;

        // $task = DB::table('task')->get();

        // $task->TID = 6;
        // $task->Task_Name = 'Test';
        // $task->Task_Description = 'Test';
        // $task->Estimate = 10;
        // $task->OID = 2;

        // $task = DB::table('task')->get();

        // $task->TID = 7;
        // $task->Task_Name = 'Test';
        // $task->Task_Description = 'Test';
        // $task->Estimate = 10;
        // $task->OID = 2;

        // $task = DB::table('task')->get();

        // $task->TID = 8;
        // $task->Task_Name = 'Test';
        // $task->Task_Description = 'Test';
        // $task->Estimate = 10;
        // $task->OID = 2;

        // $task = DB::table('task')->get();

        // $task->TID = 9;
        // $task->Task_Name = 'Test';
        // $task->Task_Description = 'Test';
        // $task->Estimate = 10;
        // $task->OID = 2;

        // $task = DB::table('task')->get();

        // $task->TID = 10;
        // $task->Task_Name = 'Test';
        // $task->Task_Description = 'Test';
        // $task->Estimate = 10;
        // $task->OID = 2;

        DB::table('task')->insert([
            'TID' => '1',
            'Task_Name' => 'task 1',
            'Task_Description' => 'task 1',
            'Estimate' => '10',
            'OID' => '1',
        ]);

        DB::table('task')->insert([
            'TID' => '2',
            'Task_Name' => 'task 2',
            'Task_Description' => 'task 2',
            'Estimate' => '10',
            'OID' => '1',
        ]);

        DB::table('task')->insert([
            'TID' => '3',
            'Task_Name' => 'task 3',
            'Task_Description' => 'task 3',
            'Estimate' => '10',
            'OID' => '1',
        ]);

        DB::table('task')->insert([
            'TID' => '4',
            'Task_Name' => 'task 4',
            'Task_Description' => 'task 4',
            'Estimate' => '10',
            'OID' => '1',
        ]);

        DB::table('task')->insert([
            'TID' => '5',
            'Task_Name' => 'task 5',
            'Task_Description' => 'task 5',
            'Estimate' => '10',
            'OID' => '1',
        ]);

        DB::table('task')->insert([
            'TID' => '6',
            'Task_Name' => 'task 6',
            'Task_Description' => 'task 6',
            'Estimate' => '10',
            'OID' => '2',
        ]);

        DB::table('task')->insert([
            'TID' => '7',
            'Task_Name' => 'task 7',
            'Task_Description' => 'task 7',
            'Estimate' => '10',
            'OID' => '2',
        ]);

        DB::table('task')->insert([
            'TID' => '8',
            'Task_Name' => 'task 8',
            'Task_Description' => 'task 8',
            'Estimate' => '10',
            'OID' => '2',
        ]);

        DB::table('task')->insert([
            'TID' => '9',
            'Task_Name' => 'task 9',
            'Task_Description' => 'task 9',
            'Estimate' => '10',
            'OID' => '2',
        ]);

        DB::table('task')->insert([
            'TID' => '10',
            'Task_Name' => 'task 10',
            'Task_Description' => 'task 10',
            'Estimate' => '10',
            'OID' => '2',
        ]);
    }
}
