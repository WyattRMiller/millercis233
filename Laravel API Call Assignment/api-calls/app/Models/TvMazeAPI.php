<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class TvMazeAPI {
    public static function fetch($showNumber) {
        
        $showData = Http::get("https://api.tvmaze.com/shows/$showNumber/episodes")->json();

        $showCollection = collect($showData);

        return $showCollection->map(function ($show) use ($showNumber) {
            return Episode::firstOrCreate(['name'=>$show['name'], 
                                           'image'=>$show['image']['original'], 
                                           'season'=>$show['season'], 
                                           'episode'=>$show['number'], 
                                           'summary'=>strip_tags($show['summary']), 
                                           'show_number'=>$showNumber]);
        });
    }

}