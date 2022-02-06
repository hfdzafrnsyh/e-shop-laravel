<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Alert;

class CommentController extends Controller
{
    //

    public function postComment(Request $request){
        $userId = auth()->user()->id;
        $request->request->add(['user_id' => $userId]);
        $comment = Comment::create($request->all());
       
        toast('Comment Success' , 'success');
        return redirect()->back();
    }

}
