<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;

use App\Repositories\CategoryRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {

        return Category::class;
    }
    public function boot()
    {
    }
    public function getDataCategory()
    {
        $getdata = $this->whereNull('parent_id')->get();
        return $getdata;
    }
    public function createCategory($id)
    {
        $create = $this->create($id);
        return $create;
    }
}
