<div id="side-menu" class="side-menu" style=" height: 100%; width:200px; margin-left: -10px; border-radius:0px; background-color:#212529; ">
  <div class="postcard text-center" style="flex-direction: column;width:100%; margin-bottom: 10px; text-align:center; background-color:#272b31; border-color: #212529;">
    <?php
    $queryDataProfilUser = mysqli_query($konek, "SELECT * FROM profil_user WHERE user=" . $_SESSION['id_user']);
    $nama = '';
    $foto = '';
    $alamat = '';
    $telepon = '';
    $tgl_lahir = '';
    if (mysqli_num_rows($queryDataProfilUser) == 1) {
      while ($DataProfilUser = mysqli_fetch_array($queryDataProfilUser)) {
        $nama = $DataProfilUser['nama'];
        $foto = $DataProfilUser['foto'];
        $alamat = $DataProfilUser['alamat'];
        $telepon = $DataProfilUser['telepon'];
        $tgl_lahir = $DataProfilUser['tgl_lahir'];
      }
    }
    ?>
    <?php if ($foto != '') { ?>
      <img src="http://localhost/smkn2kotajambi/assets/images/guru/<?php echo $foto; ?>" alt="Gambar Postcard" style="width:100px;height:100px;display: inline-block;margin: 0 auto;">
    <?php } else { ?>
      <img src="http://localhost/smkn2kotajambi/assets/images/profil.png" alt="Gambar Postcard" style="width:100px;height:100px;display: inline-block;margin: 0 auto;">
    <?php } ?>
    <div>
      <span>
        <?php
        if ($nama != '') {
          // code...
          echo $nama;
        } else {
          echo "Unknown";
        }
        ?>
      </span>
      <br />
      <span><?php echo $_SESSION['akses']; ?></span>
    </div>
  </div>
  <a href="/smkn2kotajambi/dashboard" <?php if ($activePage == 'dashboard') {
                                        echo 'class=" btn nav-link active-cs"';
                                      } else {
                                        echo 'class=" btn nav-link"';
                                      } ?> style="font-weight:600; color:white; text-align: left;">BERANDA</a>
  <?php
  if ($_SESSION['akses'] == 'Admin') { ?>
    <a href="/smkn2kotajambi/kelola-pengguna" <?php if ($activePage == 'kelolaPengguna') {
                                                echo 'class=" btn nav-link active-cs"';
                                              } else {
                                                echo 'class=" btn nav-link"';
                                              } ?> style="font-weight:600; color:white;text-align: left;">KELOLA PENGGUNA</a>
  <?php
  }
  ?>
  <a href="/smkn2kotajambi/profil-pengguna" <?php if ($activePage == 'profilPengguna') {
                                              echo 'class=" btn nav-link active-cs"';
                                            } else {
                                              echo 'class=" btn nav-link"';
                                            } ?> style="font-weight:600; color:white;text-align: left;">PROFIL PENGGUNA</a>
  <a id="menu-pengajar" <?php if ($activePage == 'pengajar' && $activePagechild != '') {
                          echo 'class=" btn nav-link active"';
                        } else {
                          echo 'class=" btn nav-link"';
                        } ?> style="font-weight:600; color:white;text-align: left;">PENGAJAR</a>
  <div id="item-pengajar" style="margin-left: 20px; background-color:#1a1a1a; display:none;">
    <a href="/smkn2kotajambi/guru" <?php if ($activePage == 'pengajar' && $activePagechild == 'dPengajar') {
                                      echo 'class=" btn nav-link active"';
                                    } else {
                                      echo 'class=" btn nav-link"';
                                    } ?> style="font-weight:600; color:white;">Daftar Pengajar</a>
    <a href="/smkn2kotajambi/kinerja/guru" <?php if ($activePage == 'pengajar' && $activePagechild == 'kPengajar') {
                                              echo 'class=" btn nav-link active"';
                                            } else {
                                              echo 'class=" btn nav-link"';
                                            } ?> style="font-weight:600; color:white;"><?php if ($_SESSION['akses'] != 'siswa') {
                                              # code...
                                              echo "Kinerja Pengajar";
                                            }else{
                                              echo "Kuesioner";
                                            } ?></a>
  <?php 
    if ($_SESSION['akses'] != 'siswa') {?>
      <a href="/smkn2kotajambi/spk/guru" <?php if ($activePage == 'pengajar' && $activePagechild == 'kPengajar') {
                                          echo 'class=" btn nav-link active"';
                                        } else {
                                          echo 'class=" btn nav-link"';
                                        } ?> style="font-weight:600; color:white;">Profil Matching</a>
  <?php  }
  ?>
  </div>
  <a class=" btn nav-link" href="http://localhost/smkn2kotajambi/logout.php?id=<?PHP echo $_SESSION['id_user']; ?>" style="font-weight:600; color:white;text-align: left;">KELUAR</a>
</div>


<script>
  var menuPengajar = document.getElementById("menu-pengajar");
  var itemPengajar = document.getElementById("item-pengajar");
  menuPengajar.addEventListener("click", function() {
    if (itemPengajar.style.display == 'none') {
      itemPengajar.style.display = 'block';
    } else {
      itemPengajar.style.display = 'none';
    }
  });
</script>