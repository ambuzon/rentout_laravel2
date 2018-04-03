<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use Auth;

class Email extends Controller
{
    
    public function siteVisit(Request $request, $id) {
        // Request $request

        $data = array(
            'name' => "Unit Site Visit",
            'content' => $request->input('inquiry'),
        );

        //Rentout will send email to User
    
        Mail::send('/email/sitevisit', $data, function ($message) {
            $user = auth()->user()->email;
            
            $message->from('elliotwalteriq@gmail.com', 'Rentout Property Specialist');
    
            $message->to($user)->subject('Site Visit Request');

    
        });

        return $ps;

        // return redirect('\post')->with('success','Site Visit Request Sent!');
    
    }


    public function book(Request $request) {

        $data = array(
            'name' => "Unit Booking",
            'content' => $request->input('inquiry'),

        );
    
        Mail::send('/email/book', $data, function ($message) {

            $user = auth()->user()->email;
    
            $message->from('elliotwalteriq@gmail.com', 'Rentout Property Specialist');
    
            $message->to($user)->subject('Booking Request');
    
        });
    
    }
}
