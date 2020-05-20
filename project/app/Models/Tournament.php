<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

/**
 * @property Collection|null matches
 * @property Carbon modified_at
 * @property Carbon end_at
 * @property Carbon begin_at
 * @property bool live_supported
 * @property string winner_type
 * @property string prizepool
 * @property string slug
 * @property string name
 * @property int id
 * @property Command|null winner
 * @property League|null league
 * @property Serie|null serie
 */
class Tournament extends Model
{
    protected $table = 'tournaments';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'prizepool',
        'winner_type',
        'league_id',
        'winner_id',
        'serie_id',
        'live_supported',
        'begin_at',
        'end_at',
        'modified_at',
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $dates = [
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

    public function winner()
    {
        return $this->belongsTo(Command::class);
    }

    public function matches()
    {
        return $this->hasMany(Match::class);
    }
}
