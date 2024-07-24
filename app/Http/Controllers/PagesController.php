<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function dashboard()
    {
        return view('pages.dashboard');
    }
    function product()
    {
        return view('pages.product');
    }
    function order()
    {
        return view('pages.order');
    }
}
