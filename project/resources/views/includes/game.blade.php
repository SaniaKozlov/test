<div class="card">
    <div class="card-header">Game ID {{$game->id}} #{{$game->position}}</div>
    <div class="card-body">
        status: {{$game->status}} <br>
        winner type: {{$game->winner_type}} <br>
        begin at: {{$game->begin_at ?? 'N/A'}} <br>
        end at: {{$game->end_at ?? 'N/A'}} <br>
        finished: {{($game->finished) ? 'Yes' : 'No'}} <br>
    </div>
</div>
