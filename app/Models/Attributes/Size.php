<?php

namespace App\Models\Attributes;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Attributes\Size
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\Attributes\SizeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size query()
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Size extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'price', 'discount']);
    }
}
