<?php

 namespace App;

 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Builder;

trait Likable
{

  /*public function scopeWithLikes(Builder $query)
      {
          $query->leftJoinSub(
              'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
              'likes',
              'likes.tweet_id',
              'tweets.id'
          );
      }

*/



 public function like($user=null,$liked=true)
 {
   $this->likes()->updateOrCreate([
 'user_id'=>$user ? $user->id:auth()->id(),
 ],[
 'liked'=>$liked,
   ]);
 }

 public function dislike($user=null)
 {

 return $this->like($user,false);
 }


 public function isLikedBy(User $user)
   {
     if ($user->likes
          ->where('tweet_id', $this->id)
          ->where('liked', true)
          ->count())
          return true;
   }

   public function isDislikedBy(User $user)
   {
     if( $user->likes
          ->where('tweet_id', $this->id)
          ->where('liked', false)
          ->count())
          return true;
   }




 public function likes()
 {
   return $this->hasMany(Like::class);
 }

}
