<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //トップページ
    public function index(){
        return view('pages.index');
    }
}
