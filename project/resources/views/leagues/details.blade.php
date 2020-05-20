@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">League details ID {{$item->id}} </div>
        <div class="card-body">
            <h3>{{$item->name}} ({{$item->slug}})</h3>

            @if(!empty($item->series))
                @foreach($item->series as $serie)
                    @include('includes.series', ['serie' => $serie])
                @endforeach
            @else
                <h4 >League no has series</h4>
            @endif
        </div>
    </div>
@endsection
