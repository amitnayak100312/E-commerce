<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Custom CSS to enhance Bootstrap */
        .product-image-container {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .main-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .main-image:hover {
            transform: scale(1.05);
        }

        .thumbnail-container {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            cursor: pointer;
            opacity: 0.6;
            border: 2px solid transparent;
            transition: all 0.2s;
        }

        .thumbnail.active, .thumbnail:hover {
            opacity: 1;
            border-color: #0d6efd; /* Bootstrap Primary Color */
        }

        .price-tag {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
        }

        .old-price {
            text-decoration: line-through;
            color: #7f8c8d;
            font-size: 1.2rem;
            margin-left: 10px;
        }

        .size-btn {
            min-width: 45px;
        }

        .quantity-input {
            max-width: 60px;
            text-align: center;
        }

        /* Tabs Styling */
        .nav-tabs .nav-link {
            color: #495057;
            font-weight: 600;
        }
        .nav-tabs .nav-link.active {
            color: #0d6efd;
            border-bottom: 3px solid #0d6efd;
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Men's Wear</a></li>
                <li class="breadcrumb-item active" aria-current="page">Classic Denim Jacket</li>
            </ol>
        </nav>
    </div>

    <section class="container my-5">
        <div class="row">
            
            <div class="col-md-6 mb-4">
                <div class="product-image-container mb-3">
                    <img id="mainImage" src="" class="main-image" alt="Product Image">
                </div>
                
                <div class="thumbnail-container">
                    <img onclick="changeImage(this)" src="" class="thumbnail active" alt="View 1">
                    <img onclick="changeImage(this)" src="" class="thumbnail" alt="View 2">
                    <img onclick="changeImage(this)" src="" class="thumbnail" alt="View 3">
                </div>
            </div>

            <div class="col-md-6">
                <h6 class="text-muted text-uppercase"></h6>
                <h1 class="display-6 fw-bold"></h1>
                
                <div class="mb-3">
                    <span class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </span>
                    <small class="text-muted ms-2">(124 Reviews)</small>
                </div>

                <div class="mb-4">
                    <span class="price-tag"></span>
                    <span class="old-price">$120.00</span>
                    <span class="badge bg-danger ms-2">25% OFF</span>
                </div>

                <p class="lead mb-4">
                   
                </p>

                <div class="mb-4">
                    <label class="fw-bold mb-2 d-block">Select Size</label>
                    <div class="btn-group" role="group" aria-label="Size selection">
                        <input type="radio" class="btn-check" name="size" id="sizeS" autocomplete="off">
                        <label class="btn btn-outline-dark size-btn" for="sizeS">S</label>

                        <input type="radio" class="btn-check" name="size" id="sizeM" autocomplete="off" checked>
                        <label class="btn btn-outline-dark size-btn" for="sizeM">M</label>

                        <input type="radio" class="btn-check" name="size" id="sizeL" autocomplete="off">
                        <label class="btn btn-outline-dark size-btn" for="sizeL">L</label>

                        <input type="radio" class="btn-check" name="size" id="sizeXL" autocomplete="off">
                        <label class="btn btn-outline-dark size-btn" for="sizeXL">XL</label>
                    </div>
                </div>

                <div class="row align-items-end mb-4">
                    <div class="col-auto">
                        <label class="fw-bold mb-2">Quantity</label>
                        <div class="input-group">
                            <button class="btn btn-outline-secondary" type="button" onclick="decrementValue()">-</button>
                            <input type="text" class="form-control quantity-input" id="quantity" value="1" readonly>
                            <button class="btn btn-outline-secondary" type="button" onclick="incrementValue()">+</button>
                        </div>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary btn-lg w-100 shadow-sm">
                            <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-danger btn-lg" data-bs-toggle="tooltip" title="Add to Wishlist">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <div class="d-flex gap-4 text-muted small">
                    <div><i class="fas fa-truck me-2"></i>Free Delivery</div>
                    <div><i class="fas fa-undo me-2"></i>30 Days Return</div>
                    <div><i class="fas fa-shield-alt me-2"></i>2 Year Warranty</div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button">Specifications</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content p-4 border border-top-0 bg-white" id="myTabContent">
                    <div class="tab-pane fade show active" id="desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div class="tab-pane fade" id="specs">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">Material</th>
                                    <td>100% Cotton</td>
                                </tr>
                                <tr>
                                    <th scope="row">Weight</th>
                                    <td>0.5 kg</td>
                                </tr>
                                <tr>
                                    <th scope="row">Origin</th>
                                    <td>Made in USA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="reviews">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://ui-avatars.com/api/?name=John+Doe" class="rounded-circle me-3" width="50" alt="User">
                            <div>
                                <h6 class="mb-0">John Doe</h6>
                                <span class="text-warning small"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                        <p class="text-muted">"Excellent quality! Fits perfectly and looks exactly like the pictures."</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Image Gallery Script
        function changeImage(element) {
            document.getElementById('mainImage').src = element.src;
            
            // Remove active class from all thumbnails
            let thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            
            // Add active class to clicked thumbnail
            element.classList.add('active');
        }

        // Quantity Counter Script
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
</body>
</html>