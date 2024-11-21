<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $messages = Message::latest()->get();

        return view('messages_index', compact('messages'));

    }

    public function store(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $data = $request->validate([
            'name' => 'bail|required|alpha|max:20|min:3',
            'email' => 'bail|required|email',
            'message' => 'bail|required|alpha_num|max:200|min:1',
        ]);

        Message::create($data);
        return redirect('/messages');

    }
}
