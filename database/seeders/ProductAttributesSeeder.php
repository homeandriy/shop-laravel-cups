<?php

namespace Database\Seeders;

use App\Models\Attributes\Brand;
use App\Models\Attributes\Color;
use App\Models\Image;
use App\Models\Product;
use App\Services\FileStorageService;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Seeder;
use Storage;

class ProductAttributesSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $products = [
            [
                'title'       => 'Чашка з зображенням голуба',
                'slug'        => 'chashka-z-zobrazhienniam-gholuba',
                'description' => '',
                'SKU'         => 'ch-0001',
                'price'       => '280',
                'discount'    => '21',
                'quantity'    => '10',
                'thumbnail'   => $this->loadThumbnail(),
                'brand_id'    => Brand::first()->id,
            ],
            [
                'title'       => 'Чашка з зображенням кота британця',
                'slug'        => 'chashka-z-zobrazhienniam-kota-britantsia',
                'description' => '',
                'SKU'         => 'ch-0002',
                'price'       => '280',
                'discount'    => '21',
                'quantity'    => '10',
                'thumbnail'   => $this->loadThumbnail(),
                'brand_id'    => Brand::first()->id,
            ],
            [
                'title'       => 'Чашка ностальгія',
                'slug'        => 'chashka-nostal-ghiia',
                'description' => '',
                'SKU'         => 'ch-0003',
                'price'       => '280',
                'discount'    => '21',
                'quantity'    => '10',
                'thumbnail'   => $this->loadThumbnail(),
                'brand_id'    => Brand::first()->id,
            ],
            [
                'title'       => 'Чашка з цікавим надписом',
                'slug'        => 'chashka-z-tsikavim-nadpisom',
                'description' => '',
                'SKU'         => 'ch-0004',
                'price'       => '280',
                'discount'    => '21',
                'quantity'    => '10',
                'thumbnail'   => $this->loadThumbnail(),
                'brand_id'    => Brand::first()->id,
            ],
            [
                'title'       => 'Чашка з передбаченнями',
                'slug'        => 'chashka-z-pieriedbachienniami',
                'description' => '',
                'SKU'         => 'ch-0005',
                'price'       => '280',
                'discount'    => '21',
                'quantity'    => '10',
                'thumbnail'   => $this->loadThumbnail(),
                'brand_id'    => Brand::first()->id,
            ],
            [
                'title'       => 'Чашка хамелеон з орнаментом',
                'slug'        => 'chashka-khamielieon-z-ornamientom',
                'description' => '',
                'SKU'         => 'ch-0006',
                'price'       => '280',
                'discount'    => '21',
                'quantity'    => '10',
                'thumbnail'   => $this->loadThumbnail(),
                'brand_id'    => Brand::first()->id,
            ],
        ];
        foreach ( $products as $product ) {
            Product::factory()
                   ->hasAttached(
                       Color::all(),
                       [
                           'quantity' => 15,
                           'price'    => 280,
                           'active'   => 1,
                           'discount' => 21,
                       ]
                   )
//                ->for(
//                    Image::factory(),
//                    'imageable'
//                )
                   ->create( $product );
        }
    }

    public function loadThumbnail(): string {
        $files      = Storage::disk( 'public' )->allFiles( 'images' );
        $randomFile = $files[ rand( 0, count( $files ) - 1 ) ];
        $file       = $this->pathToUploadedFile( public_path('storage/' . $randomFile) );

        return FileStorageService::upload( $file );
    }

    /**
     * Create an UploadedFile object from absolute path
     *
     * @param string $path
     * @param bool $test default true
     *
     * @return    object(Illuminate\Http\UploadedFile)
     *
     * Based of Alexandre Thebaldi answer here:
     * https://stackoverflow.com/a/32258317/6411540
     */
    public function pathToUploadedFile( string $path, bool $test = false ) {
        $filesystem = new Filesystem();

        $name         = $filesystem->name( $path );
        $extension    = $filesystem->extension( $path );
        $originalName = $name . '.' . $extension;
        $mimeType     = $filesystem->mimeType( $path );
        $error        = null;

        return new UploadedFile( $path, $originalName, $mimeType, $error, $test );
    }
}
