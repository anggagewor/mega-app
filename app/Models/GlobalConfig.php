<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $key
 * @property string $type
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GlobalConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GlobalConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GlobalConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GlobalConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GlobalConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GlobalConfig whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GlobalConfig whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GlobalConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GlobalConfig whereValue($value)
 * @mixin \Eloquent
 */
class GlobalConfig extends Model
{
    //
    protected $fillable = [
        'key',
        'type',
        'value',
    ];
}
