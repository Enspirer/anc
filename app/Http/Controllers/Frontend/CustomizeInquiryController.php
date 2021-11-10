<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomizeInquiry;
use Mail;  
use \App\Mail\CustomizeInquireMail;

class CustomizeInquiryController extends Controller
{
        


    public function customize_inquire(Request $request)
    {        
        // dd($request);
       
        $add = new CustomizeInquiry;

        $add->first_name=$request->first_name;
        $add->last_name=$request->last_name;
        $add->email=$request->email;
        $add->phone_number=$request->phone_number;
        $add->address=$request->address;
        $add->activities=$request->activities;
        $add->location=$request->location;
        $add->accommodation=$request->accommodation;
        $add->date_of_start=$request->date_of_start;
        $add->number_of_dates=$request->number_of_dates;
        $add->budget=$request->budget;       
        $add->status='Pending';
        $add->save();

        $details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'activities' => $request->activities,
            'location' => $request->location,
            'accommodation' => $request->accommodation,
            'date_of_start' => $request->date_of_start,
            'number_of_dates' => $request->number_of_dates,
            'budget' => $request->budget
        ];

        \Mail::to([$request->email,'nihsaan.enspirer@gmail.com'])->send(new CustomizeInquireMail($details));

        return back(); 
            
    }


}
