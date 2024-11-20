<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();

        return view('messages_index', compact('messages'));

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|alpha|max:20|min:3',
            'email' => 'required|email',
            'message' => 'required|alpha_num|max:200|min:1',
        ]);

        Message::create($data);

        return redirect('/messages');
//        if ($request->validated()){
//            Message::create($data);
//
//            return redirect('/messages');
//        } else {
//            echo "validation failed";
//            //return back()->withErrors()->withInput();
//        }
    }
}
