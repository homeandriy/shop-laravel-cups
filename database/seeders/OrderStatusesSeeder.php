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
        foreach(\App\Enums\OrderStatus::cases() as $key => $constValue) {
            OrderStatus::firstOrCreate(['name' => $constValue]);
        }
    }
}
