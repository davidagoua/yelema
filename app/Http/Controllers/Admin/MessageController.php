<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::query();

        return view('back.messages', [
            'messages'=> $messages->get(),
            'page_title'=>'Messages'
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);
        $message = (new Message())->fill($data);
        $message->save();

        return back()->with('success', "Message envoyé");
    }
}
