<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class FollowsController extends Controller
{
  function store(User $user)
  {
    /*if(auth()->user()->following($user))
    {
     auth()
    ->user()
    ->unfollow($user);
    }
    else{
     auth()
    ->user()
    ->follow($user);
    }

    return back();
    */
    auth()->user()->toggleFollow($user);
return back();
}


  //  auth()->user()->follow($user);

    //return back();
//  }
}
