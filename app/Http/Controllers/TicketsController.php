<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use App\Ticket;

use Illuminate\Support\Facades\Auth;

use App\Mailers\AppMailer;

class TicketsController extends Controller
{
    // Create Tickets, Show form with all the categories

    public function create(){
      $categories = Category::all();

      return view('tickets.create', compact('categories'));

    }

    public function store(Request $request, AppMailer $mailer){

        // Set up form field validations
        $this->validate($request, [
            'title'=>'required',
            'category'=>'required',
            'priority'=>'required',
            'message'=>'required'
          ]);

         $ticket = new Ticket([
            'title'     => $request->input('title'),
            'user_id'   => Auth::user()->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id'  => $request->input('category'),
            'priority'  => $request->input('priority'),
            'message'   => $request->input('message'),
            'status'    => "Open"
        ]);

        $ticket->save();
       // $mailer->sendTicketInformation(Auth::user(), $ticket);

        var_dump($request);

        return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");

    }

}
