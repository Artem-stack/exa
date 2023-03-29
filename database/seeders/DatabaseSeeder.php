<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    static $status = [
        'New',
        'Working',
        'Done'
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();

foreach (self::$status as $status) {
            DB::table('status')->insert([
                'name' => $status,
                
            ]);
        }
    }
}