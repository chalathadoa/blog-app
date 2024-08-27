<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $this->authorize('admin', 'author');
        return view('post');
    }
}
