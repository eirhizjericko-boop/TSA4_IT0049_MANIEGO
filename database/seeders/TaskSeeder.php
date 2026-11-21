<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $today = Carbon::today();

        DB::table('tasks')->insert([
            ['title' => 'Review today\'s sales summary', 'status' => 'pending', 'task_date' => $today->toDateString(), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Check the stock count', 'status' => 'in progress', 'task_date' => $today->toDateString(), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Prepare the afternoon report', 'status' => 'pending', 'task_date' => $today->toDateString(), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Clean the cashier station', 'status' => 'done', 'task_date' => $today->copy()->subDay()->toDateString(), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Update the supplier list', 'status' => 'pending', 'task_date' => $today->copy()->subDay()->toDateString(), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Plan next week\'s schedule', 'status' => 'pending', 'task_date' => $today->copy()->addDay()->toDateString(), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Review new product notes', 'status' => 'pending', 'task_date' => $today->copy()->addDay()->toDateString(), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Archive last month\'s receipts', 'status' => 'done', 'task_date' => $today->copy()->addDays(2)->toDateString(), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
