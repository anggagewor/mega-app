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
 * @property int|null $player_id
 * @property int|null $hero_id
 * @property string|null $last_played
 * @property string|null $games
 * @property string|null $win
 * @property string|null $with_games
 * @property string|null $with_win
 * @property string|null $against_games
 * @property string|null $against_win
 * @property string|null $last_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|Dota2PlayerHero newModelQuery()
 * @method static Builder<static>|Dota2PlayerHero newQuery()
 * @method static Builder<static>|Dota2PlayerHero query()
 * @method static Builder<static>|Dota2PlayerHero whereAgainstGames($value)
 * @method static Builder<static>|Dota2PlayerHero whereAgainstWin($value)
 * @method static Builder<static>|Dota2PlayerHero whereCreatedAt($value)
 * @method static Builder<static>|Dota2PlayerHero whereGames($value)
 * @method static Builder<static>|Dota2PlayerHero whereHeroId($value)
 * @method static Builder<static>|Dota2PlayerHero whereId($value)
 * @method static Builder<static>|Dota2PlayerHero whereLastPlayed($value)
 * @method static Builder<static>|Dota2PlayerHero whereLastSync($value)
 * @method static Builder<static>|Dota2PlayerHero wherePlayerId($value)
 * @method static Builder<static>|Dota2PlayerHero whereUpdatedAt($value)
 * @method static Builder<static>|Dota2PlayerHero whereWin($value)
 * @method static Builder<static>|Dota2PlayerHero whereWithGames($value)
 * @method static Builder<static>|Dota2PlayerHero whereWithWin($value)
 * @mixin Eloquent
 */
class Dota2PlayerHero extends Model
{
    //
    protected $fillable = ['player_id',
        'hero_id',
        'last_played',
        'games',
        'win',
        'with_games',
        'with_win',
        'against_games',
        'against_win',];
}
