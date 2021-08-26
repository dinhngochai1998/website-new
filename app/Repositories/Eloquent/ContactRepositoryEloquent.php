<?php

namespace App\Repositories\Eloquent;

use App\Models\Contact;

use App\Repositories\ContactRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class ContactRepositoryEloquent extends BaseRepository implements ContactRepository {
    
       /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        
        return Contact::class; 
       
    }
    public function boot()
    {

    }
}