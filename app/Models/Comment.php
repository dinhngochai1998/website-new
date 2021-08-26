<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';

    protected $fillable = [
        'content', 'id_posts', 'id_customer',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }
    public function postComment()
    {
        return $this->belongsTo(Post::class, 'id_posts');
    }
    
}

