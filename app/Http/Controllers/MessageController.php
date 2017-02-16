<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Message;
use App\Models\Reply;

use DateTime;
use Redirect;
use Session;

class MessageController extends Controller
{
    public function messageBoard(Request $request)
    {
        return view('message-board', [

            'messages' => Message::orderBy('updated_on', 'DESC')->get(),
        ]);
    }

    public function message($message, Request $request)
    {
        $message_id = $message;

        return view('message', [

            'messages' => Message::where('id', '=', $message_id)->get(),
            'message_id' => $message_id,
            'replies' => Reply::where('message_id', '=', $message_id)->orderBy('posted_on', 'DESC')->get(),
        ]);
    }

    public function messagePost(Request $request)
    {
        $user_id = $request->user()->id;

        $message = new Message;
        $message->user_id = $user_id;
        $message->message_title = $request->message_title;
        $message->message = $request->message;
        $message->posted_on = new DateTime;
        $message->save();

        Session::flash('success', 'message posted');
        return Redirect::route('message-board');
    }

    public function replyPost($message, Request $request)
    {
        $message_id = $message;
        $user_id = $request->user()->id;

        Message::where('id', '=', $message_id)->increment('replies');

        $reply = new Reply;
        $reply->message_id = $message_id;
        $reply->user_id = $user_id;
        $reply->reply = nl2br($request->reply);
        $reply->save();

        Session::flash('success', 'reply posted');
        return Redirect::route('message', $message_id);
    }
}
