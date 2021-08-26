<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;


class HomeController extends Controller
{
    public function index(Request $request)
    {

        $getPost = Post::where('status', '=', '1')->orderBy('created_at', 'DESC')->take(1)->first();
        $getPostData = [];
        if($getPost){
            $getPostData = Post::with('categories')->whereNotIn('id', [$getPost->id])->where('status', '=', '1')->orderBy('created_at', 'DESC')->simplePaginate(4);
           
        }
        $getPostHighLights = Post::orderBy('count_view', 'DESC')->take(4)->get();
        $getPostNews = Post::whereNotIn('id', [$getPost->id])->orwhere('status', '=', '1')->orderBy('created_at', 'DESC')->take(3)->get();

        $getPostHotNews = Post::getNewsOfCategory(Post::POST_HOTNEWS)->first();
        $getPostHotNews1 = [];
        if($getPostHotNews){
            $getPostHotNews1 = Post::where('id_category', Post::POST_HOTNEWS)->whereNotIn('id', [$getPostHotNews->id])->orderBy('created_at', 'DESC')->take(3)->get();
        }       
        $getRecruitment = Post::getNewsOfCategory(Post::POST_SPORT)->where('status', '=', '1')->first();     
        if($getRecruitment){
            $getRecruitment1 = Post::where('id_category', Post::POST_SPORT)->orWhere('status', '=', '1')->whereNotIn('id', [$getRecruitment->id])->orderBy('created_at', 'DESC')->take(3)->get();
        } else {
            $getRecruitment = [];
        }
        $getPostCultural = Post::getNewsOfCategory(Post::POST_CULTURAL)->first();
        $getPostCultural1 = [];
        if($getPostCultural){
            $getPostCultural1 = Post::where('id_category', Post::POST_CULTURAL)->whereNotIn('id', [$getPostCultural->id])->orderBy('created_at', 'DESC')->take(3)->get();
        }
        $getPostProject = Post::getNewsOfCategory(Post::POST_PROJECT)->first();
        $getPostProject1 = [];
        if($getPostProject){
            $getPostProject1 = Post::where('id_category', Post::POST_PROJECT)->whereNotIn('id', [$getPostProject->id])->orderBy('created_at', 'DESC')->take(3)->get();
        }

        return view('frontend.home.index', compact(['getPost', 'getPostData', 'getPostHighLights', 'getPostNews', 'getPostHotNews', 'getPostHotNews1', 'getRecruitment',
         'getRecruitment1', 'getPostCultural', 'getPostCultural1', 'getPostProject', 'getPostProject1']));
    }
    public function detail(Request $request)
    {
        $getDetail = Post::with('categories')->where('slug', '=', $request->slug)->first();
 
        if(!$getDetail){
            abort(404);
        }
        $getDetail->count_view += 1;
        
        $getDetail->save();

        $getPostHighLights = Post::orderBy('count_view', 'DESC')->take(3)->get();
        $getPostNews = Post::orderBy('created_at', 'DESC')->take(3)->get();

        $getPostComment = Post::where('slug', $request->slug)->first();
        $getComment = Comment::with('customer')->where('id_posts', $getPostComment->id)->orderBy('created_at', 'DESc' )->take(5)->paginate(5);

        return view('frontend.detail.index', compact(['getDetail','getPostHighLights','getComment', 'getPostNews']));
    }
    public function category(Request $request)
    {
        $category = Category::where('slug', $request->slug)->first();
        if (!$category) {
            abort(404);
        }
        $posts = Post::where('id_category', $category->id)->orderby('created_at', 'DESC')->get();
        $getPostHighLights = Post::orderBy('count_view', 'DESC')->take(3)->get();
        $getPostNews = Post::orderBy('created_at', 'DESC')->take(3)->get();
        return view('frontend.category.in', compact('posts', 'category','getPostHighLights','getPostNews', 'getPostHighLights'));
    }
}
