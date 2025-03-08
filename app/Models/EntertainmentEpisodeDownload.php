<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $episode_id
 * @property string|null $embed
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisodeDownload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisodeDownload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisodeDownload query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisodeDownload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisodeDownload whereEmbed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisodeDownload whereEpisodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisodeDownload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisodeDownload whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentEpisodeDownload whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EntertainmentEpisodeDownload extends Model
{
    //
    protected $fillable = [
        'episode_id',
        'embed',
        'link',
    ];
}
