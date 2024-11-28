<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('contact.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"=> "required",
            "email"=> "required",
            "msg"=> "required",
        ]);

        Message::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'message'=>$request->get('msg')
        ]);
        return redirect()->back()->with('message','Message Sent');
    }
}
