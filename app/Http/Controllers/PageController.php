<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class PageController extends Controller
{
    public function home() {
        return view('home');
    }
    public function about() {
        return view('about');
    }
    public function services() {
        $services = Services::latest()->get();
        return view('services', compact('services'));
    }
    public function contact() {
        return view('contact');
    }
}
