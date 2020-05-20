<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

/**
 * @property int id
 * @property Collection|null tournaments
 * @property Carbon modified_at
 * @property Carbon begin_at
 * @property int year
 * @property string winner_type
 * @property string tier
 * @property string description
 * @property string slug
 * @property string season
 * @property string full_name
 * @property string name
 */
class Serie extends Model
{
    protected $table = 'series';

    protected $fillable = [
        'id',
        'full_name',
        'name',
        'season',
        'slug',
        'description',
        'url',
        'tier',
        'winner_type',
        'league_id',
        'winner_id',
        'year',
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

    public function winner()
    {
        return $this->belongsTo(Command::class);
    }

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }

    public function matches()
    {
        return $this->hasMany(Match::class);
    }
}
