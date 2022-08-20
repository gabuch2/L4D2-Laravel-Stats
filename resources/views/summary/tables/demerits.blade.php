<table class="table stat_table">
    <thead>
        <tr>
            <th>
                Stat
            </th>
            <th>
                Value
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Friendly Fire Incidents
            </td>
            <td>
                {{$stats->award_friendlyfire}}
            </td>
        </tr>
        <tr>
            <td>
                Incapacitated Friendlies
            </td>
            <td>
                {{$stats->award_fincap}}
            </td>
        </tr>
        <tr>
            <td>
                Teammates Killed
            </td>
            <td>
                {{$stats->award_teamkill}}
            </td>
        </tr>
        <tr>
            <td>
                Friendlies Left For Dead
            </td>
            <td>
                {{$stats->award_left4dead}}
            </td>
        </tr>
        <tr>
            <td>
                Infected Let In Safe Room
            </td>
            <td>
                {{$stats->award_letinsafehouse}}
            </td>
        </tr>
        <tr>
            <td>
                Witches Disturbed
            </td>
            <td>
                {{$stats->award_witchdisturb}}
            </td>
        </tr>
    </tbody>
</table>