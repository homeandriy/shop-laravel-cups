<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(
            [
                PermissionSeeder::class,
                UsersSeeder::class,
                SizeSeeder::class,
                ColorSeeder::class,
                BrandsSeeder::class,
                CategoryProductSeeder::class,
                OrderStatusesSeeder::class,
                ProductAttributesSeeder::class,
            ]
        );
    }
}
