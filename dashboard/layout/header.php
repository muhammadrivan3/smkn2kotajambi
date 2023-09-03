<?php

$query = mysqli_query($konek, "SELECT * FROM identitas_sekolah");
$data = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo strtoupper($data['nama_sekolah']); ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/smkn2kotajambi/assets/css/styles.css">
  <link rel="shortcut icon" href="http://localhost/smkn2kotajambi/assets/icons/ic_smk2kotajambi.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Mengambil URL halaman saat ini
      var currentUrl = window.location.href;

      // Mengambil bagian terakhir dari URL sebagai halaman saat ini
      var currentPage = currentUrl.substr(currentUrl.lastIndexOf('/') + 1);

      // Menghapus ekstensi file jika ada
      var pageName = currentPage.replace('.php', '');

      // Menambahkan kelas "active" ke menu yang sesuai
      $(".side-menu a").each(function() {
        if ($(this).attr("href") == currentPage || $(this).attr("href") == pageName) {
          $(this).addClass("active");
        }
      });
    });
  </script>
</head>

<body>
  <header class="bg-dark text-white py-2">
    <div class="container">
      <h2 class="text-center"><img src="http://localhost/smkn2kotajambi/assets/images/logo_smk2kotajambi.png" alt="" width="50" height="50" class="d-inline-block align-text-top">SMK N 2 KOTA JAMBI</h2>
    </div>
  </header>
</body>

</html>