<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string winner_type
 * @property string video_url
 * @property int position
 * @property int length
 * @property bool forfeit
 * @property bool finished
 * @property bool detailed_stats
 * @property Carbon end_at
 * @property Carbon begin_at
 */
class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
        'id',
        'begin_at',
        'end_at',
        'detailed_stats',
        'finished',
        'forfeit',
        'length',
        'match_id',
        'position',
        'status',
        'video_url',
        'winner_id',
        'winner_type',
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $dates = [
        'begin_at',
        'end_at',
    ];

    public function match()
    {
        return $this->belongsTo(Match::class);
    }

    public function winner()
    {
        return $this->belongsTo(Command::class);
    }
}
