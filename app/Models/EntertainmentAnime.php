<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereEpisodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereGenres($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereLicensors($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereMalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereMembers($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereProducers($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereStudios($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntertainmentAnime whereUrl($value)
 * @mixin \Eloquent
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
