
 @extends('layouts.app')

 @section('content')
@endsection
<div>
here is explore page

@foreach($users as $user)
 <a href="{{ $user->path() }}" class="flex items-center mb-5">
   <img src="{{ asset('/storage/'.$user->avatar) }}"
alt="{{$user->username}}"
width="60"
class="mr-4 rounded"
>

<div>
  <h4 class="font-bold">{{'@'.$user->username}}</h4>
</div>
</a>
@endforeach

{{$users->links()}}
