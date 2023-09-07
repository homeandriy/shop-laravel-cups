<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\OrderStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereName( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereUpdatedAt( $value )
 * @method static Builder|OrderStatus canceled()
 * @method static Builder|OrderStatus completed()
 * @method static Builder|OrderStatus default()
 * @method static Builder|OrderStatus paid()
 * @mixin \Eloquent
 */
class OrderStatus extends Model {
    use HasFactory;

    protected $fillable = [ 'name' ];

    protected $casts = [
        'name' => 'string'
    ];

    public function orders(): HasMany {
        return $this->hasMany( Order::class );
    }

    protected function statusQuery( Builder $query, \App\Enums\OrderStatus $enum ): Builder {
        return $query->where( 'name', $enum );
    }
    public function getName(): string
    {
        return $this->name;
    }
}
