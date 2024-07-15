<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\MessageNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages.tabel', compact('messages'));
    }

    public function view($id){
        $message = Message::findOrFail($id);
        return view('admin.messages.view', compact('message'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email',
            'message' => 'required|string'
        ]);

        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);
        $this->sendEmailNotification($request->name, $request->email, $request->message,$message->id);
        return redirect()->back()->with('success', 'Your message has been sent successfully');
    }

    protected function sendEmailNotification($name, $email, $message, $id)
{
    $message = Message::findOrFail($id);

    $name = $message->name;
    $email = $message->email;
    $messageContent = $message->message;
    $created_at = $message->created_at;

    Mail::to('devcodeid1@gmail.com')->send(new MessageNotification($name, $email, $messageContent, $created_at));
}

}
