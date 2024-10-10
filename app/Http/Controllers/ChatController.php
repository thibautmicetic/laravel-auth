<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat()
    {

        return view('chat/chat');
    }

    public function messages()
    {
        $messages = Message::all();
        return view('chat/messages', [
            'messages' => $messages,
        ]);
    }

    public function createMessage(Request $request)
    {
        Message::create([
            'content' => $request->content,
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('messages', absolute: false));
    }
}
