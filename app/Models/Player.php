<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Builder as Builder;

class Player extends Model
{
    public $table = 'players';
    protected $primaryKey = 'steamid';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('config_filters', function (Builder $builder) {
            if(env('STATS_IGNORE_NEGATIVE', false))
                $builder = $builder->where('points', '>=', 0);

            if(env('STATS_REQUIRE_ONLINE_DAYS', 0) > 0)
                $builder = $builder->whereRaw(sprintf('FROM_UNIXTIME(lastontime) > now() - INTERVAL %d day', env('STATS_REQUIRE_ONLINE_DAYS', 0)));

            $builder = $builder->where('playtime', '>=', env('STATS_MININUM_PLAYTIME', 0))->where('steamid', '!=', "STEAM_ID_STOP_IGNORING_RETVALS");

            return $builder;
        });
    }

    static function get_summable_fields()
    {
        return [
            'playtime',
            'playtime_versus',
            'playtime_realism',
            'playtime_survival',
            'playtime_scavenge',
            'playtime_realismversus',
            'points',
            'points_realism',
            'points_survival',
            'points_survivors',
            'points_infected',
            'points_scavenge_survivors',
            'points_scavenge_infected',
            'points_realism_survivors',
            'points_realism_infected',
            'kills',
            'melee_kills',
            'headshots',
            'kill_infected',
            'kill_hunter',
            'kill_smoker',
            'kill_boomer',
            'kill_spitter',
            'kill_jockey',
            'kill_charger',
            'versus_kills_survivors',
            'scavenge_kills_survivors',
            'realism_kills_survivors',
            'jockey_rides',
            'charger_impacts',
            'award_pills',
            'award_adrenaline',
            'award_fincap',
            'award_medkit',
            'award_defib',
            'award_charger',
            'award_jockey',
            'award_hunter',
            'award_smoker',
            'award_protect',
            'award_revive',
            'award_rescue',
            'award_campaigns',
            'award_tankkill',
            'award_tankkillnodeaths',
            'award_allinsafehouse',
            'award_friendlyfire',
            'award_teamkill',
            'award_left4dead',
            'award_letinsafehouse',
            'award_witchdisturb',
            'award_pounce_perfect',
            'award_pounce_nice',
            'award_perfect_blindness',
            'award_infected_win',
            'award_scavenge_infected_win',
            'award_bulldozer',
            'award_survivor_down',
            'award_ledgegrab',
            'award_gascans_poured',
            'award_upgrades_added',
            'award_matador',
            'award_witchcrowned',
            'award_scatteringram',
            'infected_spawn_1',
            'infected_spawn_2',
            'infected_spawn_3',
            'infected_spawn_4',
            'infected_spawn_5',
            'infected_spawn_6',
            'infected_spawn_8',
            'infected_boomer_vomits',
            'infected_boomer_blinded',
            'infected_hunter_pounce_counter',
            'infected_hunter_pounce_dmg',
            'infected_smoker_damage',
            'infected_jockey_damage',
            'infected_jockey_ridetime',
            'infected_charger_damage',
            'infected_tank_damage',
            'infected_tanksniper',
            'infected_spitter_damage',
            'mutations_kills_survivors',
            'playtime_mutations',
            'points_mutations',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastontime',
        'lastgamemode',
        'ip',
        'playtime',
        'playtime_versus',
        'playtime_realism',
        'playtime_survival',
        'playtime_scavenge',
        'playtime_realismversus',
        'points',
        'points_realism',
        'points_survival',
        'points_survivors',
        'points_infected',
        'points_scavenge_survivors',
        'points_scavenge_infected',
        'points_realism_survivors',
        'points_realism_infected',
        'kills',
        'melee_kills',
        'headshots',
        'kill_infected',
        'kill_hunter',
        'kill_smoker',
        'kill_boomer',
        'kill_spitter',
        'kill_jockey',
        'kill_charger',
        'versus_kills_survivors',
        'scavenge_kills_survivors',
        'realism_kills_survivors',
        'jockey_rides',
        'charger_impacts',
        'award_pills',
        'award_adrenaline',
        'award_fincap',
        'award_medkit',
        'award_defib',
        'award_charger',
        'award_jockey',
        'award_hunter',
        'award_smoker',
        'award_protect',
        'award_revive',
        'award_rescue',
        'award_campaigns',
        'award_tankkill',
        'award_tankkillnodeaths',
        'award_allinsafehouse',
        'award_friendlyfire',
        'award_teamkill',
        'award_left4dead',
        'award_letinsafehouse',
        'award_witchdisturb',
        'award_pounce_perfect',
        'award_pounce_nice',
        'award_perfect_blindness',
        'award_infected_win',
        'award_scavenge_infected_win',
        'award_bulldozer',
        'award_survivor_down',
        'award_ledgegrab',
        'award_gascans_poured',
        'award_upgrades_added',
        'award_matador',
        'award_witchcrowned',
        'award_scatteringram',
        'infected_spawn_1',
        'infected_spawn_2',
        'infected_spawn_3',
        'infected_spawn_4',
        'infected_spawn_5',
        'infected_spawn_6',
        'infected_spawn_8',
        'infected_boomer_vomits',
        'infected_boomer_blinded',
        'infected_hunter_pounce_counter',
        'infected_hunter_pounce_dmg',
        'infected_smoker_damage',
        'infected_jockey_damage',
        'infected_jockey_ridetime',
        'infected_charger_damage',
        'infected_tank_damage',
        'infected_tanksniper',
        'infected_spitter_damage',
        'mutations_kills_survivors',
        'playtime_mutations',
        'points_mutations',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
}
