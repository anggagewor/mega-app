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
 * @property int $anime_id
 * @property string|null $name
 * @property string|null $title
 * @property string|null $aired
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|EntertainmentEpisode newModelQuery()
 * @method static Builder<static>|EntertainmentEpisode newQuery()
 * @method static Builder<static>|EntertainmentEpisode query()
 * @method static Builder<static>|EntertainmentEpisode whereAired($value)
 * @method static Builder<static>|EntertainmentEpisode whereAnimeId($value)
 * @method static Builder<static>|EntertainmentEpisode whereCreatedAt($value)
 * @method static Builder<static>|EntertainmentEpisode whereId($value)
 * @method static Builder<static>|EntertainmentEpisode whereName($value)
 * @method static Builder<static>|EntertainmentEpisode whereTitle($value)
 * @method static Builder<static>|EntertainmentEpisode whereUpdatedAt($value)
 * @mixin Eloquent
 */
class EntertainmentEpisode extends Model
{
    //
    protected $fillable = [
        'anime_id',
        'name',
        'title',
        'aired'
    ];
}
