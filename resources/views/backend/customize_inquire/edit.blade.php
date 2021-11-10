@extends('backend.layouts.app')

@section('title', __('Status'))

@section('content')
    
    <form action="{{route('admin.customize_inquire.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-8 p-1">
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
                                                            <td>{{ $customize_inquire->first_name }}&nbsp;{{ $customize_inquire->last_name }}</td>                                                         
                                                        </tr>                                                                                                             
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Email</td>
                                                            <td>{{ $customize_inquire->email }}</td>                                                         
                                                        </tr>
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Phone Number:</td>
                                                            <td>{{ $customize_inquire->phone_number }}</td>                                                         
                                                        </tr>
                                                        <tr>
                                                            <td width="25%" style="font-weight: 600;">Address:</td>
                                                            <td>{{ $customize_inquire->address }}</td>                                                         
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row mt-1 pe-0">
                                            <div class="col-7">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" style="font-weight: 600;">Activities:</td>
                                                            <td>{{ $customize_inquire->activities }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Location:</td>
                                                            <td>{{ $customize_inquire->location }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Accommodation:</td>
                                                            <td>{{ $customize_inquire->accommodation }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-5">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>                                                      
                                                        <tr>
                                                            <td style="font-weight: 600;">Date of Start:</td>
                                                            <td>{{ $customize_inquire->date_of_start }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Number of Dates:</td>
                                                            <td>{{ $customize_inquire->number_of_dates }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Budget:</td>
                                                            <td>{{ $customize_inquire->budget }}</td>
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

            <div class="col-md-4 px-2 pt-1">
                
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Seen" {{ $customize_inquire->status == 'Seen' ? "selected" : "" }}>Seen</option>   
                                    <option value="Pending" {{ $customize_inquire->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $customize_inquire->id }}"/>
                                <a href="{{route('admin.customize_inquire.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
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
