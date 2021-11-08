@extends('backend.layouts.app')

@section('title', __('Invoice'))

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/booking_print.css') }}">
@endpush

<div class="container text-right">
   <div class="col-md-12">
      <a href="javascript:;" onclick="window.print()" class="btn btn-md btn-light m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg text-danger"></i> Print</a>
   </div>
</div>

<br>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
   <div class="card">
      <div class="col-md-12">
         <div class="invoice p-5">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse f-w-600">
               
               
                  
            </div>

            <div class="invoice-company text-inverse f-w-600">
               <table width="100%">
                  <tr>
                     <td width="50%">
                        <table>
                           <tr>
                              <td class="text-right"><h6 class="invoice-from">From :</h6></td>
                              <td><h6 class="invoice-from"><strong class="text-inverse">&nbsp;AMC HOLIDAYS</strong> anura@amcholidays.com</h6></td>
                           </tr>
                           <tr>
                              <td class="text-right"><h6 class="invoice-from">Date :</h6></td>
                              <td><h6 class="invoice-from"><strong class="text-inverse">&nbsp;{{ date('F d,Y') }}</strong></h6></td>
                           </tr>
                           <tr>
                              <td class="text-right"><h6 class="invoice-from">To :</h6></td>
                              <td><h6 class="invoice-from"><strong class="text-inverse">&nbsp;{{$order->first_name}}</strong> {{$order->last_name}}</h6></td>
                           </tr>
                        </table>
                     </td>
                     <td class="text-right"><img src="{{url('img/site-logo.png')}}" style="width: 30%;"></td>
                  </tr>            
               </table>
               <table width="100%" class="mt-4">
                  <tr>
                     <td width="50%">
                        <h6 class="text-inverse">ORDER STATUS: 
                           @if($order->status == 'Approved')
                              <strong class="text-inverse ml-2" style="color:green">{{$order->status}}</strong>
                           @elseif($order->status == 'Disapproved')
                              <strong class="text-inverse ml-2" style="color:red">{{$order->status}}</strong>
                           @else
                              <strong class="text-inverse ml-2" style="color:#DE970B">{{$order->status}}</strong>
                           @endif
                        </h6> 
                     </td>
                     <td>

                     </td>
                  </tr> 
               </table>
            </div>

            <hr>

            <div class="invoice-header">
               <div class="invoice-from">
                  <address class="mt-2 mb-2">
                     <strong class="text-inverse" style="border-bottom:1px solid #23282c;">Customer Information</strong><br>
                        <table class="mt-3" width="380px">
                           <tr>
                              <td><h6 class="text-inverse">Name:</h6></td>
                              <td><h6 class="text-inverse">{{ $order->first_name }}&nbsp;{{ $order->last_name }}</h6></td>
                           </tr>
                           <tr>
                              <td><h6 class="text-inverse">Email:</td>
                              <td><h6 class="text-inverse">{{$order->email}}</h6></td>
                           </tr>
                           <tr>
                              <td><h6 class="text-inverse">Phone:</td>
                              <td><h6 class="text-inverse">{{$order->phone_number}}</h6></td>
                           </tr>
                           <tr>
                              <td><h6 class="text-inverse">Address:</td>
                              <td><h6 class="text-inverse">{{$order->address}}</h6></td>
                           </tr>
                        </table>
                  </address>
                  
               </div>
                        
            </div>

            <hr>

            <div class="invoice-header">
               <div class="invoice-from">
                  <address class="mt-2 mb-2">
                     <strong class="text-inverse" style="border-bottom:1px solid #23282c;">Order Information</strong><br>
                        <table class="mt-3" width="380px">
                           <tr>
                              <td><h6 class="text-inverse">Package Name:</h6></td>
                              <td>
                                 <h6 class="text-inverse">
                                 @if(App\Models\Package::where('id',$order->package_id)->first() == null)
                                 <span class="badge badge-danger">Package Deleted</span>
                                 @elseif(App\Models\Package::where('id',$order->package_id)->first()->status != 'Approved')                
                                    <span class="badge badge-warning">{{ App\Models\Package::where('id',$order->package_id)->first()->name }} &nbsp; ( Package not Approved )</span>
                                 @else
                                    {{ App\Models\Package::where('id',$order->package_id)->first()->name }}
                                 @endif 
                                 </h6>
                              </td>
                           </tr>
                           <tr>
                              <td><h6 class="text-inverse">Payment_method:</td>
                              <td><h6 class="text-inverse">{{$order->payment_method}}</h6></td>
                           </tr>
                           <tr>
                              <td><h6 class="text-inverse">Price:</td>
                              <td><h6 class="text-inverse">{{$order->price}}</h6></td>
                           </tr>
                           <tr>
                              <td><h6 class="text-inverse">Sub Total:</td>
                              <td><h6 class="text-inverse">{{$order->sub_total}}</h6></td>
                           </tr>
                           <tr>
                              <td><h6 class="text-inverse">Total:</td>
                              <td><h6 class="text-inverse">{{$order->total}}</h6></td>
                           </tr>
                        </table>
                  </address>
                  
               </div>
                        
            </div>

            <!-- begin invoice-footer -->
            <div class="invoice-footer mt-5 p-3" style="margin:20px 0 20px 0; border-top: 2px solid #A9A9A9; border-bottom: 2px solid #A9A9A9" align="center">
               <h6 class="text-center m-b-5 f-w-600">Thank you for booking with tours@amcholidays.com<br>
               Please check your details are correct and reconfirm, Our Contact numbers are +94 774401486 | +94 112577188</h6>

               <h6 class="text-center m-b-5 f-w-600 mt-3">Orders are subject to our terms & conditions. We welcome all comments on the service we provide.<br></h6>
            </div>
            <!-- end invoice-footer -->
            
         </div>
      </div>
   </div>
</div>












@endsection
