<table class="table">
    <tbody>
        @if($is_server)
        <tr>
            <td>
                Total players
            </td>
            <td>
                {{$playercount}}
            </td>
        </tr>
        @endif
        <tr>
            <td>
                Total points
            </td>
            <td>
                {{$stats->points}}
            </td>
        </tr>
        <tr>
            <td>
                Infected Killed
            </td>
            <td>
                {{$stats->kills}}
            </td>
        </tr>
        <tr>
            <td>
                Survivors Killed
            </td>
            <td>
                {{$stats->versus_kills_survivors+$stats->scavenge_kills_survivors+$stats->realism_kills_survivors}}
            </td>
        </tr>
        <tr>
            <td>
                Headshots
            </td>
            <td>
                {{$stats->headshots}}
            </td>
        </tr>
        <tr>
            <td>
                Headshot Ratio %
            </td>
            <td>
                {{$stats->kills > 0 ? (number_format($stats->headshots / $stats->kills, 4) * 100) : "0.00"}}
            </td>
        </tr>
        <tr>
            <td>
                Boomer Average
            </td>
            <td>
                {{$stats->infected_spawn_2 > 0 ? number_format($stats->infected_boomer_damage / $stats->infected_spawn_2, 2) : "0.00"}}
            </td>
        </tr>
        <tr>
            <td>
                Hunter Average
            </td>
            <td>
                {{$stats->infected_spawn_3 > 0 ? number_format($stats->infected_hunter_damage / $stats->infected_spawn_3, 2) : "0.00"}}
            </td>
        </tr>
        <tr>
            <td>
                Smoker Average
            </td>
            <td>
                {{$stats->infected_spawn_1 > 0 ? number_format($stats->infected_smoker_damage / $stats->infected_spawn_1, 2) : "0.00"}}
            </td>
        </tr>
        <tr>
            <td>
                Spitter Average
            </td>
            <td>
                {{$stats->infected_spawn_4 > 0 ? number_format($stats->infected_spitter_damage / $stats->infected_spawn_4, 2) : "0.00"}}
            </td>
        </tr>
        <tr>
            <td>
                Jockey Average
            </td>
            <td>
                {{$stats->infected_spawn_5 > 0 ? number_format($stats->infected_jockey_damage / $stats->infected_spawn_5, 2) : "0.00"}}
            </td>
        </tr>
        <tr>
            <td>
                Charger Average
            </td>
            <td>
                {{$stats->infected_spawn_6 > 0 ? number_format($stats->infected_charger_damage / $stats->infected_spawn_6, 2) : "0.00"}}
            </td>
        </tr>
        <tr>
            <td>
                Tank Average
            </td>
            <td>
                {{$stats->infected_spawn_8 > 0 ? number_format($stats->infected_tank_damage / $stats->infected_spawn_8, 2) : "0.00"}}
            </td>
        </tr>
    </tbody>
</table>