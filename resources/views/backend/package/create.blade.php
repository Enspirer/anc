@extends('backend.layouts.app')

@section('title', __('Create Package'))

@section('content')


<link rel="stylesheet" href="{{url('css/vendors.css')}}">


    <form action="{{route('admin.package.store')}}" method="post" enctype="multipart/form-data" >
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="price" required>
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
                <div class="text-right">
                    <input type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success" value="Create New" /><br>
                </div>
            </div><br>       
            
        </div>

    </form>


<br><br>


@endsection
