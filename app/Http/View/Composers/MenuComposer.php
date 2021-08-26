<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Contact;

class MenuComposer {
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @rerurn void
     */
    public function compose(View $view)
    {
        $categories = Category::whereNull('parent_id')->get();
        $subCategories = Category::where('parent_id', '<>', null)->get();       
        $view->with(compact(
            'categories','subCategories'
        ));
    }
}
