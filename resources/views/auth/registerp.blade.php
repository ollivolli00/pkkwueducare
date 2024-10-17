<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up Perusahaan | EduCare</title>
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
            <form method="POST" action="{{ route('signup') }}">
            @csrf
                    <h2>Sign Up</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bi bi-person-fill'></i></span>
                        <label>Nama Depan</label>
                        <br>
                        <label type="text" required {{ __('namadepan') }}></label>

                        <div class="col-md-6">
                                <input id="namadepan" type="text" class="form-control @error('namadepan') is-invalid @enderror" name="namadepan" value="{{ old('namadepan') }}" required autocomplete="namadepan" autofocus>

                                @error('namadepan')
                                <script>
                document.getElementById('namadepan').value = '';
            </script>
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-person'></i></span>
                        <label>Nama Belakang</label>
                        <br>
                        <label type="text" required {{ __('namabelakang') }}></label>

                        <div class="col-md-6">
                                <input id="namabelakang" type="text" class="form-control @error('namabelakang') is-invalid @enderror" name="namabelakang" value="{{ old('namabelakang') }}" required autocomplete="namabelakang" autofocus>

                                @error('namabelakang')
                                <script>
                document.getElementById('namabelakang').value = '';
            </script>
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <label>Email Perusahaan</label>
                        <br>
                        <label type="email" required {{ __('emailperusahaan') }}></label>

                        <div class="col-md-6">
                                <input id="emailperusahaan" type="email" class="form-control @error('emailperusahaan') is-invalid @enderror" name="emailperusahaan" value="{{ old('emailperusahaan') }}" required autocomplete="emailperusahaan" autofocus>

                                @error('emailperusahaan')
                                <script>
                document.getElementById('emailperusahaan').value = '';
            </script>
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-person'></i></span>
                        <label>Nama Perusahaan</label>
                        <br>
                        <label type="text" required {{ __('namaperusahaan') }}></label>

                        <div class="col-md-6">
                                <input id="namaperusahaan" type="text" class="form-control @error('namaperusahaan') is-invalid @enderror" name="namaperusahaan" value="{{ old('namaperusahaan') }}" required autocomplete="namaperusahaan" autofocus>

                                @error('namaperusahaan')
                                <script>
                document.getElementById('namaperusahaan').value = '';
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
                                Sign Up
                                </button>
                    
                    <div class="create-account">
                        <p>Already Have an Account? <a href="{{ 'signin' }}" class="register-link">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>