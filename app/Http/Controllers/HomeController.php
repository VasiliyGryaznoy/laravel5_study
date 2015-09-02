<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller
{
 
    
    public function getIndex()
    {
        return view('partials.home');
    }
    
    public function getShowUser($id)
    {
        return view('users.user'); 
    }
}

