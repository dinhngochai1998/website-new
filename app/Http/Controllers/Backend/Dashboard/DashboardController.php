<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        return view('backendc/admin/dashboard/index');
    }
    public function setSession(){
        
     
    }
}