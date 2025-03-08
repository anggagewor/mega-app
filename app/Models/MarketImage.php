<?php

namespace App\Models;

use Database\Factories\MarketImageFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int $item_id
 * @property string $image_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read MarketItem|null $item
 * @method static MarketImageFactory factory($count = null, $state = [])
 * @method static Builder<static>|MarketImage newModelQuery()
 * @method static Builder<static>|MarketImage newQuery()
 * @method static Builder<static>|MarketImage query()
 * @method static Builder<static>|MarketImage whereCreatedAt($value)
 * @method static Builder<static>|MarketImage whereId($value)
 * @method static Builder<static>|MarketImage whereImageUrl($value)
 * @method static Builder<static>|MarketImage whereItemId($value)
 * @method static Builder<static>|MarketImage whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MarketImage extends Model
{
    use HasFactory;

    protected $table = 'market_images';
    protected $fillable = ['item_id', 'image_url'];

    public function item()
    {
        return $this->belongsTo(MarketItem::class, 'item_id');
    }
}
