<!DOCTYPE html>
<html lang="en">
<head>
  <title>SMK 2 KOTA JAMBI</title><meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" /> 
  <link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" /> 
  <link rel="stylesheet" href="assets/css/login_style.css" />
  <link rel="shortcut icon" href="assets/icons/ic_smk2kotajambi.png" />
</head>
<body>
  <div id="box-login" class="box" style="margin-left: -400px; margin-top:-50px;">
    <div class="form"> 
      <h3>MASUK</h3>
      <form id="loginform" method="post" action="prosses.php?tipe=login" autocomplete="off">
        <div class="inputBox">
          <input type="text" name="username" required="required"/>
          <span>Username</span>
          <i></i>
        </div>
        <div class="inputBox">
          <input type="password" name="password" required="required"/>
          <span>Password</span>
          <i></i>
        </div>
        <br>
        <input type="submit" value="MASUK" name="masuk" />
        <a id="daftar" class="btn" role="Button">Belum punya akun? Daftar</a>
      </form>
    </div>
  </div>
  <div id="box-register" class="box" style="margin-left: -400px; display: none;margin-top:-50px;">
    <div class="form"> 
      <h3>DAFTAR</h3>
      <form id="loginform" method="post" action="prosses.php?tipe=register" autocomplete="off">
        <div class="inputBox">
          <input type="text" name="kode" required="required"/>
          <span>Kode Registrasi</span>
          <i></i>
        </div>
        <div class="inputBox">
          <input type="text" name="username" required="required"/>
          <span>Username</span>
          <i></i>
        </div>
        <div class="inputBox">
          <input type="password" name="password" required="required"/>
          <span>Password</span>
          <i></i>
        </div>
        <br>
        <input type="submit" value="DAFTAR" name="masuk" />
        <!-- <a href="http://localhost/smk_2_kota_jambi/dasboard">MASUK</a> -->
        <a id="masuk" class="btn" role="Button">Sudah punya akun? Masuk</a>
      </form>
    </div>
  </div>

  <script>

    document.getElementById('daftar').addEventListener('click', function() {
      document.getElementById('box-login').style.display = 'none';

      document.getElementById('box-register').style.display = 'block';
    });
    document.getElementById('masuk').addEventListener('click', function() {
      document.getElementById('box-login').style.display = 'block';
      document.getElementById('box-register').style.display = 'none';
    });

  </script>
</body>

</html>