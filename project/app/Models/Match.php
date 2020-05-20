<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property Collection|null games
 * @property Carbon modified_at
 * @property Carbon end_at
 * @property Carbon original_scheduled_at
 * @property Command|null game_advantage
 * @property bool draw
 * @property bool forfeit
 * @property bool detailed_status
 * @property bool rescheduled
 * @property int number_of_games
 * @property array results
 * @property string videogame_version
 * @property string live_embed_url
 * @property string live_url
 * @property string official_stream_url
 * @property string status
 * @property string match_type
 * @property string slug
 * @property string name
 * @property Carbon scheduled_at
 * @property Carbon begin_at
 * @property int id
 */
class Match extends Model
{
    protected $table = 'matches';

    protected $fillable = [
        'id',
        'slug',
        'match_type',
        'status',
        'official_stream_url',
        'name',
        'live_url',
        'live_embed_url',
        'videogame_version',
        'results',
        'number_of_games',
        'rescheduled',
        'detailed_status',
        'forfeit',
        'draw',
        'tournament_id',
        'league_id',
        'winner_id',
        'serie_id',
        'game_advantage',
        'original_scheduled_at',
        'scheduled_at',
        'begin_at',
        'end_at',
        'modified_at',
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $casts = [
        'results' => 'array'
    ];

    protected $dates = [
        'original_scheduled_at',
        'scheduled_at',
        'begin_at',
        'end_at',
        'modified_at',
    ];

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function winner()
    {
        return $this->belongsTo(Command::class);
    }

    public function advantage()
    {
        return $this->belongsTo(Command::class);
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function opponents()
    {
        return $this->belongsToMany(Command::class, 'matches_opponents', 'match_id', 'opponent_id');
    }
}
