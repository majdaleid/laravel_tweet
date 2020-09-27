<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\like;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
   * Get the route key for the model.
   *
   * @return string
   */

  public function getRouteKeyName()
  {
      return 'name';
  }

  public function setPasswordAttribute($value)
       {
           $this->attributes['password'] = bcrypt($value);
       }
  /*
public function getAvatarAttribute(){
  return "https://i.pravatar.cc/200?u=".$this->email;

}*/
/*
public function getAvatarAttribute($value){
return asset($value);
}*/
    public function timeline()
    {
      //her for all users but we schould range it with our
      //freinds who subscribe
    //  return Tweet::latest()->get();
    //now just for our posts
    //  return Tweet::where('user_id',$this->id)
    //  ->latest()
    //  ->get();
         /*

include all of the users $tweets
as well as the twetts of everyone they follows
 then order them by date
 $friends->push($this->id);
         */
         $friends=$this->follows()->pluck('id');
        return  Tweet::whereIn('user_id',$friends)
         ->orWhere('user_id',$this->id)
         ->withLikes()
         ->latest()->paginate(5);
      //  ->latest()->get();
    }
    public function tweets()
    {
      return $this->hasMany(Tweet::class)->latest();
    }

    public function follow(User $user)
    {
      return $this->follows()->save($user);
    }
    public function follows()
    {
      return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

public function following(User $user){
  return $this->follows()->where('following_user_id',$user->id)
   ->exists();
}

public function unfollow(User $user)
{
return $this->follows()->detach($user);
}


 public function toggleFollow(User $user)
 {
 if($this->following($user))
 {
 return $this->unfollow($user);
 }

return  $this->follow($user);

 }
 public function path($append='')
 {
   $path=route('profile',$this->name);

   return $append ? "{$path}/{$append}":$path;
 }

public function likes()
 {
    return $this->hasMany(Like::class);
  }

}
