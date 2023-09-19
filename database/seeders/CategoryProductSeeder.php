<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table( 'category_product' )->delete();
        DB::table( 'categories' )->delete();
        DB::table( 'products' )->delete();

        $categories = [
            [
                'name'        => 'Чашки',
                'slug'        => 'cups',
                'description' => '',
            ],
            [
                'name'        => 'Футболки',
                'slug'        => 't-shirts',
                'description' => '',
            ],
            [
                'name'        => 'Сумки-шоппери',
                'slug'        => 'shopper-bags',
                'description' => '',
            ],
        ];
        foreach ( $categories as $category ) {
            Category::factory()->create( $category );
        }
    }
}
