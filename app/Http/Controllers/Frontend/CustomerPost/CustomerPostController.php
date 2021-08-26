<?php

namespace App\Http\Controllers\Frontend\CustomerPost;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Customer;
use App\Repositories\PostRepository;
use App\Http\Requests\Post\StorePostRequest;
use App\Repositories\CustomerPostRepository;
use App\Http\Controllers\Controller;
use Auth;


class CustomerPostController extends Controller
{

    public function index()
    {
        if (!Auth::guard('customer')->user())
        {
            abort(404);
        }
        $getCategory = Category::get();
        return view('frontend.customerpost.index', compact('getCategory'));
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
        $newsCustomerPost = Post::create($data);
        $newsCustomerPost->customer_status = $request->customer_status;
        $newsCustomerPost->status = $request->status;
        $newsCustomerPost->id_customer = Auth::guard('customer')->user()->id;
        $newsCustomerPost->save();

        return redirect()->route('customerpost.get');
    }
    public function select(Request $request)
    {
        if(!Auth::guard('customer')->user())           
        {
            abort(404);
        }
        $getPostCustomer = Post::where('id_customer', Auth::guard('customer')->user()->id)->get();
        return view('frontend.customerpost.getpostcustomer', compact('getPostCustomer'));
       
    }

    public function edit(Request $request)
    {
        if(!Auth::guard('customer')->user())
        {
            abort(404);
        }
        $getCategory = Category::get();
        $editCustomerPost = Post::where('id', '=', $request->id)->first();
        if (!$editCustomerPost) {
            abort(404);
        }
        return view('frontend.customerpost.update', compact('editCustomerPost', 'getCategory'));
    }

    public function update(StorePostRequest $request)
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
        $newsCustomerPost = Post::create($data);

        $newsCustomerPost->customer_status = $request->customer_status;
        $newsCustomerPost->status = $request->status;
        $newsCustomerPost->id_customer = Auth::guard('customer')->user()->id;
        $newsCustomerPost->where('id', '=', $request->id);
        $newsCustomerPost->save();
        return redirect()->route('customerpost.select');
    }
    public function delete(Request $request)
    {
        $delete = Post::where('id', '=', $request->id)->first();
        $delete->delete();
        return redirect()->route('customerpost.get');
    }
}
