<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static Builder<static>|Dota2Config newModelQuery()
 * @method static Builder<static>|Dota2Config newQuery()
 * @method static Builder<static>|Dota2Config query()
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder<static>|Dota2Config whereCreatedAt($value)
 * @method static Builder<static>|Dota2Config whereId($value)
 * @method static Builder<static>|Dota2Config whereKey($value)
 * @method static Builder<static>|Dota2Config whereUpdatedAt($value)
 * @method static Builder<static>|Dota2Config whereValue($value)
 * @mixin Eloquent
 */
class Dota2Config extends Model
{
    //
    protected $fillable = ['key',
        'value',];
}
