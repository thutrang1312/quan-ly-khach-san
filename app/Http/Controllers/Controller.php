<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

abstract class Controller
{
    public function index(){
        return view(view: 'pages.index');
    }
}
