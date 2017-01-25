<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Message;

class MessageController extends Controller
{
    public function message(Request $request)
    {
        return view('message', [

            'posts' => Message::orderBy('posted_on', 'DESC')->get(),
        ]);
    }

    public function reply($post)
    {
        # code...
    }
}
