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
 * @mixin Eloquent
 */
class Dota2Config extends Model
{
    //
    protected $fillable = ['key',
        'value',];
}
