@extends('layouts.app')

@section('content')
 dashboard
 <div class="lg:flex">
 <div  class="w-1/6">
@include('sidebar-links')
 </div>

 <div class="lg:flex-1 lg:mx-10">
   @include('publish-tweet-panal')


<div class="border border-gray-300 rounded-lg">
  @foreach($tweets as $tweet )
@include('tweet')
 @endforeach
</div>




 </div>
<div class="lg:w-1/6">
  @include('friends-list')
</div>
 </div>
@endsection
