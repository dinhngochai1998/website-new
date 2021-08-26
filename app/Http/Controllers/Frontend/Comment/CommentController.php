<?php

namespace App\Http\Controllers\Frontend\Comment;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Repositories\CommentRepository;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;

class CommentController extends Controller
{
    protected $comment;
    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
    }
    public function createComment(StoreCommentRequest $request)
    {
        $post = Post::where('id', $request->id_posts)->first();
        if(!$post) {
            abort(404);
        }
        if(!Auth::guard('customer')->user()){
            return response()->json(['error' => 'Đăng nhập để  bình luận ']);
        }
        $addComment = $this->comment->create($request->validated());
        $addComment->id_posts = $request->id_posts;
        $addComment->id_customer = Auth::guard('customer')->user()->id;    
        $addComment->save();
        
        $getComment = Comment::with('customer')->where('id_posts', $request->id_posts)->orderBy('created_at', 'DESC' )->paginate(1);
        $view = view('frontend.detail.commentList',compact('getComment'))->render();
        return response()->json(['html'=>$view]);     
    }
}
