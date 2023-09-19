<?php

namespace Database\Seeders;

use App\Models\Attributes\Color;
use App\Models\Attributes\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $sizes = [
            [
                'name'        => 'S',
                'slug'        => 's-size',
                'description' => '',
            ],
            [
                'name'        => 'M',
                'slug'        => 'm-size',
                'description' => '',
            ],
            [
                'name'        => 'L',
                'slug'        => 'l-size',
                'description' => '',
            ],
            [
                'name'        => 'XL',
                'slug'        => 'xl-size',
                'description' => '',
            ],
            [
                'name'        => 'XXL',
                'slug'        => 'xxl-size',
                'description' => '',
            ],
            [
                'name'        => 'XXXL',
                'slug'        => 'xxxl-size',
                'description' => '',
            ],
        ];

        foreach ( $sizes as $size ) {
            Size::factory()->create( $size );
        }
    }
}
