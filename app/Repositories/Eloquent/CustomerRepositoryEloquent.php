<?php

namespace App\Repositories\Eloquent;

use App\Models\Customer;

use App\Repositories\CustomerRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class CustomerRepositoryEloquent extends BaseRepository implements CustomerRepository {
    
       /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        
        return Customer::class; 
       
    }
    public function boot()
    {

    }
}