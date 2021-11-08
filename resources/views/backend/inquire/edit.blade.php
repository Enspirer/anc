@extends('backend.layouts.app')

@section('title', __('View Inquire'))

@section('content')
    
    <form action="{{route('admin.inquire.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-12 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">

                            <div class="row">
                                        
                                <div class="row pe-0">
                                    <div class="col-12">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td width="20%" style="font-weight: 600; font-size:16px;">Package Name:</td>
                                                    <td style="font-size:16px;"> 
                                                        @if(App\Models\Package::where('id',$inquire->package_id)->first() == null)
                                                        <span class="badge badge-danger">Package Deleted</span>
                                                        @elseif(App\Models\Package::where('id',$inquire->package_id)->first()->status != 'Approved')                
                                                            <span class="badge badge-warning">{{ App\Models\Package::where('id',$inquire->package_id)->first()->name }} &nbsp; ( Package not Approved )</span>
                                                        @else
                                                            {{ App\Models\Package::where('id',$inquire->package_id)->first()->name }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Name:</td>
                                                    <td style="font-size:16px;">{{ $inquire->first_name }} {{ $inquire->last_name }}</td>
                                                </tr>                                                
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Contact Number:</td>
                                                    <td style="font-size:16px;">{{ $inquire->contact }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Email:</td>
                                                    <td style="font-size:16px;">{{ $inquire->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Address:</td>
                                                    <td style="font-size:16px;">{{ $inquire->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Nationality:</td>
                                                    <td style="font-size:16px;">{{ $inquire->nationality }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Airlines:</td>
                                                    <td style="font-size:16px;">{{ $inquire->airlines }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Approximate budget per person:</td>
                                                    <td style="font-size:16px;">{{ $inquire->budget }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Hotels:</td>
                                                    <td style="font-size:16px;">{{ $inquire->hotels }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Meals:</td>
                                                    <td style="font-size:16px;">{{ $inquire->meals }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Special Requirements:</td>
                                                    <td style="font-size:16px;">{{ $inquire->special_requirements }}</td>
                                                </tr>
                                            </tbody>                                            
                                        </table>
                                    </div>                                            
                                            
                                </div>
                            </div>                            

                            <div class="mt-5 text-right">
                                <input type="hidden" name="hidden_id" value="{{ $inquire->id }}"/>
                                <a href="{{route('admin.inquire.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                @if($inquire->status == 'Seen')
                                @else
                                <input type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success" value="Seen" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>






<br><br>
@endsection
