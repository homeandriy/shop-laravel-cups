<?php

namespace Database\Seeders;

use App\Enums\Country;
use App\Models\Attributes\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $brands = [
            [
                'name'        => 'My Print',
                'slug'        => 'my-print',
                'description' => 'Продукція від My Print',
                'country'     => Country::UKRAINE
            ]
        ];
        foreach ( $brands as $brand ) {
            Brand::factory()->create( $brand );
        }
    }
}
