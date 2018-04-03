<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use Auth;

class Email extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function book(Request $request) {
       
        $data = array(
            'request' => "Unit Booking",
            'optional' => $request->input('optional'),
            'title' => $request->input('title'),
            'condo' => $request->input('condo'),
            'propertyS' => $request->input('propertyS'),
            'propertyE' => $request->input('propertyE'),
            'customer' => auth()->user()->name,
            'customerE' => auth()->user()->email,
            'customerP' => auth()->user()->phone_num,
            'customerT' => auth()->user()->telephone_num,
        );

        //Send Email Notification To Cusomer
    
        // Mail::send('/email/book', $data, function ($message) {

        //     $customer = auth()->user()->email;
    
        //     $message->from('elliotwalteriq@gmail.com', 'Rentout Property Specialist');
    
        //     $message->to($customer)->subject('Booking Request');
    
        // });

        //Send Email Notification to Property Specialist

        Mail::send('/email/adminbook', $data, function ($message) {

            $customer = auth()->user()->email;
    
            $message->from('elliotwalteriq@gmail.com', 'Rentout Property Specialist');
    
            $message->to($request->input('propertyE'))->subject('Booking Request');
    
        });


        return redirect('\post')->with('success','Booking Request Sent!');

    
    }

    public function siteVisit(Request $request, $id) {
        // Request $request

        $data = array(
            'request' => "Sire Visit",
            'optional' => $request->input('optional'),
            'title' => $request->input('title'),
            'condo' => $request->input('condo'),
            'propertyS' => $request->input('propertyS'),
            'propertyE' => $request->input('propertyE'),
            'customer' => auth()->user()->name,
            'customerE' => auth()->user()->email,
            'customerP' => auth()->user()->phone_num,
            'customerT' => auth()->user()->telephone_num,
        );

        // Send Email Notification To Cusomer
    
        Mail::send('/email/sitevisit', $data, function ($message) {

            $customer = auth()->user()->email;
    
            $message->from('elliotwalteriq@gmail.com', 'Rentout Property Specialist');
    
            $message->to($customer)->subject('Booking Request');
    
        });

        // Send Email Notification to Property Specialist

        Mail::send('/email/adminsitevisit', $data, function ($message) {

            $customer = auth()->user()->email;
    
            $message->from('elliotwalteriq@gmail.com', 'Rentout Property Specialist');
    
            $message->to($request->input('propertyE'))->subject('Booking Request');
    
        });

        return redirect('\post')->with('success','Site Visit Request Sent!');
    
    }
}
