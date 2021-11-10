<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Package;
use Mail;  
use \App\Mail\OrderMail;

class OrderController extends Controller
{
    public function store(Request $request)
    {        
        // dd($request);
       
        $add = new Order;

        $add->first_name=$request->first_name;
        $add->last_name=$request->last_name;
        $add->email=$request->email;
        $add->phone_number=$request->phone_number;
        $add->address=$request->address;
        $add->package_id=$request->package_id;
        $add->price=$request->price;
        $add->payment_method=$request->payment_method;
        $add->total=$request->total;
        $add->sub_total=$request->sub_total; 
        $add->status='Pending';
        $add->save();

        $package =  Package::where('id',$request->package_id)->first();

        $details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'package_name' => $package->name,
            'price' => $request->price,
            'payment_method' => $request->payment_method,
            'total' => $request->total,
            'sub_total' => $request->sub_total
        ];

        \Mail::to([$request->email,'nihsaan.enspirer@gmail.com'])->send(new OrderMail($details));

        return back(); 
            
    }
}
