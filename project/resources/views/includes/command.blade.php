Opponents:
<div class="clearfix"></div>
@foreach($commands as $command)
    <div style="float: left; width: 50%">
        {{$command->name}} ({{$command->slug}})
        <br>
        @if($command->image_url)
            <img style="width: 50px" src="{{$command->image_url}}">
        @endif
    </div>
@endforeach
<div class="clearfix"></div>
