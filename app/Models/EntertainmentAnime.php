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
 * @property string|null $title
 * @property string|null $url
 * @property int|null $mal_id
 * @property string|null $type
 * @property int|null $episodes
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $members
 * @property string|null $status
 * @property string|null $producers
 * @property string|null $licensors
 * @property string|null $studios
 * @property string|null $score
 * @property string|null $genres
 * @property string|null $cover
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|EntertainmentAnime newModelQuery()
 * @method static Builder<static>|EntertainmentAnime newQuery()
 * @method static Builder<static>|EntertainmentAnime query()
 * @method static Builder<static>|EntertainmentAnime whereCover($value)
 * @method static Builder<static>|EntertainmentAnime whereCreatedAt($value)
 * @method static Builder<static>|EntertainmentAnime whereEndDate($value)
 * @method static Builder<static>|EntertainmentAnime whereEpisodes($value)
 * @method static Builder<static>|EntertainmentAnime whereGenres($value)
 * @method static Builder<static>|EntertainmentAnime whereId($value)
 * @method static Builder<static>|EntertainmentAnime whereLicensors($value)
 * @method static Builder<static>|EntertainmentAnime whereMalId($value)
 * @method static Builder<static>|EntertainmentAnime whereMembers($value)
 * @method static Builder<static>|EntertainmentAnime whereProducers($value)
 * @method static Builder<static>|EntertainmentAnime whereScore($value)
 * @method static Builder<static>|EntertainmentAnime whereStartDate($value)
 * @method static Builder<static>|EntertainmentAnime whereStatus($value)
 * @method static Builder<static>|EntertainmentAnime whereStudios($value)
 * @method static Builder<static>|EntertainmentAnime whereTitle($value)
 * @method static Builder<static>|EntertainmentAnime whereType($value)
 * @method static Builder<static>|EntertainmentAnime whereUpdatedAt($value)
 * @method static Builder<static>|EntertainmentAnime whereUrl($value)
 * @mixin Eloquent
 */
class EntertainmentAnime extends Model
{
    //
    protected $fillable = [
        'title',
        'url',
        'mal_id',
        'type',
        'episodes',
        'start_date',
        'end_date',
        'members',
        'status',
        'producers',
        'licensors',
        'studios',
        'score',
        'genres',
        'cover',
    ];
}
