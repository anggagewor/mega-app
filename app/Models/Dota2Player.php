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
 * @property int $account_id
 * @property string|null $personaname
 * @property string|null $name
 * @property string|null $plus
 * @property string|null $cheese
 * @property string|null $steamid
 * @property string|null $avatar
 * @property string|null $avatarmedium
 * @property string|null $avatarfull
 * @property string|null $profileurl
 * @property string|null $last_login
 * @property string|null $loccountrycode
 * @property string|null $status
 * @property string|null $fh_unavailable
 * @property string|null $is_contributor
 * @property string|null $is_subscriber
 * @property string|null $rank_tier
 * @property string|null $leaderboard_rank
 * @property string|null $last_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|Dota2Player newModelQuery()
 * @method static Builder<static>|Dota2Player newQuery()
 * @method static Builder<static>|Dota2Player query()
 * @method static Builder<static>|Dota2Player whereAccountId($value)
 * @method static Builder<static>|Dota2Player whereAvatar($value)
 * @method static Builder<static>|Dota2Player whereAvatarfull($value)
 * @method static Builder<static>|Dota2Player whereAvatarmedium($value)
 * @method static Builder<static>|Dota2Player whereCheese($value)
 * @method static Builder<static>|Dota2Player whereCreatedAt($value)
 * @method static Builder<static>|Dota2Player whereFhUnavailable($value)
 * @method static Builder<static>|Dota2Player whereId($value)
 * @method static Builder<static>|Dota2Player whereIsContributor($value)
 * @method static Builder<static>|Dota2Player whereIsSubscriber($value)
 * @method static Builder<static>|Dota2Player whereLastLogin($value)
 * @method static Builder<static>|Dota2Player whereLastSync($value)
 * @method static Builder<static>|Dota2Player whereLeaderboardRank($value)
 * @method static Builder<static>|Dota2Player whereLoccountrycode($value)
 * @method static Builder<static>|Dota2Player whereName($value)
 * @method static Builder<static>|Dota2Player wherePersonaname($value)
 * @method static Builder<static>|Dota2Player wherePlus($value)
 * @method static Builder<static>|Dota2Player whereProfileurl($value)
 * @method static Builder<static>|Dota2Player whereRankTier($value)
 * @method static Builder<static>|Dota2Player whereStatus($value)
 * @method static Builder<static>|Dota2Player whereSteamid($value)
 * @method static Builder<static>|Dota2Player whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Dota2Player extends Model
{
    protected $fillable = [
        'account_id',
        'personaname',
        'name',
        'plus',
        'cheese',
        'steamid',
        'avatar',
        'avatarmedium',
        'avatarfull',
        'profileurl',
        'last_login',
        'loccountrycode',
        'status',
        'fh_unavailable',
        'is_contributor',
        'is_subscriber',
        'last_sync',
        'rank_tier',
        'leaderboard_rank',
    ];
}
