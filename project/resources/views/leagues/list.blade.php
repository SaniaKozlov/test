@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">Leagues </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <caption>total {{$list->total()}}</caption>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>slug</th>
                        <th>url</th>
                        <th>image</th>
                        <th>modified</th>
                        <th>actions</th>
                    </tr>
                    @foreach($list as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->slug}}</td>
                            <td>{{$item->url}}</td>
                            <td>
                                @if($item->url)
                                    <img style="width: 50px;" src="{{$item->image_url}}">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{$item->modified_at}}</td>
                            <td>
                                <a href="{{route('leagues.webdetails', ['id' => $item->id])}}">details</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$list->links()}}
            </div>
        </div>
    </div>

@endsection
