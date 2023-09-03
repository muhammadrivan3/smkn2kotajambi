<?php

$activePage = 'profilPengguna';
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
        <?php
        // echo $_GET['id_user'];
        $queryGetDataProfil = mysqli_query($konek, "SELECT * FROM profil_user WHERE user=" . $_GET['id_user']);

        if (mysqli_num_rows($queryGetDataProfil) == 1) {
          while ($GetDataProfil = mysqli_fetch_array($queryGetDataProfil)) { ?>
            <form action="../prosses.php?tipe=edit_profil" method="post" class="form-container" enctype="multipart/form-data" style="margin:10px" autocomplete="false">
              <div style="width: 100%; text-align: center;">
                <h1 class="text-1">PROFIL</h1>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Foto</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="file" class="form-control" name="foto" value='<?php echo $GetDataProfil['foto']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Nip</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>

                <div class="col-sm-8">
                  <input type="number" class="form-control" placeholder="Nip" name="nip" value=<?php echo $GetDataProfil['nip']; ?>>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Nama</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Nama" name="nama" value='<?php echo $GetDataProfil['nama']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Jenis Kelamin</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8" style="margin-left:30px;">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="radioLaki" value="L" <?php if ($GetDataProfil['jenis_kelamin'] == "L") {
                                                                                                                      echo "checked";
                                                                                                                    } ?>>
                        <label class="form-check-label text-1" for="radioMale">Laki-Laki</label>
                      </div>
                      <div class="form-check form-check-inline ms-3">
                        <input type="radio" class="form-check-input" value="P" name="jenis_kelamin" id="radioPerempuan" <?php if ($GetDataProfil['jenis_kelamin'] == "P") {
                                                                                                                          echo "checked";
                                                                                                                        } ?>>
                        <label class="form-check-label text-1" for="radioFemale">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-5 text-1 col-form-label">Tgl Lahir</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="date" id="birthday" name="tgl_lahir" class="form-control" value='<?php echo $GetDataProfil['tgl_lahir']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Alamat</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Alamat" name="alamat" value='<?php echo $GetDataProfil['alamat']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Pendidikan</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Pendidikan" name="pendidikan" value='<?php echo $GetDataProfil['pendidikan']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Golongan</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Golongan" name="golongan" value='<?php echo $GetDataProfil['golongan']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Jabatan</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <select name="jabatan" class="form-control" id="jabatan">
                    <option value="">Pilih Jabatan</option>
                    <?php
                    $arrJabatan = array('Kepala Sekolah' => 'Kepala Sekolah', 'Wakil Kurikulum/PP' => 'Wakil Kurikulum', 'Wakil Kesiswaan' => 'Wakil Kesiswaan', 'Wakil Sarana dan Prasarana' => 'Wakil Sarana dan Prasarana', 'Wakil Manajemen Mutu' => 'Wakil Manajemen Mutu', 'Wakil Humas' => 'Wakil Humas', 'KaPus' => 'KaPus', 'KaProg PB' => 'KaProg PB', 'KaProg PH' => 'KaProg PH', 'KaBeng OTKP' => 'KaBeng OTKP', 'KaBeng PB' => 'KaBeng PB', 'KaProg OTKP' => 'KaProg OTKP', 'Kasubag TU' => 'Kasubag TU', 'Operator' => 'Operator');
                    foreach ($arrJabatan as $key => $value) {
                      // code...
                      if ($key == $GetDataProfil['jabatan']) {
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
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Telepon</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Telepon" name="telepon" value='<?php echo $GetDataProfil['telepon']; ?>'>
                </div>
              </div>
              <div class="row mb-3 justify-content-end" style="margin-bottom: 10px;">
                <div class="col-sm-10 offset-sm-2 text-end" style="margin-bottom: 10px;">
                  <a href="http://localhost/smkn2kotajambi/profil-pengguna" style="
                  width:25%;
                  border: none;
                  outline: none;
                  padding: 11px 25px;
                  width: 100%;
                  margin-top: 10px;
                  border-radius: 4px;
                  font-weight: 600;
                  color: white;
                  background: #ff3333;
                  ">Kembali</a>
                  <input id="formInput" type="submit" value="Simpan" name="simpan" style="width:25%;" />
                </div>
              </div>
            </form>
          <?php
          }
        } else { ?>
          <form action="../prosses.php?tipe=add_profil" method="post" class="form-container" enctype="multipart/form-data" style="margin:10px" autocomplete="false">
            <div style="width: 100%; text-align: center;">
              <h1 class="text-1">PROFIL</h1>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Foto</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8">
                <input type="file" class="form-control" name="foto">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Nip</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>

              <div class="col-sm-8">
                <input type="number" class="form-control" placeholder="Nip" name="nip">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Nama</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Nama" name="nama">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-8 text-1 col-form-label">Jenis Kelamin</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8" style="margin-left:30px;">
                <div class="row">
                  <div class="col-12">
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="jenis_kelamin" id="radioLaki" value="L">
                      <label class="form-check-label text-1" for="radioMale">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline ms-3">
                      <input type="radio" class="form-check-input" value="P" name="jenis_kelamin" id="radioPerempuan">
                      <label class="form-check-label text-1" for="radioFemale">Perempuan</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-5 text-1 col-form-label">Tgl Lahir</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8">
                <input type="date" id="birthday" name="tgl_lahir" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Alamat</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Alamat" name="alamat">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Pendidikan</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Pendidikan" name="pendidikan">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Golongan</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Golongan" name="golongan">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Jabatan</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8">
                <select name="jabatan" class="form-control" id="jabatan">
                  <option value="">Pilih Jabatan</option>
                  <?php
                  $arrJabatan = array('Kepala Sekolah' => 'Kepala Sekolah', 'Wakil Kurikulum/PP' => 'Wakil Kurikulum', 'Wakil Kesiswaan' => 'Wakil Kesiswaan', 'Wakil Sarana dan Prasarana' => 'Wakil Sarana dan Prasarana', 'Wakil Manajemen Mutu' => 'Wakil Manajemen Mutu', 'Wakil Humas' => 'Wakil Humas', 'KaPus' => 'KaPus', 'KaProg PB' => 'KaProg PB', 'KaProg PH' => 'KaProg PH', 'KaBeng OTKP' => 'KaBeng OTKP', 'KaBeng PB' => 'KaBeng PB', 'KaProg OTKP' => 'KaProg OTKP', 'Kasubag TU' => 'Kasubag TU', 'Operator' => 'Operator');
                  foreach ($arrJabatan as $key => $value) {
                    echo "<option value='" . $key . "'>" . $value . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Telepon</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Telepon" name="telepon">
              </div>
            </div>
            <div class="row mb-3 justify-content-end" style="margin-bottom: 10px;">
              <div class="col-sm-10 offset-sm-2 text-end" style="margin-bottom: 10px;">
                <a href="http://localhost/smkn2kotajambi/profil-pengguna" style="
                  width:25%;
                  border: none;
                  outline: none;
                  padding: 11px 25px;
                  width: 100%;
                  margin-top: 10px;
                  border-radius: 4px;
                  font-weight: 600;
                  color: white;
                  background: #ff3333;
                  ">Kembali</a>
                <input id="formInput" type="submit" value="Simpan" name="simpan" style="width:25%;" />
              </div>
            </div>
          </form>
        <?php } ?>
        <!-- FORM EDIT GURU -->

      </div>
    </div>
  </div>
</div>
<?php
include "../layout/footer.php" ?>