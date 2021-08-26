<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;

use App\Repositories\CustomerPostRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class CustomerPostRepositoryEloquent extends BaseRepository implements CustomerPostRepository {
    
       /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        
        return Post::class; 
       
    }
    public function boot()
    {

    }
}