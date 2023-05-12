<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $folders = Folder::where('id', Auth::user()->id)->first();
        if(is_null($folders)){
            return view('home');
        }
        return redirect()->route('tasks.index',['id' => $folders['id']]);
    }

    public function register(){
        return view('auth.register');
    }
}
