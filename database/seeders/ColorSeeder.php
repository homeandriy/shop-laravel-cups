<?php

namespace Database\Seeders;

use App\Models\Attributes\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $colors = [
            [
                'name'        => 'Блакитний',
                'slug'        => 'blue',
                'hex'         => '#87CEEB',
            ],
            [
                'name'        => 'Бордовий',
                'slug'        => 'burgundy',
                'hex'         => '#800000',
            ],
            [
                'name'        => 'Бірюзовий',
                'slug'        => 'turquoise',
                'hex'         => '#30D5C8',
            ],
            [
                'name'        => 'Жовтий',
                'slug'        => 'yellow',
                'hex'         => '#FFFF00',
            ],
            [
                'name'        => 'Зелений',
                'slug'        => 'green',
                'hex'         => '#008000',
            ],
            [
                'name'        => 'Помаранчевий',
                'slug'        => 'orange',
                'hex'         => '#FF8C00',
            ],
            [
                'name'        => 'Пурпурний',
                'slug'        => 'purple',
                'hex'         => '#8B008B',
            ],
            [
                'name'        => 'Рожевий',
                'slug'        => 'pink',
                'hex'         => '#FF69B4',
            ],
            [
                'name'        => 'Салатовий',
                'slug'        => 'lettuce',
                'hex'         => '#7CFC00',
            ],
            [
                'name'        => 'Сірий',
                'slug'        => 'gray',
                'hex'         => '#808080',
            ],
            [
                'name'        => 'Темно синій',
                'slug'        => 'dark-blue',
                'hex'         => '#00008B',
            ],
            [
                'name'        => 'Червоний',
                'slug'        => 'red',
                'hex'         => '#FF0000',
            ],
            [
                'name'        => 'Чорний',
                'slug'        => 'black',
                'hex'         => '#000000',
            ],
        ];

        foreach ( $colors as $color ) {
            Color::factory()->create( $color );
        }
    }
}
