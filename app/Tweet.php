<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tweet;
use App\like;
use Illuminate\Database\Eloquent\Builder;


class Tweet extends Model
{
  use Likable;
  protected $guarded=[];

  public function scopeWithLikes(Builder $query)
      {
          $query->leftJoinSub(
              'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
              'likes',
              'likes.tweet_id',
              'tweets.id'
          );
      }




  public function user()
  {
    return $this->belongsTo(User::class);
  }



}
