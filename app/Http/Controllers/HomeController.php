<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller {

    public function getIndex() {
        return view('partials.home');
        
        \Illuminate\Support\Facades\Storage::disk('local')->put('file.txt', 'Contents');
        Storage::disk('local')->put('file.txt', 'Contents');
//        Log::info('Вот кое-какая полезная информация.');
//
//        Log::warning('Что-то может идти не так.');
//
//        Log::error('Что-то действительно идёт не так.');
    }

}
