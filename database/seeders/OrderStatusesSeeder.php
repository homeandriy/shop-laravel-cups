<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        dd(\App\Enums\OrderStatus::cases());
        foreach(\App\Enums\OrderStatus::cases() as $key => $constValue) {
            OrderStatus::firstOrCreate(['name' => $constValue]);
        }
    }
}
