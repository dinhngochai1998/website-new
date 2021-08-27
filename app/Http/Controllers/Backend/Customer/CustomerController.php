<?php

namespace App\Http\Controllers\Backend\Customer;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Auth;

class CustomerController extends Controller
{
    protected $customer;
    public function __construct(CustomerRepository $customer)
    {
        $this->customer = $customer;
    }
    public function select(Request $request)
    {
        $customer = $this->customer->paginate(3);
        if ($request->ajax()) {
            $customer = $this->customer->where('name', 'like', '%' . $request->name . '%')->get();
            $view = view('backend.customer.ajax.data', compact('customer'))->render();
            return response()->json(['html' => $view]);
        }
        return view('backendc.admin.customer.index', compact('customer'));
    }
    public function delete(Request $request)
    {
        $delete = $this->customer->where('id', '=', $request->id)->first();
        $delete->delete();
        return redirect()->route('customer.select');
    }
}
