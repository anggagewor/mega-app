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
 * @property string $name
 * @property string|null $last_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|Dota2HeroRole newModelQuery()
 * @method static Builder<static>|Dota2HeroRole newQuery()
 * @method static Builder<static>|Dota2HeroRole query()
 * @method static Builder<static>|Dota2HeroRole whereCreatedAt($value)
 * @method static Builder<static>|Dota2HeroRole whereId($value)
 * @method static Builder<static>|Dota2HeroRole whereLastSync($value)
 * @method static Builder<static>|Dota2HeroRole whereName($value)
 * @method static Builder<static>|Dota2HeroRole whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Dota2HeroRole extends Model
{
    protected $fillable = ['name'];
}
