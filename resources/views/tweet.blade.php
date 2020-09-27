<div class="mr-4">
<a href="{{ route('profile',$tweet->user->name)}}">
<img
src="{{ asset('/storage/'.$tweet->user->avatar) }}"


    alt="your avatar"
    class="rounded-full mr-2"
    width="50"
    height="50"
>
</a>

<h5 class="font-bold mb-4">
<a href="{{route('profile',$tweet->user->name)}}">
  {{$tweet->user->name}}
</a>
</h5>
<p class="text-sm">{{$tweet->body}}<p>

</div>
<x-like-buttons :tweet="$tweet"/>
