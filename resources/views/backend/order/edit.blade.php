@extends('backend.layouts.app')

@section('title', __('order Approval'))

@section('content')
    
    <form action="{{route('admin.order.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row px-2 py-3">
                                                                        
                                    <!-- <div class="row"> -->
                                        
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Name:</td>
                                                            <td>{{ $order->first_name }}&nbsp;{{ $order->last_name }}</td>                                                         
                                                        </tr>                                                                                                             
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Email</td>
                                                            <td>{{ $order->email }}</td>                                                         
                                                        </tr>
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Phone Number:</td>
                                                            <td>{{ $order->phone_number }}</td>                                                         
                                                        </tr>
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Address:</td>
                                                            <td>{{ $order->address }}</td>                                                         
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row mt-1 pe-0">
                                            <div class="col-8">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="40%" style="font-weight: 600;">Package:</td>
                                                            @if(App\Models\Package::where('id',$order->package_id)->first() == null)
                                                                <td><span class="badge badge-danger">Package Deleted</span></td>
                                                            @elseif(App\Models\Package::where('id',$order->package_id)->first()->status != 'Approved')
                                                                <td>
                                                                    <span class="badge badge-warning">{{ App\Models\Package::where('id',$order->package_id)->first()->name }} &nbsp; ( Package not Approved )</span>
                                                                </td>
                                                            @else
                                                                <td>{{ App\Models\Package::where('id',$order->package_id)->first()->name }}</td>
                                                            @endif                                                            
                                                        </tr>
                                                         
                                                        <tr>
                                                            <td style="font-weight: 600;">Payment Method:</td>
                                                            <td>{{ $order->payment_method }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-4">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>    
                                                        <tr>
                                                            <td style="font-weight: 600;">Price:</td>
                                                            <td>{{ $order->price }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Sub Total:</td>
                                                            <td>{{ $order->sub_total }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Total:</td>
                                                            <td>{{ $order->total }}</td>
                                                        </tr>  
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-5 px-2 pt-1">

                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select class="form-control" name="status" required>
                                    <option value="Approved" {{ $order->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Disapproved" {{ $order->status == 'Disapproved' ? "selected" : "" }}>Disapprove</option> 
                                    <option value="Pending" {{ $order->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $order->id }}"/>
                                <a href="{{route('admin.order.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>       

    </form>


<br><br>
@endsection
