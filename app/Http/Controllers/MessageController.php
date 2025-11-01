<?php

namespace App\Http\Controllers;

use App\Models\Message;



class MessageController extends Controller
{
    public const DIR = "admin.messages.";

    public function index()
    {
        $messages = Message::paginate(config('pagination.count'));
        return view(self::DIR . "index", compact("messages"));
    }


    public function show(Message $message)
    {
        return view("admin.messages.show", compact("message"));
    }



    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route("admin.messages.index")
            ->with('Success', 'Message deleted successfully!');
    }
}
