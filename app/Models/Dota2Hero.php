<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $localized_name
 * @property string|null $primary_attr
 * @property string|null $attack_type
 * @property string|null $legs
 * @property string|null $last_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|Dota2Hero newModelQuery()
 * @method static Builder<static>|Dota2Hero newQuery()
 * @method static Builder<static>|Dota2Hero query()
 * @method static Builder<static>|Dota2Hero whereAttackType($value)
 * @method static Builder<static>|Dota2Hero whereCreatedAt($value)
 * @method static Builder<static>|Dota2Hero whereId($value)
 * @method static Builder<static>|Dota2Hero whereLastSync($value)
 * @method static Builder<static>|Dota2Hero whereLegs($value)
 * @method static Builder<static>|Dota2Hero whereLocalizedName($value)
 * @method static Builder<static>|Dota2Hero whereName($value)
 * @method static Builder<static>|Dota2Hero wherePrimaryAttr($value)
 * @method static Builder<static>|Dota2Hero whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Dota2Hero extends Model
{
    //
    protected $fillable = ['name',
        'localized_name',
        'primary_attr',
        'attack_type',
        'legs',];
}
