@extends('backend.layouts.app')

@section('title', __('Edit Package'))

@section('content')

<link rel="stylesheet" href="{{url('css/vendors.css')}}">

<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>


    <form action="{{route('admin.package.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
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
                            <label>Description</label>
                            <textarea class="form-control" id="editor" name="description" rows="4">{{ $package->description }}</textarea>
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
                <div class="text-right">
                    <input type="hidden" name="hidden_id" value="{{ $package->id }}"/>
                    <a href="{{route('admin.package.index')}}" class="btn rounded-pill px-4 py-2 me-2 btn-info">Back</a>
                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success">Update</button><br>
                </div>
            </div><br>
            
            

        </div>

    </form>


<br><br>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>

@endsection
