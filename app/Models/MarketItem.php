<?php

namespace App\Models;

use Database\Factories\MarketItemFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $item_id
 * @property int $shop_id
 * @property string $name
 * @property string $currency
 * @property int $stock
 * @property int $status
 * @property int $cat_id
 * @property string|null $brand
 * @property int $sold
 * @property int $historical_sold
 * @property int $liked
 * @property int $liked_count
 * @property string $item_status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, MarketImage> $images
 * @property-read int|null $images_count
 * @property-read MarketPricing|null $pricing
 * @property-read MarketShop|null $shop
 * @method static MarketItemFactory factory($count = null, $state = [])
 * @method static Builder<static>|MarketItem newModelQuery()
 * @method static Builder<static>|MarketItem newQuery()
 * @method static Builder<static>|MarketItem query()
 * @method static Builder<static>|MarketItem whereBrand($value)
 * @method static Builder<static>|MarketItem whereCatId($value)
 * @method static Builder<static>|MarketItem whereCreatedAt($value)
 * @method static Builder<static>|MarketItem whereCurrency($value)
 * @method static Builder<static>|MarketItem whereHistoricalSold($value)
 * @method static Builder<static>|MarketItem whereItemId($value)
 * @method static Builder<static>|MarketItem whereItemStatus($value)
 * @method static Builder<static>|MarketItem whereLiked($value)
 * @method static Builder<static>|MarketItem whereLikedCount($value)
 * @method static Builder<static>|MarketItem whereName($value)
 * @method static Builder<static>|MarketItem whereShopId($value)
 * @method static Builder<static>|MarketItem whereSold($value)
 * @method static Builder<static>|MarketItem whereStatus($value)
 * @method static Builder<static>|MarketItem whereStock($value)
 * @method static Builder<static>|MarketItem whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MarketItem extends Model
{
    use HasFactory;

    protected $table = 'market_items';
    protected $primaryKey = 'item_id';
    protected $fillable = ['shopid', 'name', 'currency', 'stock', 'status', 'catid', 'brand', 'sold', 'historical_sold', 'liked', 'liked_count', 'item_status'];

    public function shop()
    {
        return $this->belongsTo(MarketShop::class, 'shopid');
    }

    public function images()
    {
        return $this->hasMany(MarketImage::class, 'item_id');
    }

    public function pricing()
    {
        return $this->hasOne(MarketPricing::class, 'item_id');
    }
}
