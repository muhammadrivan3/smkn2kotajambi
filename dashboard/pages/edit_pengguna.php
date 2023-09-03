<?php

$activePage = 'kelolaPengguna';
include "../../db/koneksi.php";
include "../akses.php";
include "../layout/header.php";
// get database guru
$queryGuru = mysqli_query($konek, "SELECT * FROM user ");
?>
<div class="container-fluid">
  <div class="row" style="margin-top: -0px;">
    <div class="col-lg-2" style="height:100%;">
      <?php include "../layout/side_menu.php" ?>
    </div>
    <div class="col-lg-10 py-3" style="margin-left: -10px;">
      <div class="container-1">
        <!-- FORM EDIT GURU -->
        <div id="ContainerEditGuru">
          <?php
          // echo $_GET['id_user'];
          $queryGetData = mysqli_query($konek, "SELECT * FROM user WHERE id_user=" . $_GET['id_user']);
          while ($dataUser = mysqli_fetch_array($queryGetData)) { ?>
            <form action="../prosses.php?tipe=edit_pengguna" method="post" class="form-container" enctype="multipart/form-data" style="margin:10px" autocomplete="false">

              <div style="width: 100%; text-align: center;">
                <h1 class="text-1">Edit guru</h1>
                <input type="hidden" name="id_user" value=<?php echo $dataUser['id_user']; ?>>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Username</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>

                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="username" name="username" value=<?php echo $dataUser['username']; ?>>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Password</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="password" name="password" value='<?php echo $dataUser['password']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Akses</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <select name="akses" class="form-control" id="akses">
                    <option value="">Pilih Akses</option>
                    <?php
                    $arrJabatan = array('Kepala Sekolah' => 'Kepala Sekolah', 'Admin' => 'Admin', 'Operator' => 'Operator');
                    foreach ($arrJabatan as $key => $value) {
                      // code...
                      if ($key == $dataUser['akses']) {
                        // code...
                        echo "<option value='" . $key . "' selected>" . $value . "</option>";
                      } else {
                        echo "<option value='" . $key . "'>" . $value . "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
            <?php } ?>
            <div class="row mb-3 justify-content-end" style="margin-bottom: 10px;">
              <div class="col-sm-10 offset-sm-2 text-end" style="margin-bottom: 10px;">
                <input id="formInput" type="submit" value="Simpan" name="simpan" style="width:25%;" />
              </div>
            </div>
            </form>
        </div>
        <!-- ------------------------------ -->
      </div>
    </div>
  </div>
</div>
<?php
include "../layout/footer.php" ?>