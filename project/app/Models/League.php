<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property int id
 * @property Carbon modified_at
 * @property string image_url
 * @property string url
 * @property string slug
 * @property string name
 * @property Collection|null series
 * @property Collection|null tournaments
 * @property Collection|null matches
 */
class League extends Model
{
    protected $table = 'leagues';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'url',
        'image_url',
        'modified_at',
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $dates = [
        'modified_at',
    ];

    public function series()
    {
        return $this->hasMany(Serie::class);
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
