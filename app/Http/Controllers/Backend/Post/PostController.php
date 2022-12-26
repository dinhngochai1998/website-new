<?php

namespace App\Http\Controllers\Backend\Post;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\Post\StorePostRequest;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use Auth;

class PostController extends Controller
{
    protected $post;
    protected $category;
    public function __construct(PostRepository $post, CategoryRepository $category)
    {
        $this->post = $post;
        $this->category = $category;
    }
    public function index()
    {

        $categories = $this->category->get();
        return view('backendc.admin.post.create', compact('categories'));
    }
    public function create(StorePostRequest $request)
    {

        $data = $request->validated();
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $request->file('image')->storeAs('public/avatars', $fileNameToStore);

            $data['image'] = $fileNameToStore;
        }
//        dd( $this->post);
        $NewPost = $this->post->create($data);
//        dd($NewPost);
        $NewPost->status_schedule = $request->get('status_schedule') ?? null;
        $NewPost->publish_at = $request->get('publish_at') ?? null;
        $NewPost->save();
        return redirect()->route('post.select')->with('success', Lang::get('messages.create', ['model' => 'Post']));
    }

    public function select(Request $request)
    {

        $getAllPost = $this->post->sortable()->with('categories')->orderBy('created_at', 'DESC')->paginate(10);
        if ($request->ajax()) {
            $getAllPost = $this->post->where('title', 'like', '%' . $request->title . '%')->get();
            $view = view('backendc.admin.post.ajax.data', compact('getAllPost'))->render();
            return response()->json(['html' => $view]);
        }

        return view('backendc.admin.post.index', compact('getAllPost'));
    }

    public function edit(Request $request)
    {
        $getCategory = $this->category->get();
        $editPost = $this->post->find($request->id);
        return view('backendc.admin.post.edit', compact('editPost', 'getCategory'));
    }

    public function update(StorePostRequest $request)
    {


        $data = $request->validated();
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $request->file('image')->storeAs('public/avatars', $fileNameToStore);
            $data['image'] = $fileNameToStore;
        }

        $post = $this->post->update($data, $request->id);
        $post->status_schedule = $request->get('status_schedule');
        $post->publish_at = $request->get('publish_at');
        $post->save();

        return redirect()->route('post.select')->with('success', Lang::get('messages.update', ['model' => 'Update post']));
    }

    public function delete(Request $request)
    {
        $deletePost = Post::where('id', '=', $request->id)->first();
        $deletePost->delete();
        return redirect()->route('post.select')->with('success', Lang::get('messages.delete', ['model' => 'Post']));
    }

    public function search(Request $request)
    {
        $searchPostHomePage = Post::with('categories')
            ->where('title', 'LIKE', "%$request->search%")->get();
//        $searchPostHome     =;

        return view('frontend.search.index', compact('searchPostHomePage'));
    }
    public function postDelete(Request $request)
    {
        $this->post->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Delete user successful"]);
    }
    public function callapi(Request $request)
    {
        $callApi = Post::get();
        return response()->json(['api' => $callApi]);
    }
}
