<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up | EduCare</title>
    <link rel="stylesheet" href="css/stylee.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- NAVBAR CREATION -->
   <header class="header">
    <nav class="navbar">
        <a href="#">Home</a>
    </nav>
   
   </header>
    <!-- LOGIN FORM CREATION -->
    <div class="background"></div>
    <div class="container">
        <div class="item">
        <a href="#"><img src="img/logo.png" alt="" width="350px;" height="100px;"></a>
            <div class="text-item">
                <h2>Welcome! <br><span>
                    To Our Channel
                </span></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, repellendus?</p>
                <div class="social-icon">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-youtube'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </div>
        </div>
        <div class="login-section">
            <div class="form-box login">
            <form method="POST" action="{{ route('register') }}">
            @csrf
                    <h2>Sign Up</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <label>Username</label>
                        <br>
                        <label type="text" required {{ __('Name') }}></label>

                        <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <script>
                document.getElementById('name').value = '';
            </script>
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <label>Email Address</label>
                        <br>
                        <label type="email" required {{ __('Email Address') }}></label>

                        <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <script>
                document.getElementById('email').value = '';
            </script>
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <label>Password</label>
                        <br>
                        <label type="password" required {{ __('Password') }}></label>

<div class="col-md-6">
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <label>Confirmation Password</label>
                        <br>
                        <label type="password-confirm" required {{ __('Confirm Password') }}></label>

<div class="col-md-6">
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
                        
                    </div>

                                <button type="submit" class="btn">
                                {{ __('Register') }}
                                </button>
                    
                    <div class="create-account">
                        <p>Already Have an Account? <a href="{{ route('login') }}" class="register-link">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>