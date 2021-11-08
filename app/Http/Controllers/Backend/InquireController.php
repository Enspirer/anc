<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Inquire;
use App\Models\Package;

class InquireController extends Controller
{
    public function index()
    {
        return view('backend.inquire.index');
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Inquire::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.inquire.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-info-circle"></i> View </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })                     
                    ->addColumn('package', function($data){                        
                        if(Package::where('id',$data->package_id)->first() == null){
                            $details = '<span class="badge badge-danger">Package Deleted</span>';
                        }
                        elseif(Package::where('id',$data->package_id)->first()->status != 'Approved'){
                            $details = '<span class="badge badge-warning">'.Package::where('id',$data->package_id)->first()->name.'&nbsp;( Package not Approved )</span>';
                        }
                        else{
                            $details = Package::where('id',$data->package_id)->first()->name;
                        }
                        return $details;                        
                    })  
                    ->editColumn('status', function($data){
                        if($data->status == 'Pending'){
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }
                        else{
                            $status = '<span class="badge badge-success">Seen</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status','package'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $inquire = Inquire::where('id',$id)->first();
        
        // dd($contact_us);              
        
        return view('backend.inquire.edit',[
            'inquire' => $inquire         
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);     
   
        $update = new Inquire;

        $update->status='Seen';        
        
        Inquire::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.inquire.index')->withFlashSuccess('Updated Successfully'); 
                            

    }

    public function destroy($id)
    {        
        $data = Inquire::findOrFail($id);
        $data->delete();   
    }
}
