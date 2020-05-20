<div class="card" style="float: left">
    <div class="card-header">Serie ID {{$serie->id}} </div>
    <div class="card-body">
        <h5>{{$serie->name}} ({{$serie->slug}})</h5>

        @if(!empty($serie->tournaments))
            @foreach($serie->tournaments as $tournament)
                @include('includes.tournaments', ['tournament' => $tournament])
            @endforeach
        @else
            <h4 >Serie no has tournaments</h4>
        @endif


    </div>
</div>
