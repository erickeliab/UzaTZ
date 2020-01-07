<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //creating new instance of message object
         //selecting all the records frm the model
        $messages = Message::all();

        return $messages;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returns the view with the form of creating new message
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //creating the new object for new message

        $me = new Message;


        /**the new message object will import from the table wth fields with names
         * subject,body,receiver
         */

        $me->subject = $request->subject;
        $me->body = $request->body;
        $me->id = Auth::user();
        $me->receiver = $request->receiver;
        $me->save();

        //redirecting to the view with all the messages

        return redirect('/messages');
        return $me;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($message_id)
    {
        //find by the passed id
        $singlemsg = Message::findOrFail($message_id);

        //returning the view with this message's data

        return $singlemsg;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //returnig the view with the form for updating the message with the id matching the passed parameter

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //putting the message with the id matching the parameter into an object
        $message = Message::findOrFail($id);

        //putting the new values to edit in the object from the request object
        $message->subject = $request->subject;
        $message->body = $request->body;
        $message->id = Auth::user();
        $message->receiver = $request->receiver;
        $message->save();

        //redirecting to the message
      return redirect(`/messages/${id}`);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //finding a method with the message_id matching our parameter
        $mess = Message::findOrFail($id);

        //change the destroyed field to true
        $mess->destroyed = true;

        //redirect to the messages home page
        return redirect('/messages');
    }
}
