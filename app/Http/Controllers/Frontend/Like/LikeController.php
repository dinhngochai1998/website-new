<?php

namespace App\Http\Controllers\Frontend\Like;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\Customer;
use App\Repositories\PostRepository;
use App\Http\Requests\Post\StorePostRequest;
use App\Repositories\CustomerPostRepository;
use App\Http\Controllers\Controller;
use Auth;


class LikeController extends Controller
{

    public function like(Request $request)
    {
        $like = Like::where(['customer_id' => Auth::guard('customer')->user()->id, 'post_id' => $request->id_post])->first();

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
