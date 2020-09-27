@extends('layouts.app')

@section('content')
<header class="mb-6 relative">
  <img
  src="http://localhost/twitter2/public/images/default.jpg"
  alt=""
  class="mb-2"
  >
  <div class="flex justify-between items-center">

   <div style="max-width:270px">
   <h2 class="font-bold text-2xl mb-0">profile page for {{$user->name}}</h2>
   <p class="text-sm"> joined {{$user->created_at->diffForHumans()}} </p>
  </div>

  <div class="flex">
    @if (auth()->user()->is($user))

<a href="{{$user->path('edit')}}" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
@endif
@if (auth()->user()->isNot($user))
<form method="POST" action="{{$user->name}}/follow">
 @csrf
 <button type="submit"
 class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">

{{auth()->user()->following($user)? 'Unfollow Me' :'Follow Me' }}
</button>
</form>
@endif

</div>

</div>
<p class="text-sm">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
  <img
      src="{{ asset('/storage/'.$user->avatar) }}"
    alt=""
    class="rounded-full mr-2 absolute"
   style="width:150px;  top:47%; left:41%;"
  >


  </header>

@include ('timeline',[
'tweets'=>$tweets
])
@endsection
