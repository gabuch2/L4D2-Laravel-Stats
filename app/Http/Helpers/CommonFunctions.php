<?php
namespace App\Http\Helpers;
use App\Models\Player;
use App\Models\ServerSettings;
use Illuminate\Support\Facades\DB;

class CommonFunctions
{
    public static function top_10_players()
    {
        $players = Player::select([
                                    'steamid',
                                    DB::raw('(SELECT count(DISTINCT b.points)+1 FROM players AS b WHERE b.points > players.points) AS position'),
                                    'name', 
                                    'points'
                                    ])->orderBy('points', 'DESC')->limit(10)->get();
        return $players;
    }

    public static function get_message_of_the_day()
    {
        $serversettings = ServerSettings::where('sname', 'motdmessage')->first();

        return $serversettings->svalue;
    }

    public static function get_random_header_image()
    {
        return asset(sprintf('img/render%d.jpg', rand(1, 29)));
    }
}