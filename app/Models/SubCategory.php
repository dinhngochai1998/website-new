<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    protected $table = 'subcategory';

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug','category_id',
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
    
}