<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Sluggable;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use Sortable;

    protected $table = 'posts';
    const POST_HIGHLIGHTS = 1;
    const POST_NEWS = 2;
    const POST_SPORT = 4;
    const POST_CULTURAL = 5;
    const POST_HOTNEWS = 7;
    const POST_PROJECT = 8;
    

    protected $fillable = [
        'title', 'description','content','image','slug','id_category','sort','customer_status','status',
    ];
    public $sortable = ['title'];
 
    public function categories()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function customerPost()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public static function getNewsOfCategory($idCate) {
       return self::select('posts.*', 'category.name')->join('category', function($join) {
            $join->on('posts.id_category', '=', 'category.id');
        })->where('category.id', $idCate)
           ;
    }
    // public static function getPost($notgetcate) {
    //     return self::select('posts.*', 'category.name')->join('category', function($join) {
    //          $join->on('posts.id_category', '=', 'category.id');
    //      })->whereNotIn('id', $notgetcate);
    //  }    
}
