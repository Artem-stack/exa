<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    static $status = [
        'Berlin',
        'Rio',
        'Tokyo'
}

foreach (self::$status as $status) {
            DB::table('status')->insert([
                'name' => $status,
                
            ]);
    }
