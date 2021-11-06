<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Package;
use DataTables;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        return view('backend.order.index');
    }

    public function getDetails(Request $request)
    {
            $data = Order::get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('admin.order.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm"><i class="fas fa-stamp"></i> Approval </a>';
                        $button2 = '<a href="'.route('admin.print',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-success btn-sm ml-2"><i class="fas fa-print"></i> Print</a>';
                        $button3 = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i> Delete</button>';

                        return $button. $button2. $button3;
                    })
                    ->addColumn('date', function($data){
                        
                        $detail = '<p>'.$data->created_at->toDateString().'</p>';
                        return $detail;                        
                    })
                    ->addColumn('status', function($data){
                        
                        if($data->status == 'Approved'){
                            $details = '<span class="badge badge-success">Approved</span>';
                        }elseif($data->status == 'Disapproved'){                            
                            $details = '<span class="badge badge-danger">Disapproved</span>';
                        }else{
                            $details = '<span class="badge badge-warning">Pending</span>';
                        }
                        return $details;                        
                    })

                    ->rawColumns(['action','status','date'])
                    ->make(true);
        
    }

   
    public function edit($id)
    {
        $package = Package::get();
        $order = Order::where('id',$id)->first();

        return view('backend.order.edit',[
            'package' => $package,
            'order' => $order
        ]);
    }

    public function update(Request $request)
    {            
        $update = new Order;

        $update->status=$request->status; 
                
        Order::whereId($request->hidden_id)->update($update->toArray());           

        return redirect()->route('admin.order.index')->withFlashSuccess('Updated Successfully');  
    }

    public function destroy($id)
    {
        Order::where('id', $id)->delete(); 
    }

    public function print($id)
    {
        $order = Order::where('id',$id)->first();

        return view('backend.order.print',[
            'order' => $order
        ]);
    }
}
