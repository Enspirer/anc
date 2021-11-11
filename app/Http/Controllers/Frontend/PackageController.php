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
use \App\Mail\OrderMail;

class PackageController extends Controller
{
    public function offer($id)
    {
        $package = Package::where('id',$id)->first(); 

        return view('frontend.offer',[
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

        $package =  Package::where('id',$request->package)->first();

        $details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->contact_number,
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

    public function package_latest()
    {
        $packages = Package::where('status','Approved')->latest()->take(3)->get(); 
        // dd($packages); 
        
        $final_array = [];
                    
        foreach($packages as $key => $package){
                
            $item_group = [
                'id' => $package->id,
                'name' => $package->name,
                'price' => $package->price,
                'description' => $package->description,
                'category' => $package->category,
                'points' => $package->points,
                'days' => $package->days,
                'night' => $package->night,
                'status' => $package->status,
                'order' => $package->order,
                'image' => uploaded_asset($package->image)
            ];
                
            array_push($final_array,$item_group);
        }
                
        if(count($packages) == 0){
            return null;
        }else{ 
            return $final_array;
        }    

    }

}
