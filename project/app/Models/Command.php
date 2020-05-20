<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string slug
 * @property string acronym
 * @property string name
 * @property Carbon modified_at
 * @property string location
 * @property string image_url
 * @property int id
 */
class Command extends Model
{
    protected $table = 'commands';

    protected $fillable = [
        'id',
        'name',
        'acronym',
        'slug',
        'image_url',
        'location',
        'modified_at',
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $dates = [
        'modified_at',
    ];

    public function gamesWinn()
    {
        return $this->belongsTo(Game::class);
    }

    public function matchesWinn()
    {
        return $this->belongsTo(Match::class);
    }

    public function tournamentsWinn()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function seriesWinn()
    {
        return $this->belongsTo(Serie::class);
    }

    public function matches()
    {
        return $this->belongsToMany(Match::class, 'matches_opponents', 'opponent_id', 'match_id');
    }
}
