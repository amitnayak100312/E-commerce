@extends('maindesign')

@section('products')
    <div class="container">

        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <a href="{{route('product_details', $product->id) }}">
                            <div class="img-box">
                                <img src="{{asset('products/' . $product->product_image)}}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    {{$product->product_title }}
                                </h6>
                                <h6>
                                    Price
                                    <span>
                                        ${{ $product->product_price }}
                                    </span>
                                </h6>
                            </div>
                        </a>
                        
                         <center>
              <a href="{{ route('add_to_cart', $product->id)}}" type="submit" class="btn btn-outline-primary btn-sm ">
                <i class="fas fa-shopping-cart me-2"></i> Add to Cart
              </a>
              
              <a href="{{ route('stripe',$product->product_price) }}" type="submit" class="btn btn-outline-primary btn-sm" >
                <i class="fas fa-shopping-cart me-2"></i>pay now
              </a>
            </center>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="{{route('index') }}">
                View Lastest Products
            </a>
        </div>
    </div>
@endsection