@extends('maindesign')
<base href="/public">
@section('index') 

@if(session('cart_msg'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-relative"  role="alert">
               {{ session('cart_msg') }}
    </div>
@endif

<style>
        .product-image-container {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .main-image {
            width: 100%;
            height:500px;
            object-fit: cover; /* Keeps image aspect ratio */
            transition: transform 0.3s ease;
        }
        .main-image:hover { transform: scale(1.05); }
        
        .thumbnail-container { display: flex; gap: 10px; margin-top: 15px; }
        .thumbnail {
            width: 80px; height: 80px; object-fit: cover;
            border-radius: 6px; cursor: pointer; opacity: 0.6;
            border: 2px solid transparent; transition: all 0.2s;
        }
        .thumbnail.active, .thumbnail:hover { opacity: 1; border-color: #0d6efd; }
        
        .price-tag { font-size: 2rem; font-weight: 700; color: #2c3e50; }
        .old-price { text-decoration: line-through; color: #7f8c8d; font-size: 1.2rem; margin-left: 10px; }
        
        /* Fix for quantity input */
        .quantity-input { max-width: 60px; text-align: center; }
    </style>

    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->product_title }}</li>
            </ol>
        </nav>
    </div>

    <section class="container my-5">
        <div class="row">
            
            <div class="col-md-6 mb-4">
                <div class="product-image-container mb-3">
                    <img id="mainImage" 
                         src="{{ asset('products/'.$product->product_image) }}" 
                         class="main-image" 
                         alt="{{ $product->product_title }}">
                </div>
                
                <div class="thumbnail-container">
                    <img onclick="changeImage(this)" src="{{ asset('products/'.$product->product_image) }}" class="thumbnail active">
                    </div>
            </div>

            <div class="col-md-6">
                <h6 class="text-muted text-uppercase">New Arrival</h6>
                <h1 class="display-6 fw-bold">{{ $product->product_title }}</h1>
                
                <div class="mb-3">
                    <span class="text-warning">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </span>
                    <small class="text-muted ms-2">(124 Reviews)</small>
                </div>

                <div class="mb-4">
                    <span class="price-tag">₹{{ $product->product_price }}</span>
                    <span class="old-price">₹{{ $product->product_price * 1.2 }}</span>
                    <span class="badge bg-danger ms-2">Sale</span>
                </div>

                <p class="lead mb-4">
                    {{ $product->product_description }}
                </p>

                <form action="#" method="POST">
                    @csrf
                    <div class="row align-items-end mb-4">
                        <div class="col-auto">
                            <label class="fw-bold mb-2">Quantity</label>
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="button" onclick="decrementValue()">-</button>
                                <input type="text" class="form-control quantity-input" id="quantity" name="quantity" value="1" readonly>
                                <button class="btn btn-outline-secondary" type="button" onclick="incrementValue()">+</button>
                            </div>
                        </div>
                        <div class="col">
                            <a href="{{ route('add_to_cart',$product->id)}}" type="submit" class="btn btn-primary btn-lg w-100 shadow-sm"> 
                                <i class="fas fa-shopping-cart me-2"></i> Add to Cart 
                        </a>
                        </div>
                    </div>
                </form>

                <div class="d-flex gap-4 text-muted small">
                    <div><i class="fas fa-truck me-2"></i> Free Delivery  </div>
                    <div><i class="fas fa-undo me-2"></i> 30 Days Return </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#desc">Description</button></li>
                    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button></li>
                </ul>
                <div class="tab-content p-4 border border-top-0 bg-white">
                    <div class="tab-pane fade show active" id="desc">
                        <p>
                    {{ $product->product_description }}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="reviews">
                        <p class="text-muted">No reviews yet.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function changeImage(element) {
            document.getElementById('mainImage').src = element.src;
            let thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            element.classList.add('active');
        }

        function incrementValue() {
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('quantity').value = value;
        }

        function decrementValue() {
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                document.getElementById('quantity').value = value;
            }
        }
    </script>

@endsection