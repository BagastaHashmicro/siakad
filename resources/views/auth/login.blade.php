@extends('layouts.app')
@section('content')

<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<!-- ===== Iconscout CSS ===== -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<!-- ===== CSS ===== -->
<link rel="stylesheet" href="style.css">
<style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #4070f4;
}

.container{
    position: relative;
    max-width: 500px;
    width: 100%;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 0 20px;
}

.container .forms{
    display: flex;
    align-items: center;
    height: 440px;
    width: 200%;
    transition: height 0.2s ease;
}

.container .form{
    width: 50%;
    padding: 30px;
    background-color: #fff;
    transition: margin-left 0.18s ease;
}

.container.active .login{
    margin-left: -50%;
    opacity: 0;
    transition: margin-left 0.18s ease, opacity 0.15s ease;
}

.container .signup{
    opacity: 0;
    transition: opacity 0.09s ease;
}
.container.active .signup{
    opacity: 1;
    transition: opacity 0.2s ease;
}

.container.active .forms{
    height: 600px;
}
.container .form .title{
    position: relative;
    font-size: 27px;
    font-weight: 600;
}

.form .title::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    background-color: #4070f4;
    border-radius: 25px;
}

.form .input-field{
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 30px;
}

.input-field input{
    position: absolute;
    height: 100%;
    width: 100%;
    padding: 0 35px;
    border: none;
    outline: none;
    font-size: 16px;
    border-bottom: 2px solid #ccc;
    border-top: 2px solid transparent;
    transition: all 0.2s ease;
}

/* .input-field input:is(:focus, :valid){
    border-bottom-color: #4070f4;
} */

.input-field i{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 23px;
    transition: all 0.2s ease;
}

.input-field input:is(:focus, :valid) ~ i{
    color: #4070f4;
}

.input-field i.icon{
    left: 0;
}
.input-field i.showHidePw{
    right: 20px;
    cursor: pointer;
    padding: 10px;
}

.form .checkbox-text{
    display: flex;
    align-items: right;
    justify-content: space-between;
    margin-top: 20px;
}

.checkbox-text .checkbox-content{
    display: flex;
    align-items: center;
}

.checkbox-content input{
    margin: -7px 8px 0px 4px;
    accent-color: #4070f4;
}

.form .text{
    color: #333;
    font-size: 14px;
}

.form a.text{
    color: #4070f4;
    text-decoration: none;
}
.form a:hover{
    text-decoration: underline;
}

.form .button{
    margin-top: 35px;
}

.form .button input{
    border: none;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    letter-spacing: 1px;
    border-radius: 6px;
    background-color: #4070f4;
    cursor: pointer;
    transition: all 0.3s ease;
}

.button input:hover{
    background-color: red;
}

.form .login-signup{
    margin-top: 30px;
    text-align: center;
}
  </style>
<div class="container">
  <div class="forms">
      <div class="form login">
          <br> 
        <center>
          <span class="title">Login Page</span>
        </center>
          <form action="{{ route('login') }}" method="post">
            @csrf
                <div class="input-field">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Enter your Email') }}" name="email" value="{{ old('email') }}"required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <i class="uil uil-envelope icon"></i>
              </div>
              
              <div class="input-field">
                <input id="password" type="password" placeholder="{{ __('Password') }}" class="password form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
                <i class="uil uil-lock icon"></i>
                <i class="uil uil-eye-slash showHidePw"></i>
            </div>
              <div class="checkbox-text">
                  <div class="checkbox-content">
                      <input type="checkbox" id="logCheck" {{ old('remember') ? 'checked' : '' }}>
                      <label for="logCheck" class="text">Remember me</label>
                  </div>
                  
                  @if (Route::has('password.request'))
                    <a class="text" href="{{ route('password.request') }}">
                      {{ __('Forgot Password') }}
                    </a>
                  @endif
              </div>
              <br>
              <div class="input-field button">
                  <button style="
                    border: none;
                    color: #fff;
                    font-size: 17px;
                    font-weight: 500;
                    letter-spacing: 1px;
                    border-radius: 6px;
                    cursor: pointer;
                    margin-top:-40px;
                    transition: all 0.3s ease;"
                    type="submit" id="btn-login"class="btn btn-primary btn-lg btn-block">{{ __('Login Now') }} &nbsp;</button>
              </div>
          </form>

          <div class="login-signup">
              <span class="text">Belum Punya Akun ?
                <a class="text signup-link" href="{{ route('register') }}">Buat Akun Baru</a>
                  
              </span>
          </div>
      </div>
</div>

{{--Beda Login--}}
  </form>

  
</div>
@endsection
@section('script')
  <script>
    const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })


    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });

  </script>
@endsection
