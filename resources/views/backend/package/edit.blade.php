@extends('backend.layouts.app')

@section('title', __('Edit Package'))

@section('content')

<link rel="stylesheet" href="{{url('css/vendors.css')}}">

<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>


    <form action="{{route('admin.package.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ $package->name }}" required>
                        </div>

                        <div class="form-group">
                            <label>Category <span class="text-danger">*<span></label>
                            <select class="form-control" name="category" required>
                                <option value="Inbound" {{ $package->category == 'Inbound' ? "selected" : "" }}>Inbound</option>   
                                <option value="Outbound" {{ $package->category == 'Outbound' ? "selected" : "" }}>Outbound</option>                                   
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" rows="4" required>{{ $package->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="image" value="{{ $package->image }}" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Days</label>
                            <input type="text" class="form-control" name="days" value="{{ $package->days }}">
                        </div>

                        <div class="form-group">
                            <label>Night</label>
                            <input type="text" class="form-control" name="night" value="{{ $package->night }}">
                        </div>

                        <div class="form-group">
                            <label>Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ $package->price }}" name="price" required>
                        </div>
                                                 
                        <div class="form-group">
                            <label>Status <span class="text-danger">*<span></label>
                            <select class="form-control" name="status" required>
                                <option value="Approved" {{ $package->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                <option value="Disapproved" {{ $package->status == 'Disapproved' ? "selected" : "" }}>Disapprove</option>                                
                                <option value="Pending" {{ $package->status == 'Pending' ? "selected" : "" }}>Pending</option>                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Order <span class="text-danger">*<span></label>
                            <input type="number" class="form-control" value="{{ $package->order }}" name="order" required>
                        </div>                 
                        
                    </div>
                </div>                
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                                    
                            <div class="form-group">
                                <label>What's Included <span class="text-danger">*<span></label>

                                    <div id="inputFormRow">
                                        @foreach(json_decode($package->points) as $key => $pack)
                                            <div class="input-group mt-3 mb-3">
                                                
                                                <input type="text" name="attribute_name[]" value="{{$pack->name}}" class="form-control m-input" autocomplete="off" required>
                                                
                                                <div class="input-group-append">                
                                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                                                            
                            </div>                           
                            
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $package->id }}"/>
                    <a href="{{route('admin.package.index')}}" class="btn rounded-pill px-4 py-2 me-2 btn-info">Back</a>
                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success">Update</button><br>
                </div>
            </div> 
            
            <br>         
            
        </div>

    </form>

<br><br>

    <script type="text/javascript">
        
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="attribute_name[]" class="form-control m-input" placeholder="Name" autocomplete="off" required>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        
        $(document).on('click', '#removeRow', function () {
            // $(this).closest('#inputFormRow').remove();
            $(this).parents('.input-group').remove();
        });
        
        
    </script>


@endsection
