<?php

namespace App\Http\Controllers\Backend\Category;

use App\Jobs\CreateCategory;
use App\Jobs\SendEmailContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Lang;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function index(Request $request)
    {
        $category = $this->category->getDataCategory();
        return view('backendc.admin.category.create', compact('category'));
    }

    public function create(StoreCategoryRequest $request)
    {
//        $NewCategory = $this->category->createCategory($request->validated());
        dispatch(New CreateCategory($request->all()));
        return redirect()->route('category.select')->with('success', Lang::get('message.create', ['model' => 'Category']));
    }

    public function select(Request $request)
    {
        $getCategory = $this->category->paginate(5);
        if ($request->ajax()) {
            $getCategory = $this->category->where('name', 'like', '%' . $request->name . '%')->get();
            $view = view('backendc.admin.category.ajax.search', compact('getCategory'))->render();
            return response()->json(['html' => $view]);
        }
        return view('backendc.admin.category.index', compact('getCategory'));
    }

    public function edit(Request $request)
    {
        $getEditCategory = $this->category->all();
        $editCategory = $this->category->find($request->id);
        return view('backendc.admin.category.edit', compact('editCategory', 'getEditCategory'));
    }

    public function update(StoreCategoryRequest $request)
    {
        $updateCategory = $this->category->update($request->validated(), $request->id);
        return redirect()->route('category.select')->with('success', Lang::get('messages.update', ['model' => 'Category']));;
    }

    public function delete(Request $request)
    {
        $deleteCategory = $this->category->delete($request->id);
        return redirect()->route('category.select')->with('success', lang::get('messages,Delete', ['model' => 'Category']));
    }
    public function categoryDelete(Request $request)
    {
        $this->category->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Delete user successful"]);
    }
}
