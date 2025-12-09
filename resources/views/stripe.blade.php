@extends('maindesign')
@section('stripe_view')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-5">
                <h3 class="card-header p-3">Card Details</h3>
                <div class="card-body">

                    @session('success')
                        <div class="alert alert-success" role="alert"> 
                            {{ $value }}
                        </div>
                    @endsession
          
                    <form id='checkout-form' method='post' action="{{ route('stripe.post') }}">   
                        @csrf    

                        <strong>Name:</strong>
                        <input type="input" class="form-control" name="name" placeholder="Enter Your Name" required>
                        <strong>Phone:</strong>
                        <input type="input" class="form-control" name="receiver_contact_num" placeholder="Enter Your Phone Number" required>
                        <strong>Address:</strong>
                        <input type="input" class="form-control" name="receiver_address" placeholder="Enter Your Address" required>

                        <input type='hidden' name='stripeToken' id='stripe-token-id'>                              
                        <br>
                        <div id="card-element" class="form-control" ></div>
                        <button 
                            id='pay-btn'
                            class="btn btn-success mt-3"
                            type="button"
                            style="margin-top: 20px; width: 100%;padding: 7px;"
                            onclick="createToken()">PAY ₹{{$price}}
                        </button>
                    <form>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
 
