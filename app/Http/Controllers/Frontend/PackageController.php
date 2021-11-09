<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Package;
use App\Models\Inquire;
use App\Models\Order;

class PackageController extends Controller
{
    public function solo_package($id)
    {
        $package = Package::where('id',$id)->first(); 

        return view('frontend.solo_package',[
            'package' => $package
        ]);
    }

    public function inquire(Request $request)
    {        
        // dd($request);
       
        $add = new Inquire;

        $add->package_id=$request->package;
        $add->first_name=$request->first_name;
        $add->last_name=$request->last_name;
        $add->email=$request->email;
        $add->contact=$request->contact_number;
        $add->address=$request->address;
        $add->nationality=$request->nationality;
        $add->airlines=$request->airlines;
        $add->hotels=$request->hotels;
        $add->meals=$request->meals;
        $add->special_requirements=$request->special_requirements;
        $add->budget=$request->budget;        
        $add->status='Pending';
        $add->save();

        return back(); 
            
    }

    public function pay(Request $request)
    {        
        // dd($request);
       
        $add = new Order;

        $add->package_id=$request->package;
        $add->first_name=$request->first_name;
        $add->last_name=$request->last_name;
        $add->email=$request->email;
        $add->phone_number=$request->contact_number;
        $add->address=$request->address;
        $add->payment_method=$request->payment_method;
        $add->price=$request->price;
        $add->total=$request->total;
        $add->sub_total=$request->sub_total;
        $add->status='Pending';
        $add->save();

        return back(); 
            
    }

}
