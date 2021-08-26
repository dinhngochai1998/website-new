<?php

namespace App\Http\Controllers\Backend\Customer;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Customer;
use Auth;

class CustomerController extends Controller
{

    public function select(Request $request)
    {
        $customer = Customer::get();
        if ($request->ajax()) {
            $customer = Customer::where('name', 'like', '%' . $request->name . '%')->get();
            $view = view('backend.customer.ajax.data', compact('customer'))->render();
            return response()->json(['html' => $view]);
        }
        return view('backend.customer.select', compact('customer'));
    }
    public function delete(Request $request)
    {
        $delete = Customer::where('id', '=', $request->id)->first();
        $delete->delete();
        return redirect()->route('customer.select');
    }
}
