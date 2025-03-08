<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $item_id
 * @property int $price
 * @property int $price_min
 * @property int $price_max
 * @property int|null $price_before_discount
 * @property int|null $price_min_before_discount
 * @property int|null $price_max_before_discount
 * @property string|null $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MarketItem|null $item
 * @method static \Database\Factories\MarketPricingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing wherePriceBeforeDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing wherePriceMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing wherePriceMaxBeforeDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing wherePriceMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing wherePriceMinBeforeDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketPricing whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MarketPricing extends Model {
    use HasFactory;
    protected $table = 'market_pricing';
    protected $fillable = ['item_id', 'price', 'price_min', 'price_max', 'price_before_discount', 'price_min_before_discount', 'price_max_before_discount', 'discount'];

    public function item() {
        return $this->belongsTo(MarketItem::class, 'item_id');
    }
}
