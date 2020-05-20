<div class="card">
    <div class="card-header">Tournament ID {{$tournament->id}} </div>
    <div class="card-body">
        <h6>{{$tournament->name}} ({{$tournament->slug}})</h6>

        @if(!empty($tournament->matches))
            @foreach($tournament->matches as $match)
                @include('includes.match', ['match' => $match])
            @endforeach
        @else
            <h4 >Tournament no has matches</h4>
        @endif


    </div>
</div>
