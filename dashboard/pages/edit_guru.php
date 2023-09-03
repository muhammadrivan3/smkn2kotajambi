<?php

$activePage = 'guru';
$activePagechild = 'dPengajar';
include "../../db/koneksi.php";
include "../akses.php";
include "../layout/header.php";
// get database guru
$queryGuru = mysqli_query($konek, "SELECT * FROM identitas_guru ");
// $data=mysqli_fetch_array($queryGuru);
?>
<div class="container-fluid">
  <div class="row" style="margin-top: -0px;">
    <div class="col-lg-2">
      <?php include "../layout/side_menu.php" ?>
    </div>
    <div class="col-lg-10 py-3" style="margin-left: -10px;">
      <div class="container-1">
        <!-- FORM EDIT GURU -->
        <div id="ContainerEditGuru">
          <?php
          // echo $_GET['id_guru'];
          $queryGetData = mysqli_query($konek, "SELECT * FROM identitas_guru WHERE id_guru=" . $_GET['id_guru']);
          while ($dataGuru = mysqli_fetch_array($queryGetData)) { ?>
            <form action="../prosses.php?tipe=edit" method="post" class="form-container" enctype="multipart/form-data" style="margin:10px" autocomplete="false">

              <div style="width: 100%; text-align: center;">
                <h1 class="text-1">Edit guru</h1>
                <input type="hidden" name="id_guru" value=<?php echo $dataGuru['id_guru']; ?>>
              </div>

              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Foto</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="file" class="form-control" name="foto" value=<?php echo $dataGuru['foto']; ?>>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Nip</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>

                <div class="col-sm-8">
                  <input type="number" class="form-control" placeholder="Nip" name="nip" value=<?php echo $dataGuru['nip']; ?>>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Nama</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Nama" name="nama" value='<?php echo $dataGuru['nama']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Jenis Kelamin</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8" style="margin-left:30px;">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="radioLaki" value="L" <?php if ($dataGuru['jenis_kelamin'] == "L") {
                                                                                                                      echo "checked";
                                                                                                                    } ?>>
                        <label class="form-check-label text-1" for="radioMale">Laki-Laki</label>
                      </div>
                      <div class="form-check form-check-inline ms-3">
                        <input type="radio" class="form-check-input" value="P" name="jenis_kelamin" id="radioPerempuan" <?php if ($dataGuru['jenis_kelamin'] == "P") {
                                                                                                                          echo "checked";
                                                                                                                        } ?>>
                        <label class="form-check-label text-1" for="radioFemale">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Tgl Lahir</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="date" id="birthday" name="tgl_lahir" class="form-control" value=<?php echo $dataGuru['tgl_lahir']; ?>>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Alamat</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Alamat" name="alamat" value='<?php echo $dataGuru['alamat']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Pendidikan</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Pendidikan" name="pendidikan" value='<?php echo $dataGuru['pendidikan']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Golongan</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Golongan" name="golongan" value='<?php echo $dataGuru['golongan']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Jabatan</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <select name="jabatan" class="form-control" id="jabatan">
                    <option value="">Pilih Jabatan</option>
                    <?php
                    $arrJabatan = array('Kepala Sekolah' => 'Kepala Sekolah', 'Wakil Kurikulum/PP' => 'Wakil Kurikulum', 'Wakil Kesiswaan' => 'Wakil Kesiswaan', 'Wakil Sarana dan Prasarana' => 'Wakil Sarana dan Prasarana', 'Wakil Manajemen Mutu' => 'Wakil Manajemen Mutu', 'Wakil Humas' => 'Wakil Humas', 'KaPus' => 'KaPus', 'KaProg PB' => 'KaProg PB', 'KaProg PH' => 'KaProg PH', 'KaBeng OTKP' => 'KaBeng OTKP', 'KaBeng PB' => 'KaBeng PB', 'KaProg OTKP' => 'KaProg OTKP', 'Kasubag TU' => 'Kasubag TU');
                    foreach ($arrJabatan as $key => $value) {
                      // code...
                      if ($key == $dataGuru['jabatan']) {
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
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Spesialisasi</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Spesialisasi" name="spesialisasi" value='<?php echo $dataGuru['spesialisasi']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Mata Pelajaran</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Mata Pelajaran" name="mata_pelajaran" value='<?php echo $dataGuru['mata_pelajaran']; ?>'>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Telepon</label></div>
                <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Telepon" name="telepon" value=<?php echo $dataGuru['telepon']; ?>>
                </div>
              </div>

            <?php } ?>
            <div class="row mb-3 justify-content-end" style="margin-bottom: 10px;">
              <div class="col-sm-10 offset-sm-2 text-end" style="margin-bottom: 10px;">
                <!-- <a href="/smkn2kotajambi/guru" style="
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
                  ">Kembali</a> -->
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