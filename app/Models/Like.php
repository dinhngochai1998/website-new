<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
    protected $fillable = [
        'customer_id', 'post_id', 'like',
    ];
    public function subcategories()
    {
        return $this->belongsTo(customer::class, 'customer_id', 'id');
    }
   
}
