<?php

namespace App\Services;

use App\Models\Dota2Hero;
use App\Models\Dota2Player;
use App\Models\Dota2PlayerHero;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpClient\HttpClient;

class Dota2Service
{
    public function __construct(private string $playerId)
    {
    }

    /**
     * @throws ConnectionException
     */
    public function getPlayerInfo(): void
    {
        $request = Http::get('https://api.opendota.com/api/players/'.$this->playerId);
        if($request->getStatusCode() == 200){
            /**
             * {
             * "profile": {
             * "account_id": 183527684,
             * "personaname": "Bukan Titit Biasa",
             * "name": null,
             * "plus": false,
             * "cheese": 0,
             * "steamid": "76561198143793412",
             * "avatar": "https://avatars.steamstatic.com/e8512be610f6f7329f2705b82b74c362379a10e5.jpg",
             * "avatarmedium": "https://avatars.steamstatic.com/e8512be610f6f7329f2705b82b74c362379a10e5_medium.jpg",
             * "avatarfull": "https://avatars.steamstatic.com/e8512be610f6f7329f2705b82b74c362379a10e5_full.jpg",
             * "profileurl": "https://steamcommunity.com/id/anggagewor/",
             * "last_login": "2021-11-04T09:24:29.460Z",
             * "loccountrycode": "ID",
             * "status": null,
             * "fh_unavailable": false,
             * "is_contributor": false,
             * "is_subscriber": false
             * },
             * "rank_tier": 22,
             * "leaderboard_rank": null
             * }
             */
            $info = json_decode($request->getBody()->getContents());
            $check = Dota2Player::where('account_id', $info->profile->account_id)->first();
            $datas = [
                'account_id' => $info->profile->account_id ?? null,
                'personaname' => $info->profile->personaname ?? null,
                'name' => $info->profile->name ?? null,
                'plus' => $info->profile->plus ?? null,
                'cheese' => $info->profile->cheese ?? null,
                'steamid' => $info->profile->steamid ?? null,
                'avatar' => $info->profile->avatar ?? null,
                'avatarmedium' => $info->profile->avatarmedium ?? null,
                'avatarfull' => $info->profile->avatarfull ?? null,
                'profileurl' => $info->profile->profileurl ?? null,
                'last_login' => $info->profile->last_login ?? null,
                'loccountrycode' => $info->profile->loccountrycode ?? null,
                'status' => $info->profile->status ?? null,
                'fh_unavailable' => $info->profile->fh_unavailable ?? null,
                'is_contributor' => $info->profile->is_contributor ?? null,
                'is_subscriber' => $info->profile->is_subscriber ?? null,
                'rank_tier' => $info->rank_tier ?? null,
                'leaderboard_rank' => $info->leaderboard_rank ?? null,
                'last_sync' => now(),
                'created_at' => $check->created_at ?? now(),
                'updated_at' => now(),
            ];
            Dota2Player::updateOrInsert(['account_id' => $info->profile->account_id],$datas);

        }
    }

    /**
     * @throws ConnectionException
     */
    public function getPlayerHero(): void
    {
        $request = Http::get('https://api.opendota.com/api/players/'.$this->playerId.'/heroes');
        if($request->getStatusCode() == 200){
            $heroes = json_decode($request->getBody()->getContents());
            foreach($heroes as $hero){
                /**
                 * {
                 * "hero_id": 104,
                 * "last_played": 1711265300,
                 * "games": 564,
                 * "win": 308,
                 * "with_games": 136,
                 * "with_win": 70,
                 * "against_games": 206,
                 * "against_win": 104
                 * }
                 */
                $check = Dota2PlayerHero::where([
                    'player_id' => $this->playerId,
                    'hero_id' => $hero->hero_id,
                ])->first();
                $data = [
                    'player_id' => $this->playerId,
                    'hero_id' => $hero->hero_id,
                    'last_played' => $hero->last_played,
                    'games' => $hero->games,
                    'win' => $hero->win,
                    'with_games' => $hero->with_games,
                    'with_win' => $hero->with_win,
                    'against_games' => $hero->against_games,
                    'against_win' => $hero->against_win,
                    'last_sync' => now(),
                    'created_at' => $check->created_at ?? now(),
                    'updated_at' => now(),
                ];
                Dota2PlayerHero::updateOrInsert(['player_id' => $this->playerId,'hero_id' => $hero->hero_id],$data);
            }
        }
    }

    /**
     * @throws ConnectionException
     */
    public function getHero(): void
    {
        $request = Http::get('https://api.opendota.com/api/heroes');
        if($request->getStatusCode() == 200){
            /**
             * {
             * "id": 1,
             * "name": "npc_dota_hero_antimage",
             * "localized_name": "Anti-Mage",
             * "primary_attr": "agi",
             * "attack_type": "Melee",
             * "roles": [
             * "Carry",
             * "Escape",
             * "Nuker"
             * ],
             * "legs": 2
             * },
             */
            $heroes = json_decode($request->getBody()->getContents());
            foreach($heroes as $hero){
                $check = Dota2Hero::where(['id'=>$hero->id])->first();
                $data = [
                    'id' => $hero->id,
                    'name' => $hero->name,
                    'localized_name' => $hero->localized_name,
                    'primary_attr' => $hero->primary_attr,
                    'attack_type' => $hero->attack_type,
                    'legs' => $hero->legs,
                    'last_sync' => now(),
                    'created_at' => $check->created_at ?? now(),
                    'updated_at' => now(),
                ];
                Dota2Hero::updateOrInsert(['id' => $hero->id],$data);
            }
        }
    }
}
