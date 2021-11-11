@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/solo_package.css') }}" rel="stylesheet">
@endpush

@section('content')

    <!-- <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>{{$package->name}}</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <img src="{{url( uploaded_asset($package->image) )}}" width="95%" />
            </div>
            <div class="col-6">
                <p>{{$package->description}}</p>
                <p>USD {{$package->price}}</p>
                <div class="mt-5 text-center">
                    <input type="hidden" name="hidden_id" value="{{ $package->id }}"/>
                    <button type="button" data-toggle="modal" data-target="#inquire" class="btn text-dark px-4 py-2 me-2 btn-light border-dark">Inquire Now</button>
                    <button type="button"  data-toggle="modal" data-target="#paynow" class="btn text-light px-4 py-2 me-2 btn-success ml-5" >Pay Now</button>
                </div>
            </div>
        </div>
    </div> -->


    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <img src="{{url( uploaded_asset($package->image) )}}" class="img-fluid w-100" style="object-fit: cover; height: 40rem; "/>
            </div>

            <div class="col-6 ps-5">
                <h3 class="fw-bolder" style="color: #E84C4C">{{$package->name}}</h3>
                <p>{{ $package->days }} Days &nbsp;&nbsp; {{ $package->night }} Nights</p>


                <div class="my-4">
                    <h5 class="mb-3">What's Included</h5>

                    <ul class="included">
                        <li>Double room in 3* beach hotel</li>
                        <li>Daily Breakfast and Dinner</li>
                        <li>Return Speedboat Transfers</li>
                        <li>Sea water swimming pool</li>
                        <li>Snorkeling by Dhoni</li>
                        <li>Kayaking</li>
                    </ul>
                </div>


                <div class="mb-4">
                    <h5 class="mb-3">Description / Additional Note</h5>
                    <div class="ms-4" style="color: rgb(0, 0, 0, 0.6); font-size: 0.8rem;">{!! $package->description !!}</div>
                </div>

                <div>
                    <h3 class="mb-4" style="color: #059F05">USD {{$package->price}}</h3>

                    <div class="row">
                        <div class="col-6">
                            <button class="inquire">INQUIRE</button>
                        </div>

                        <div class="col-6">
                            <button class="pay">PAY NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

    <div class="modal fade" id="inquire" tabindex="-1" aria-labelledby="inquireLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <form action="{{route('frontend.solo_package.inquire')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="modal-header text-white" style="background-color: #1D5001;">
                  <h5 class="modal-title" id="inquire-modal">Send an Inquire</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                      <label for="product-name" class="form-label">Package</label>
                      <input type="text" class="form-control" aria-describedby="product-name" value="{{$package->name}}" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <div class="mb-2">
                      <label for="last-name" class="form-label">Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="last_name" required>
                    </div>
                    <div class="mb-2">
                      <label for="contact-number" class="form-label">Contact Number <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="contact_number" required>
                    </div>
                    <div class="mb-2">
                      <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-2">
                      <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="mb-2">
                      <label for="nationality" class="form-label">Nationality <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="nationality" required>
                    </div>
                    <div class="mb-2">
                        <label>Airlines <span class="text-danger">*</span></label>
                        <select class="form-control custom-select" name="airlines" required>
                            <option value="" disabled selected>--select--</option>   
                            <option value="3 star">Economy Class</option>   
                            <option value="4 star">Premium Economy</option> 
                            <option value="5 star" >Business Class</option>                               
                            <option value="5 star" >First Class</option>                               
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Hotels <span class="text-danger">*</span></label>
                        <select class="form-control custom-select" name="hotels" required>
                            <option value="" disabled selected>--select--</option>   
                            <option value="3 star">3 Star</option>   
                            <option value="4 star">4 Star</option> 
                            <option value="5 star" >5 Star</option>                                   
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="message" class="form-label">Meals <span class="text-danger">*</span></label>
                      <textarea class="form-control" name="meals" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="message" class="form-label">Special Requirements <span class="text-danger">*</span></label>
                      <textarea class="form-control" name="special_requirements" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="mb-4">
                      <label for="budget" class="form-label">Your approximate budget per person <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="budget" required>
                    </div>

                    <div class="col-12 col-md-10 text-center">
                      <div class="g-recaptcha" data-callback="checked" data-sitekey="6LeOXiIdAAAAAAtOX6c-efU85FnTw6A5lKSItA1s" style="display: inline-block;"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <input type="hidden" class="form-control" name="package" aria-describedby="product-name" value="{{$package->id}}">
                  <button type="button" class="btn" data-dismiss="modal" style="color: #68AE42;">Cancel</button>
                  <input type="submit" class="inquire btn text-white px-5" style="background-color: #68AE42;" value="Send" disabled/>
                </div>
            </form>  
          </div>
        </div>
      </div>


      <div class="modal fade" id="paynow" tabindex="-1" aria-labelledby="inquireLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <form action="{{route('frontend.solo_package.pay')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="modal-header text-white" style="background-color: #1D5001;">
                  <h5 class="modal-title" id="inquire-modal">Pay Now</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                      <label for="product-name" class="form-label">Package</label>
                      <input type="text" class="form-control" aria-describedby="product-name" value="{{$package->name}}" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <div class="mb-2">
                      <label for="last-name" class="form-label">Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="last_name" required>
                    </div>
                    <div class="mb-2">
                      <label for="contact-number" class="form-label">Contact Number <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="contact_number" required>
                    </div>
                    <div class="mb-2">
                      <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-2">
                      <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="mb-2">
                        <label>Payment Method <span class="text-danger">*</span></label>
                        <select class="form-control custom-select" name="payment_method" required>
                            <option value="" disabled selected>--select--</option>   
                            <option value="Online">Online</option>   
                            <option value="Pay upon Arrival">Pay upon Arrival</option>                              
                        </select>
                    </div>
                    <div class="mb-2">
                      <label for="budget" class="form-label">Price <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="price" required>
                    </div>
                    <div class="mb-2">
                      <label for="budget" class="form-label">Total <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="total" required>
                    </div>
                    <div class="mb-4">
                      <label for="budget" class="form-label">Sub Total <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="sub_total" required>
                    </div>

                    <div class="col-12 col-md-10 text-center">
                      <div class="g-recaptcha" data-callback="checkedtwo" data-sitekey="6LeOXiIdAAAAAAtOX6c-efU85FnTw6A5lKSItA1s" style="display: inline-block;"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <input type="hidden" class="form-control" name="package" aria-describedby="product-name" value="{{$package->id}}">
                  <button type="button" class="btn" data-dismiss="modal" style="color: #68AE42;">Cancel</button>
                  <input type="submit" class="pay btn text-white px-5" style="background-color: #68AE42;" value="Pay Now" disabled/>
                </div>
            </form>  
          </div>
        </div>
      </div>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <script>
      function checked() {
      $('.inquire').removeAttr('disabled');
  };
  </script>

<script>
      function checkedtwo() {
      $('.pay').removeAttr('disabled');
  };
  </script>

@endsection
