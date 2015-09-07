<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller {

    public function getIndex() {
        return view('partials.home');
        
        
        var_dump(\Illuminate\Contracts\Logging\Log::info('Вот кое-какая полезная информация.'));
//        Log::info('Вот кое-какая полезная информация.');
//
//        Log::warning('Что-то может идти не так.');
//
//        Log::error('Что-то действительно идёт не так.');
    }

}
