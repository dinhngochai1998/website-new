<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\RepositoryInterface;

interface CategoryRepository extends RepositoryInterface
{
    public function getDataCategory();
    public function createCategory($id);
}
