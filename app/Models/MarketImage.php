<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $item_id
 * @property string $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MarketItem|null $item
 * @method static \Database\Factories\MarketImageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketImage whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketImage whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MarketImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MarketImage extends Model {
    use HasFactory;
    protected $table = 'market_images';
    protected $fillable = ['item_id', 'image_url'];

    public function item() {
        return $this->belongsTo(MarketItem::class, 'item_id');
    }
}
