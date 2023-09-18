<?php

namespace App\Models;

use App\Models\Attributes\Brand;
use App\Models\Attributes\Color;
use App\Services\FileStorageService;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property string $SKU
 * @property float $price
 * @property int|null $discount
 * @property int $quantity
 * @property string $thumbnail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Image> $images
 * @property-read int|null $images_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSKU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product available()
 * @property-read Brand|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Color> $colors
 * @property-read int|null $colors_count
 * @method static Builder|Product withColor(int $colorId)
 * @property int|null $brand_id
 * @method static Builder|Product whereBrandId($value)
 * @method static Builder|Product withProductColor(int $colorId)
 * @mixin \Eloquent
 */
class Product extends Model implements Buyable {
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'SKU',
        'price',
        'discount',
        'quantity',
        'thumbnail',
        'brand_id',
    ];
    public function scopeWithProductColor(Builder $query, int $colorId): Builder
    {
        return $query
            ->select(['products.*', 'cp.price as price', 'cp.quantity as quantity', 'colors.id as color_id'])
            ->from('products as product')
            ->leftJoin('color_product as cp', 'cp.product_id', '=', 'products.id')
            ->leftJoin('colors', 'colors.id', '=', 'cp.color_id')
            ->where('products.id', '=', $this->id)
            ->where('colors.id', '=', $colorId);
    }


    public function scopeWithColor(Builder $query, int $colorId): Builder
    {
        return $query
            ->select(['product.*', 'cp.price as price', 'cp.quantity as quantity', 'c.id as color_id'])
            ->from('products as product')
            ->leftJoin('color_product as cp', 'cp.product_id', '=', 'product.id')
            ->leftJoin('colors as c', 'c.id', '=', 'cp.color_id')
            ->where('c.id', '=', $colorId);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class)->withPivot( [ 'quantity', 'price', 'active', 'id' ]);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function thumbnailUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ( str_starts_with( $this->attributes['thumbnail'], 'http' ) ) {
                    return $this->attributes['thumbnail'];
                }
                $key = "products.thumbnail.{$this->attributes['thumbnail']}";

                if (!Cache::has($key)) {
                    $link = Storage::temporaryUrl($this->attributes['thumbnail'], now()->addMinutes(10));
                    Cache::put($key, $link, 570);
                    return $link;
                }

                // public/images/.....png
                return Cache::get($key);
            }
        );
    }

    public function setThumbnailAttribute($image)
    {
        if (!empty($this->attributes['thumbnail'])) {
            FileStorageService::remove($this->attributes['thumbnail']);
        }

        $this->attributes['thumbnail'] = FileStorageService::upload(
            $image,
            $this->attributes['slug']
        );
    }

    public function price(): Attribute
    {
        return Attribute::get(fn() => round($this->attributes['price'], 2));
    }

    public function endPrice(): Attribute
    {
        return Attribute::get(function() {
            $price = $this->attributes['price'];
            $discount = $this->attributes['discount'] ?? 0;

            $endPrice =  $discount === 0
                ? $price
                : ($price - ($price * $discount / 100));

            return $endPrice <= 0 ? 1 : round($endPrice, 2);
        });
    }

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('products.quantity', '>', 0);
    }

    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    public function getBuyableDescription($options = null)
    {
        return $this->title;
    }

    public function getBuyablePrice($options = null)
    {
        return $this->endPrice;
    }

    public function getBuyableWeight($options = null)
    {
        return 0;
    }
}
