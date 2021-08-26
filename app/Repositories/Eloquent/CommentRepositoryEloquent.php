<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;

use App\Repositories\CommentRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class CommentRepositoryEloquent extends BaseRepository implements CommentRepository {
    
       /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        
        return Comment::class; 
       
    }
    public function boot()
    {

    }
}