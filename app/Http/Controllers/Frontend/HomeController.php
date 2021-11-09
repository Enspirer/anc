<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DB;
use App\Models\Package;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }    

    public function package_details($id,$name)
    {
        // dd($name);

        $package = Package::whereId($id)->where('name',$name)->first(); 
        // dd($package);   
                
        if($package == null){
            return null;
        }else{            
            return [
                'id' => $package->id,
                'name' => $package->name,
                'price' =>$package->price,
                'description' =>$package->description,
                'status' =>$package->status,
                'order' =>$package->order,
                'image' => uploaded_asset($package->image)
            ];
        }    

    }



}
