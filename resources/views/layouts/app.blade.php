<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>SIAKAD SMPN 213 Jakarta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="shrotcut icon" href="{{ asset('img/favicon.png') }}">
  <link rel="stylesheet" href="style.css">
  <!-- ===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <style>
    .kartu{
    position: absolute;
    top: 55%;
    transform: translateY(-50%);
    color: #999;
    font-size: 23px;
    transition: all 0.2s ease;
    margin-left: 2px;
}


.form .nginput-field{
    position: relative;
    height: 37px;
    width: 100%;
    margin-top: 30px;
}

.nginput-field input{
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

.nginput-field input:is(:focus, :valid){
}

.nginput-field i{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 23px;
    transition: all 0.2s ease;
}

.nginput-field input:is(:focus, :valid) ~ i{
    color: #999;
}

.nginput-field i.icon{
    left: 0;
}
  </style>
</head>
<body class="hold-transition login-page" style="background-image: url('{{ asset("img/wallup.jpg") }}'); background-size: cover; background-attachment: fixed;">
  <div class="login-box" style="width:480px; ">
    <div class="login-logo" style="width:480px; ">
      <img src="{{ asset('img/logosiakad.png') }}" width="100%" alt="Logo Siakad SMP Negeri 213 Jakarta">
    </div>

    <div class="login-logo" style="color: black;  font-family: 'Poppins'; font-size: 30px">
      @yield('page')
    </div>

    <div class="card">
      @yield('content')
    </div>

    <footer style="color: white;">
      <marquee>
          <strong style="color:#335AC3; font-family:Poppins">Copyright &copy; <script>document.write(new Date().getFullYear());</script>  &nbsp; &diams; <a href="#" style="color: #335AC3; font-family:Poppins">SMP Negeri 213 Jakarta</a> &diams;</strong>
      </marquee>
    </footer>
  </div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- page script -->
<script>
  $(document).ready(function(){
      $('#role').change(function(){
          var kel = $('#role option:selected').val();
          if (kel == "Guru") {
            $("#noId").addClass("mb-3");
            
            $("#noId").html(` 
            <div class="nginput-field">
              <input style="border: 1px solid #ccc; border-radius: 10px; padding:0px 35px;" id="nomer" type="text" maxlength="5" onkeypress=" return inputAngka(event)" placeholder="No Id Card" class="form-control @error('nomer') is-invalid @enderror" name="nomer" autocomplete="nomer">
              <i class="uil uil-postcard kartu"></i>`);
            $("#pesan").html(`
              @error('nomer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            `);
          } else if(kel == "Siswa") {
            $("#noId").addClass("mb-3");
            $("#noId").html(` 
            <div class="nginput-field">
              <input style="border: 1px solid #ccc; border-radius: 10px; padding:0px 35px;" id="nomer" type="text" placeholder="No Induk Siswa" class="form-control" name="nomer" autocomplete="nomer">
              
              <i class="uil uil-postcard kartu"></i>`);
            $("#pesan").html(`
              @error('nomer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            `);
          } else {
            $('#noId').removeClass("mb-3");
            $('#noId').html('');
          }
      });
  });
  function inputAngka(e) {
    var charCode = (e.which) ? e.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
      return false;
    }
    return true;
  }
</script>
@yield('script')

@error('id_card')
  <script>
    toastr.error("Maaf User ini tidak terdaftar sebagai Guru SMP Negeri 213 Jakarta!");
  </script>
@enderror
@error('guru')
  <script>
    toastr.error("Maaf Guru ini sudah terdaftar sebagai User!");
  </script>
@enderror
@error('no_induk')
  <script>
    toastr.error("Maaf User ini tidak terdaftar sebagai Siswa SMP Negeri 213 Jakarta!");
  </script>
@enderror
@error('siswa')
  <script>
    toastr.error("Maaf Siswa ini sudah terdaftar sebagai User!");
  </script>
@enderror
@if (session('status'))
  <script>
    toastr.success("{{ Session('success') }}");
  </script>
@endif
@if (Session::has('error'))
    <script>
        toastr.error("{{ Session('error') }}");
    </script>
@endif

</body>
</html>