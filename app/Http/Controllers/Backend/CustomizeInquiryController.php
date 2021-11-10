<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\CustomizeInquiry;


class CustomizeInquiryController extends Controller
{
    public function index()
    {
        return view('backend.customize_inquire.index');
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = CustomizeInquiry::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.customize_inquire.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-info-circle"></i> View </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
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
                    
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $customize_inquire = CustomizeInquiry::where('id',$id)->first();
        
        // dd($customize_inquire);              
        
        return view('backend.customize_inquire.edit',[
            'customize_inquire' => $customize_inquire         
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);     
   
        $update = new CustomizeInquiry;

        $update->status=$request->status;        
        
        CustomizeInquiry::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.customize_inquire.index')->withFlashSuccess('Updated Successfully'); 
                            

    }

    public function destroy($id)
    {        
        $data = CustomizeInquiry::findOrFail($id);
        $data->delete();   
    }
}
