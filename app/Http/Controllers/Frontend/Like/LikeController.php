<?php

namespace App\Http\Controllers\Frontend\Like;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use Auth;


class LikeController extends Controller
{

    public function like(Request $request)
    {
        $like = Like::where(['post_id' => $request->id_post])->first();

        if ($like) {
            if ($like->like == 1) {
                $like->like = 0;
                $like->save();
            } else {
                $like->like = 1;
                $like->save();
            }
        } else {
            $data = [
                'like' => 1,
                'customer_id' => Auth::guard('customer')->user()->id,
                'post_id' => $request->id_post,
            ];
            $like = Like::create($data);
        }
        return response()->json(['like' => $like]);
    }
}
