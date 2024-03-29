<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model{
    use HasFactory;

    protected $fillable = ['name', 'image', 'season', 'episode', 'summary', 'show_number'];
}