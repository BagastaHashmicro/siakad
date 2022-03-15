@extends('layouts.app')
@section('page',)
@section('content')
<style>
  /* ===== Google Font Import - Poformsins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

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
    height: 600px;
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

.input-field input:is(:focus, :valid){
    border-bottom-color: #4070f4;
}

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
    align-items: center;
    justify-content: space-between;
    margin-top: 20px;
}

.checkbox-text .checkbox-content{
    display: flex;
    align-items: center;
}

.checkbox-content input{
    margin: 0 8px -2px 4px;
    accent-color: #4070f4;
}

.level{
  margin-top:-6px;
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
    background-color: #265df2;
}

.form .login-signup{
    margin-top: 30px;
    text-align: center;
}
</style>

<div class="container">
  <div class="forms">
      <div class="form login">
        <center>
          <span class="title">Register Page</span>
        </center>

          <form action="{{ route('register') }}" method="post">
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
            <div class="input-field" style="margin-bottom:-15px; color:#999">
              <select id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}">
                <option value="">&nbsp; &nbsp; &nbsp;Select {{ __('Level User') }}</option>
                <option value="Guru">&nbsp; &nbsp; &nbsp;Guru</option>
                <option value="Siswa">&nbsp; &nbsp; &nbsp;Siswa</option>
              </select><i class="uil uil-user level"></i>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div id="pesan"></div>
          </div>
          <br>
          <div class="input-group" id="noId">
          </div>
          <div class="input-field">
            <input id="password" type="password" placeholder="{{ __('Password') }}" class="password form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" value="{{ old('password') }}" required>
      
            @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
        </div>
            <div class="input-field">
              <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="password form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" value="{{ old('password') }}" required>
      
              @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
          <i class="uil uil-lock icon"></i>
          <i class="uil uil-eye-slash showHidePw"></i>
            </div>

              <div class="input-field button">
                <div class="input-field button">
                  <button style="
                    border: none;
                    color: #fff;
                    font-size: 17px;
                    font-weight: 500;
                    letter-spacing: 1px;
                    border-radius: 6px;
                    cursor: pointer;
                    margin-top:0px;
                    transition: all 0.3s ease;"
                  type="submit" class="btn btn-primary btn-block">{{ __('Create Account') }} &nbsp;</button>
                  </div></div>
          </form>

          <div class="login-signup">
              <span class="text">Have an Account?</span>
                  <a href="{{ route('login') }}" class="text signup-link">Login now</a>
              </span>
          </div>
      </div>

      <!-- Registration Form -->
      <div class="form signup">

          </form>

        
      </div>
  </div>
</div>

{{-- 
<div class="card-body login-card-body">
  <p class="login-box-msg">Register a new membership</p>

  <form action="{{ route('register') }}" method="post">
    @csrf
    <div class="input-group mb-3">
      <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
      @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="input-group mb-3">
      <select id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" autocomplete="role">
        <option value="">-- Select {{ __('Level User') }} --</option>
        <option value="Guru">Guru</option>
        <option value="Siswa">Siswa</option>
      </select>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user-tag"></span>
        </div>
      </div>
      @error('role')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
      <div id="pesan"></div>
    </div>
    <div class="input-group" id="noId">
    </div>
    <div class="input-group mb-3">
      <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="input-group mb-3">
      <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="row mb-3">
      <div class="col-6">
        <a href="{{ route('login') }}" class="text-center btn btn-light text-blue">Login Saja</a>
      </div>
      <!-- /.col -->
      <div class="col-6 justify-content-end">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }} &nbsp; <i class="nav-icon fas fa-sign-in-alt"></i></button>
      </div>
      <!-- /.col -->
    </div>
  </form>
</div> --}}

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