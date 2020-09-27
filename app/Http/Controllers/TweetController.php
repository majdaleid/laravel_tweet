<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;



class TweetController extends Controller
{
    public function store()
    {
      $attributes = request()->validate(['body'=>'required|max:255']);
      Tweet::create([
        'user_id'=>auth()->id(),
        'body'=>$attributes['body']
      ]);

      return redirect()->route('home');
    }

   public function index()
   {

//return auth()->user()->timeline();
     //$tweets=Tweet::latest()->get();

     return view('tweets.index',[
       'tweets'=>auth()->user()->timeline()
     ]);

   /*   return view('home',[
'tweets'=>Tweet::all()
]);*/
   }
}
