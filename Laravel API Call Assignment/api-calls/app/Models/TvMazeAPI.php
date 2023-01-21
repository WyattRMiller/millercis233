<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class TvMazeAPI {
    public static function fetch($showNumber) {
        $showData = Http::get("https://api.tvmaze.com/shows/$showNumber/episodes")->json();

        $showCollection = collect($showData);

        return $showCollection->map(function ($show) {
            return new Episode($show['name'], $show['image'], $show['season'], $show['number'], $show['summary']);
        });
    }

}