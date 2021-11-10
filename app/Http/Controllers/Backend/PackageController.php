<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        return view('backend.package.index');
    }

    public function create()
    {
        return view('backend.package.create');
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Package::get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){                       
                        $button = '<a href="'.route('admin.package.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->addColumn('image', function($data){
                        $img = '<img src="'.uploaded_asset($data->image).'" style="width: 60%">';
                     
                        return $img;
                    })
                    ->addColumn('status', function($data){
                        if($data->status == 'Approved'){
                            $status = '<span class="badge badge-success">Approved</span>';
                        }
                        elseif($data->status == 'Disapproved'){
                            $status = '<span class="badge badge-danger">Disapproved</span>';
                        }
                        else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status','image'])
                    ->make(true);
        }
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);

        if($request->image == null){
            return back()->withErrors('Select an Image');
        }else{             

            $add = new Package;

            $add->name=$request->name;
            $add->description=$request->description;        
            $add->image=$request->image;
            $add->price=$request->price;
            $add->night=$request->night;
            $add->days=$request->days;
            $add->category=$request->category;
            $add->status=$request->status;
            $add->order=$request->order;
            $add->save();

            return redirect()->route('admin.package.index')->withFlashSuccess('Added Successfully'); 
            
        }
    }

    public function edit($id)
    {
        $package = Package::where('id',$id)->first();         

        return view('backend.package.edit',[
            'package' => $package
        ]);  
    }


    public function update(Request $request)
    {    
        // dd($request);

        if($request->image == null){
            return back()->withErrors('Select an Image');
        }else{             

            $update = new Package;

            $update->name=$request->name;
            $update->description=$request->description;        
            $update->image=$request->image;
            $update->night=$request->night;
            $update->days=$request->days;
            $update->category=$request->category;
            $update->price=$request->price;
            $update->status=$request->status;
            $update->order=$request->order;
                
            Package::whereId($request->hidden_id)->update($update->toArray());

            return redirect()->route('admin.package.index')->withFlashSuccess('Updated Successfully');  
                  
        }                            

    }

    public function destroy($id)
    {        
        $data = Package::findOrFail($id);
        $data->delete();   
    }

}
