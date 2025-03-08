<?php

namespace App\Models;

use Database\Factories\MarketShopFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $shop_id
 * @property string $name
 * @property string|null $location
 * @property int $is_official_shop
 * @property int $is_preferred_plus_seller
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, MarketItem> $items
 * @property-read int|null $items_count
 * @method static MarketShopFactory factory($count = null, $state = [])
 * @method static Builder<static>|MarketShop newModelQuery()
 * @method static Builder<static>|MarketShop newQuery()
 * @method static Builder<static>|MarketShop query()
 * @method static Builder<static>|MarketShop whereCreatedAt($value)
 * @method static Builder<static>|MarketShop whereIsOfficialShop($value)
 * @method static Builder<static>|MarketShop whereIsPreferredPlusSeller($value)
 * @method static Builder<static>|MarketShop whereLocation($value)
 * @method static Builder<static>|MarketShop whereName($value)
 * @method static Builder<static>|MarketShop whereShopId($value)
 * @method static Builder<static>|MarketShop whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MarketShop extends Model
{
    use HasFactory;

    protected $table = 'market_shops';
    protected $primaryKey = 'shopid';
    protected $fillable = ['name', 'location', 'is_official_shop', 'is_preferred_plus_seller'];

    public function items()
    {
        return $this->hasMany(MarketItem::class, 'shopid');
    }
}
