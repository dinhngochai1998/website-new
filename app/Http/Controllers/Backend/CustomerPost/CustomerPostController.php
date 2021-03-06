<?php

namespace App\Http\Controllers\Backend\CustomerPost;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;
use Auth;

class CustomerPostController extends Controller
{

    public function select(Request $request)
    {
        $getAllCustomerPost = Post::with('categories')->where('status', '=', '2')->paginate(5);
        if ($request->ajax()) {
            $getAllCustomerPost = Post::where('title', 'like', '%' . $request->title . '%')->orwhere('status', '=', '2')->get();
            $view = view('backendc.admin.customerPost.ajax.data', compact('getAllPost'))->render();
            return response()->json(['html' => $view]);
        }
        return view('backendc.admin.customerPost.index', compact('getAllCustomerPost'));
    }
    public function edit(Request $request)
    {
        $editCustomerPost = Post::where('id', '=', $request->id)->first();
        return view('backendc.admin.customerPost.edit', compact('editCustomerPost'));
    }
    public function update(Request $request)
    {
        $updateCustomerPost = Post::where('id', $request->id)->first();
        $updateCustomerPost->status = $request->get('status');
        $updateCustomerPost->save();
        return redirect()->route('userpost.select');
    }
}
