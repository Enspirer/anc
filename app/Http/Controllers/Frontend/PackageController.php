<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Package;
use App\Models\Inquire;
use App\Models\Order;
use Mail;  
use \App\Mail\InquireMail;

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

        $details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'nationality' => $request->nationality,
            'airlines' => $request->airlines,
            'hotels' => $request->hotels,
            'meals' => $request->meals,
            'special_requirements' => $request->special_requirements,
            'budget' => $request->budget
        ];

        \Mail::to([$request->email,'nihsaan.enspirer@gmail.com'])->send(new InquireMail($details));

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

    public function package_details($id,$name)
    {
        $package = Package::where('id',$id)->where('name',$name)->first(); 
        // dd($package);   
                
        if($package == null){
            return null;
        }else{            
            return [
                'id' => $package->id,
                'name' => $package->name,
                'price' => $package->price,
                'description' => $package->description,
                'category' => $package->category,
                'days' => $package->days,
                'night' => $package->night,
                'status' => $package->status,
                'order' => $package->order,
                'image' => uploaded_asset($package->image)
            ];
        }    

    }

}
