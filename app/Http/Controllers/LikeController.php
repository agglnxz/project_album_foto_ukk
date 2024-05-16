<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(string $id)
    {

    $check = Like::where('user_id',Auth::user()->id)->where('foto_id',$id)->count();
    if($check >= 1){
      $likes = Like::where('user_id',Auth::user()->id)->where('foto_id',$id)->first();

      $likes->delete();
    }
    else{
        $likes= Like::create([
            'user_id' => Auth::user()->id,
            'foto_id' => $id
        ]);
    }
      return redirect()->back();

    }
}
