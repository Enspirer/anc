@extends('backend.layouts.app')

@section('title', __('Create Package'))

@section('content')


<link rel="stylesheet" href="{{url('css/vendors.css')}}">


    <form action="{{route('admin.package.store')}}" method="post" enctype="multipart/form-data" >
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Category <span class="text-danger">*<span></label>
                            <select class="form-control" name="category" required>
                                <option value="" selected disabled>-- select --</option>   
                                <option value="Inbound">Inbound</option>   
                                <option value="Outbound">Outbound</option>                                   
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" rows="4" required></textarea>
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
                                <input type="hidden" name="image" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label>Days</label>
                            <input type="text" class="form-control" name="days">
                        </div>

                        <div class="form-group">
                            <label>Night</label>
                            <input type="text" class="form-control" name="night">
                        </div>

                        <div class="form-group">
                            <label>Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="price" required>
                        </div>

                        <div class="form-group">
                            <label>Status <span class="text-danger">*<span></label>
                            <select class="form-control" name="status" required>
                                <option value="Approved">Approve</option>   
                                <option value="Disapproved">Disapprove</option>                                
                                <option value="Pending">Pending</option>                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Order <span class="text-danger">*<span></label>
                            <input type="number" class="form-control" name="order" required>
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
                                        <div class="input-group mt-3 mb-3">
                                            
                                            <input type="text" name="attribute_name[]" class="form-control m-input" autocomplete="off" required>
                                            
                                            <div class="input-group-append">                
                                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>

                                                            
                            </div>                           
                            
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success" value="Create New" /><br>
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
            html += '<input type="text" name="attribute_name[]" class="form-control m-input" autocomplete="off" required>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

    
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>


@endsection
