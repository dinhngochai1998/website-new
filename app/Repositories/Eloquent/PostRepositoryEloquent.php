<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;

use App\Repositories\PostRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class PostRepositoryEloquent extends BaseRepository implements PostRepository {
    
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