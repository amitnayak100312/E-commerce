<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="front_end/images/favicon.png" type="image/x-icon">

  <title>Giftos | Modern Dark</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;700;800&display=swap"
    rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <link rel="stylesheet" type="text/css" href="front_end/css/bootstrap.css" />

  <link href="front_end/css/style.css" rel="stylesheet" />
  <link href="front_end/css/responsive.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
  <style>
        #card-element{
            height: 50px;
            padding-top: 16px;
        }
  
    
    /* --- THEME VARIABLES --- */
    :root {
      --nav-blue: #87ceeb;
      /* Sky Blue */
      --btn-pink: #e11d48;
      /* Pink/Red Accent */
      --hero-black: #050505;
      /* Pure Black */
      --card-dark: #111827;
      /* Dark Gray for cards */
      --text-subtle: #1e3a8a;
      --text-bright: #3b82f6;
      --font-heading: 'Outfit', sans-serif;
      --font-body: 'Inter', sans-serif;
    }

    body {
      font-family: var(--font-body);
      background-color: #f8f9fa;
      color: #333;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    .navbar-brand {
      font-family: var(--font-heading);
    }

    /* --- COMMON COMPONENTS --- */
    .heading_container {
      margin-bottom: 45px;
    }

    .heading_container h2 {
      font-weight: 700;
      text-transform: uppercase;
      margin-bottom: 10px;
    }

    .heading_container.heading_center {
      text-align: center;
    }

    /* --- 1. HEADER --- */
    .header_wrapper {
      background: white;
      border-radius: 0 0 30px 30px;
      padding-bottom: 20px;
      position: relative;
      z-index: 100;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .brand_box {
      text-align: center;
      padding: 15px 0;
    }

    .brand_box span {
      color: #1e293b;
      font-size: 28px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .custom_nav_bar {
      background-color: var(--nav-blue);
      border-radius: 50px;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1100px;
      margin: 0 auto;
    }

    .custom_nav_links {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .nav_link_item {
      color: #475569;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 13px;
      padding: 8px 18px;
      border-radius: 20px;
      text-decoration: none;
      transition: 0.3s;
    }

    .nav_link_item.active {
      background-color: white;
      color: black;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .nav_link_item:hover {
      color: black;
      text-decoration: none;
    }

    .user_actions {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .user_actions a {
      color: #1e293b;
      font-weight: 700;
      font-size: 14px;
      text-decoration: none;
    }

    .icon_btn {
      font-size: 16px;
      color: #1e293b;
    }

    /* Mobile Menu */
    .navbar-toggler {
      display: none;
    }

    @media (max-width: 991px) {
      .custom_nav_bar {
        border-radius: 10px;
        flex-direction: column;
        gap: 10px;
      }

      .custom_nav_links {
        flex-wrap: wrap;
        justify-content: center;
      }

      .header_wrapper {
        border-radius: 0;
      }
    }

    /* --- 2. HERO SECTION --- */
    .hero_area {
      background-color: var(--hero-black);
      padding: 80px 0 100px 0;
      margin-top: -30px;
      padding-top: 60px;
      border-radius: 0 0 20px 20px;
      color: white;
    }

    .hero_content {
      padding-top: 40px;
    }

    .hero_content h1 {
      font-size: 4rem;
      line-height: 1.1;
      margin-bottom: 20px;
    }

    .text-dark-blue {
      color: #e2e8f0;
      /* Lightened for black bg */
      display: block;
      font-weight: 800;
    }

    .text-bright-blue {
      color: var(--text-bright);
      display: block;
      font-weight: 700;
    }

    .hero_content p {
      color: #9ca3af;
      font-size: 16px;
      max-width: 500px;
      margin-bottom: 30px;
    }

    .btn-explore {
      background-color: var(--btn-pink);
      color: white;
      padding: 12px 30px;
      border-radius: 8px;
      font-weight: 700;
      text-transform: uppercase;
      border: none;
      letter-spacing: 0.5px;
      transition: 0.3s;
      text-decoration: none;
      display: inline-block;
    }

    .btn-explore:hover {
      background-color: #be123c;
      color: white;
    }

    .hero_img_container {
      text-align: right;
    }

    .hero_img_container img {
      border-radius: 20px;
      max-width: 100%;
      box-shadow: 0 0 30px rgba(59, 130, 246, 0.3);
    }

    /* --- 3. WHY US SECTION (New Dark Theme) --- */
    .why_section {
      background-color: var(--hero-black);
      padding: 90px 0;
      color: white;
      margin-top: 0;
    }

    .why_card {
      background: var(--card-dark);
      padding: 35px 25px;
      text-align: center;
      border-radius: 15px;
      border: 1px solid #333;
      transition: 0.3s;
      height: 100%;
    }

    .why_card:hover {
      transform: translateY(-10px);
      border-color: var(--text-bright);
      box-shadow: 0 10px 30px rgba(59, 130, 246, 0.15);
    }

    .why_icon_box {
      width: 70px;
      height: 70px;
      background: rgba(225, 29, 72, 0.1);
      /* Pink tint */
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 20px auto;
    }

    .why_icon_box i {
      font-size: 28px;
      color: var(--btn-pink);
    }

    .why_card h5 {
      font-weight: 700;
      margin-bottom: 10px;
      letter-spacing: 0.5px;
    }

    .why_card p {
      color: #9ca3af;
      font-size: 14px;
      line-height: 1.6;
      margin: 0;
    }

    /* --- 4. TESTIMONIAL SECTION --- */
    .client_section {
      padding: 90px 0;
      background: #f8f9fa;
    }

    .client_container {
      margin-top: 30px;
    }

    .client_box {
      background: white;
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      display: flex;
      align-items: center;
      gap: 20px;
      margin: 10px;
    }

    .client_id img {
      width: 80px !important;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--nav-blue);
    }

    .client_detail h5 {
      font-weight: 700;
      color: #1e293b;
      margin-bottom: 5px;
    }

    .client_detail p {
      font-size: 14px;
      color: #64748b;
      font-style: italic;
    }

    /* --- 5. CONTACT SECTION --- */
    .contact_section {
      padding: 80px 0;
      background: #f1f5f9;
    }

    .compact-contact-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      max-width: 900px;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
    }

    .contact-side-info {
      background: #1e293b;
      color: white;
      padding: 40px;
      width: 40%;
    }

    .contact-side-form {
      padding: 40px;
      width: 60%;
    }

    .contact_form input,
    .contact_form textarea {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      padding: 10px;
      width: 100%;
      margin-bottom: 15px;
    }

    .contact_form button {
      background: var(--btn-pink);
      color: white;
      border: none;
      padding: 10px 25px;
      border-radius: 6px;
      font-weight: 700;
      width: 100%;
    }

    /* --- 6. FOOTER --- */
    .info_section {
      background: #111827;
      color: white;
      padding: 60px 0 20px 0;
    }

    .info_container h6 {
      color: var(--nav-blue);
      font-weight: 700;
      margin-bottom: 20px;
      text-transform: uppercase;
      font-size: 14px;
      letter-spacing: 1px;
    }

    .social_box a {
      display: inline-block;
      margin-right: 15px;
      color: white;
      font-size: 20px;
      transition: 0.3s;
    }

    .social_box a:hover {
      color: var(--btn-pink);
    }

    .footer_section {
      margin-top: 40px;
      border-top: 1px solid #1f2937;
      padding-top: 20px;
    }

    .footer_section p {
      color: #6b7280;
      font-size: 14px;
    }
  </style>
</head>

<body>

  <div class="header_wrapper">
    <div class="container">
      <div class="brand_box">
        <a href="" style="text-decoration:none;">
          <span>GIFTOS</span>
          
    <img src="font_end/images/logo.png" alt="">
          
        </a>
      </div>

      <div class="custom_nav_bar">
        <div class="custom_nav_links">
          <a href="./" class="nav_link_item">HOME</a>
          <a href="{{route('viewallproducts')}}" class="nav_link_item">SHOP</a>
        </div>

        <div class="user_actions">
          @if(Auth::check())
            <a href="{{ route('myorders') }}">My Order</a>
          @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Sign Up</a>
          @endif
          <a href="{{ route('cartproducts') }}" class="icon_btn position-relative">

            <i class="fa fa-shopping-bag"></i>

            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              {{ $count }}
            </span>

          </a>
          <a href="#" class="icon_btn"><i class="fa fa-search"></i></a>
        </div>
      </div>
    </div>
  </div>

  <section class="hero_area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 hero_content">
          <h1>
            <span class="text-dark-blue">Modern Gifts</span>
            <span class="text-bright-blue">Timeless Joy</span>
          </h1>
          <p>
            Discover a curated collection designed for the modern lifestyle. Unique items, elegantly packaged, delivered
            with care.
          </p>
          <a href="" class="btn-explore">
            EXPLORE NOW
          </a>
        </div>
        <div class="col-md-6 hero_img_container">
          <img src="front_end/images/image3.jpeg" alt="Modern Shopping Cart" />
        </div>
      </div>
    </div>
  </section>
  <!-- shop section -->
  <!-- end shop section -->
  <section class="shop_section layout_padding">
    @yield('index')
    @yield('products')
    @yield('viewcartproducts')
    @yield('stripe_view')
  </section>
  <!-- contact section -->

  <section class="why_section">
    <div class="container">
      <div class="heading_container heading_center">
        <h2 style="color: white;">Why Choose Us</h2>
        <p style="color: #6b7280;">Experience the difference in every package</p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="why_card">
            <div class="why_icon_box">
              <i class="fa fa-truck" aria-hidden="true"></i>
            </div>
            <h5>Fast Delivery</h5>
            <p>Reliable shipping that ensures your gifts arrive on time, every time.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="why_card">
            <div class="why_icon_box">
              <i class="fa fa-gift" aria-hidden="true"></i>
            </div>
            <h5>Free Shipping</h5>
            <p>Enjoy complimentary shipping on all orders over $50. No hidden fees.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="why_card">
            <div class="why_icon_box">
              <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <h5>Best Quality</h5>
            <p>We source only the finest products to ensure premium quality gifts.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="contact_section">
    <div class="container">
      <div class="compact-contact-card">
        <div class="contact-side-info">
          <h3>Get in Touch</h3>
          <p style="opacity:0.8; font-size:14px; margin-bottom:20px;">
            We are here to help you find the perfect gift.
          </p>
          <div class="mb-3"><i class="fa fa-map-marker mr-2"></i> 102 Main Street, NY</div>
          <div class="mb-3"><i class="fa fa-phone mr-2"></i> +01 1234567890</div>
          <div class="map-responsive mt-4" style="height: 150px; border-radius:10px; opacity:0.8;">
            <iframe
              src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
              width="100%" height="100%" frameborder="0" style="border:0; filter: invert(90%);"
              allowfullscreen></iframe>
          </div>
        </div>
        <div class="contact-side-form">
          <h4 style="margin-bottom:20px; color:#1e293b;">Send Message</h4>
          <form action="#" class="contact_form">
            <input type="text" placeholder="Name" />
            <input type="email" placeholder="Email" />
            <input type="text" placeholder="Phone" />
            <input type="text" class="message-box" placeholder="Message" style="height:80px;" />
            <button>SEND NOW</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="info_section">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6>ABOUT US</h6>
          <p style="color:#9ca3af; font-size:13px;">Modern gifting solutions for every occasion. We prioritize quality
            and customer satisfaction.</p>
        </div>
        <div class="col-md-3">
          <h6>LINKS</h6>
          <ul style="list-style:none; padding:0; color:#9ca3af; font-size:13px;">
            <li class="mb-2"><a href="#" style="color:#9ca3af;">Home</a></li>
            <li class="mb-2"><a href="#" style="color:#9ca3af;">Shop</a></li>
            <li class="mb-2"><a href="#" style="color:#9ca3af;">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>FOLLOW US</h6>
          <div class="social_box">
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="col-md-3">
          <h6>NEWSLETTER</h6>
          <form action="#">
            <input type="email" placeholder="Enter email"
              style="width:100%; background:#1f2937; border:none; padding:8px; color:white; border-radius:4px; margin-bottom:10px;">
            <button
              style="background:var(--nav-blue); border:none; padding:5px 15px; border-radius:4px; font-weight:700;">SUBSCRIBE</button>
          </form>
        </div>
      </div>
    </div>

    <footer class="footer_section">
      <div class="container text-center">
        <p>
          © <span id="displayYear"></span> All Rights Reserved By
          <a href="#" style="color: var(--nav-blue);">AmitWithCoder</a>
        </p>
      </div>
    </footer>
  </section>
      
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
  
    var stripe = Stripe('{{ env('STRIPE_KEY') }}')
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');
  
    /*------------------------------------------
    --------------------------------------------
    Create Token Code
    --------------------------------------------
    --------------------------------------------*/
    function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {
   
            if(typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }
  
            /* creating token success */
            if(typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }
</script>
  <script src="/front_end/js/jquery-3.4.1.min.js"></script>
  <script src="front_end/js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="front_end/js/custom.js"></script>
</body>

</html>