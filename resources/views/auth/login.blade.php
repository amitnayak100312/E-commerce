
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* --- GENERAL STYLES --- */
        body { font-family: 'Poppins', sans-serif; margin: 0; padding: 0; background-color: #f9f9f9; }
        
        /* --- HEADER / NAVBAR STYLES --- */
        .header_section {
            background-color: #85c5e5; /* Light Blue Theme Color */
            padding: 15px 0;
            width: 100%;
            position: absolute; /* Sits on top of the black background */
            top: 0;
            left: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 24px;
            color: #fff; /* White text for contrast */
            text-decoration: none;
            text-transform: uppercase;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            gap: 25px;
            margin: 0;
            padding: 0;
        }

        .navbar-nav a {
            color: #fff;
            text-decoration: none;
            font-size: 15px;
            text-transform: uppercase;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar-nav a:hover {
            color: #333; /* Darken on hover */
        }

        /* --- AUTH SECTION --- */
        .auth-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #000; 
            padding: 20px;
            padding-top: 80px; 
        }

        .form-container {
            background: #fff;
            width: 100%;
            max-width: 450px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            position: relative;
        }

        /* --- TOGGLE BUTTONS --- */
        .button-box {
            width: 220px;
            margin: 0 auto 30px auto;
            position: relative;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            border-radius: 30px;
            display: flex;
            background: #f1f1f1;
            overflow: hidden; /* Ensures rounded corners */
        }

        .toggle-btn {
            padding: 12px 0;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
            flex: 1;
            font-weight: 600;
            color: #555;
            text-decoration: none;
            text-align: center;
            display: block;
            z-index: 1;
            transition: color 0.5s;
        }

        .active-text { color: #fff; }

        #btn-highlight {
            position: absolute;
            top: 0;
            left: 0; 
            width: 50%; /* Exactly half width */
            height: 100%;
            background: #f7444e; /* Pink/Red Accent */
            border-radius: 30px;
            transition: .5s;
        }

        /* --- FORM ELEMENTS --- */
        h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #000;
            font-weight: 700;
        }

        .input-field {
            width: 100%;
            padding: 14px 15px; /* Slightly bigger padding for modern look */
            margin: 10px 0;
            border: 1px solid #eee;
            border-radius: 5px;
            outline: none;
            background: #f0f4f7; /* Slight blue-grey tint */
            font-size: 14px;
            box-sizing: border-box; /* Fixes padding issues */
        }
        
        .input-field:focus {
            border-color: #85c5e5;
            background: #fff;
        }

        .text-danger { color: #f7444e; font-size: 12px; margin-top: -5px; margin-bottom: 10px; display: block; }

        .submit-btn {
            width: 100%;
            padding: 14px;
            display: block;
            margin-top: 25px;
            background: #f7444e;
            color: #fff;
            border: none;
            outline: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            text-transform: uppercase;
            transition: 0.3s;
            box-shadow: 0 4px 6px rgba(247, 68, 78, 0.2);
        }
        
        .submit-btn:hover { background: #d63a43; transform: translateY(-2px); }
        
        .form-footer { text-align: center; margin-top: 25px; font-size: 14px; }
        .form-footer a { color: #85c5e5; text-decoration: none; font-weight: 600; }
        .form-footer a:hover { color: #f7444e; }
        
        .terms { font-size: 13px; color: #666; display: flex; align-items: center; margin-top: 15px; }
        .check-box { margin-right: 10px; accent-color: #f7444e; }
    </style>
    
     <header class="header_section">
        <nav class="navbar">
            <a href="{{ url('/') }}" class="navbar-brand">GIFTOS</a>
            <ul class="navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('viewallproducts') }}">Shop</a></li>
                <li><a href="#">Why Us</a></li>
                <li><a href="#">Testimonial</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="auth-wrapper">
        <div class="form-container">
            <div class="button-box">
                <div id="btn-highlight"></div>
                <span class="toggle-btn active-text">Log In</span>
                <a href="{{ route('register') }}" class="toggle-btn">Register</a>
            </div>

            <h3>Welcome Back</h3>
            

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="email" name="email" class="input-field" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <input type="password" name="password" class="input-field" placeholder="Password" required autocomplete="current-password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                
                <div class="terms">
                    <input type="checkbox" id="remember_me" name="remember" class="check-box">
                    <label for="remember_me">Remember Password</label>
                </div>
                
                <button type="submit" class="submit-btn">Log In</button>
                
                <div class="form-footer">
                    @if (Route::has('password.request'))
                        <p><a href="{{ route('password.request') }}">Forgot Password?</a></p>
                    @endif
                </div>
            </form>
        </div>
    </div>
