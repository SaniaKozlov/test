<div class="card">
    <div class="card-header">
        <a class="btn btn-sm btn-default" data-toggle="collapse" href="#matches-collapse-{{$match->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-angle-double-down"></i>
        </a>
        Match ID {{$match->id}}
    </div>
    <div class="card-body collapse" id="matches-collapse-{{$match->id}}">
        <h6>{{$match->name}}</h6>
        @include('includes.command', ['commands' => $match->opponents])

        @if(!empty($match->games))
            @foreach($match->games as $game)
                @include('includes.game', ['game' => $game])
            @endforeach
        @else
            <h4 >Match no has games</h4>
        @endif
    </div>
</div>
