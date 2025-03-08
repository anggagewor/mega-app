<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $anime_id
 * @property string|null $name
 * @property string|null $title
 * @property string|null $aired
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisode query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisode whereAired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisode whereAnimeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisode whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisode whereUpdatedAt($value)
 * @mixin \Eloquent
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
