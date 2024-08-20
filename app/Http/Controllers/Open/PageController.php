<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    //
    public function home(): View
    {
        return view('open.pages.home');
    }

    public function contact(): View
    {
        return view('open.pages.contact');
    }

    public function contactSend(): View
    {
        return view('open.pages.contact');
    }

    public function aboutus(): View
    {
        return view('open.pages.aboutus');
    }
}
