<?php

namespace App\Http\Controllers;


use App\Mail\MessageRecieved;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{


    public function store()
    {
        $msg = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'
        ], [
            'name.required' => __('We need your name to continue')
        ]);

        //Enviar el email
        Mail::to('tomas.car.guit@gmail.com')->queue(new MessageRecieved($msg));

        //return response('Mensaje enviado', 201)->header('X-TOKEN','secret')->header('X-TOKEN-2','resecret')->cookie('X-COOKIE', 'secretcookie');
        //return back()
        return redirect()->route('contact')->with('info',__('Your message was sent correctly'));
    }
}
