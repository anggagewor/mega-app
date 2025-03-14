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
 * @property int $episode_id
 * @property string|null $embed
 * @property string|null $link
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|EntertainmentEpisodeDownload newModelQuery()
 * @method static Builder<static>|EntertainmentEpisodeDownload newQuery()
 * @method static Builder<static>|EntertainmentEpisodeDownload query()
 * @method static Builder<static>|EntertainmentEpisodeDownload whereCreatedAt($value)
 * @method static Builder<static>|EntertainmentEpisodeDownload whereEmbed($value)
 * @method static Builder<static>|EntertainmentEpisodeDownload whereEpisodeId($value)
 * @method static Builder<static>|EntertainmentEpisodeDownload whereId($value)
 * @method static Builder<static>|EntertainmentEpisodeDownload whereLink($value)
 * @method static Builder<static>|EntertainmentEpisodeDownload whereUpdatedAt($value)
 * @mixin Eloquent
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
