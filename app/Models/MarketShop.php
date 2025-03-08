<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $shop_id
 * @property string $name
 * @property string|null $location
 * @property int $is_official_shop
 * @property int $is_preferred_plus_seller
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MarketItem> $items
 * @property-read int|null $items_count
 * @method static \Database\Factories\MarketShopFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketShop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketShop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketShop query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketShop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketShop whereIsOfficialShop($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketShop whereIsPreferredPlusSeller($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketShop whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketShop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketShop whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketShop whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MarketShop extends Model {
    use HasFactory;
    protected $table = 'market_shops';
    protected $primaryKey = 'shopid';
    protected $fillable = ['name', 'location', 'is_official_shop', 'is_preferred_plus_seller'];

    public function items() {
        return $this->hasMany(MarketItem::class, 'shopid');
    }
}
