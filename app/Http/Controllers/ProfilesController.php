<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tweet;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
  public function show(User $user){
  // return $user;

    //$user = DB::table('users')->where('name', $user)->get();

    //$tweets_t=Tweet::where('user_id',$user[0]->id)->get();

  //return view('profiles.show',['user'=>$user,'tweets_t'=>$tweets_t]);

 /*
in show.blade.php

<h3>profile page for {{$user[0]->name}}</h3>
@foreach ($tweets_t as $tweet)
    <p>This is user {{ $tweet->body }}</p>
@endforeach

*/

//  return view('profiles.show',compact('user'));
return view('profiles.show',[
  'user'=>$user,
  'tweets'=>$user->tweets()->withLikes()->paginate(5),
]);
  }

  public function edit(User $user){
  /*  if($user->isNot(auth()->user()))
    {
    //  dd('fk');
abort(404);
}*/
//    $this->authorize('edit',$user);
    return view('profiles.edit',compact('user'));
  }


  public function update(User $user){
  //  dd(request('avatar'));
$attributes=  request()->validate([
    'username'=>[
      'string',
      'required',
      'max:255',
      'alpha_dash',
      Rule::unique('users')->ignore($user),
    ],
    'name' =>['string','required','max:255'],
    'avatar' =>['file'],


    'email'=>[
      'string',
      'required',
      'email',
      'max:255',
      Rule::unique('users')->ignore($user),

    ],
    'password'=>[
      'string',
      'required',
      'min:8',
      'max:255',
      'confirmed',
    ]


  ]);
 if(request('avatar')){
   $attributes['avatar']=request('avatar')->store('avatars');
 }
  $user->update($attributes);

  return redirect($user->path());
  }
}
