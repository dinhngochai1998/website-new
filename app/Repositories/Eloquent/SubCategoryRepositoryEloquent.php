<?php

namespace App\Repositories\Eloquent;

use App\Models\SubCategory;

use App\Repositories\SubCategoryRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class SubCategoryRepositoryEloquent extends BaseRepository implements SubCategoryRepository {
    
       /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        
        return SubCategory::class; 
       
    }
    public function boot()
    {

    }
}