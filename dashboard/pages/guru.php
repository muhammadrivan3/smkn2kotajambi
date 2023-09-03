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
        <h1 class="text-1" style="margin:10px;">DATA GURU</h1>
        <div class="row ">
          <div class="col">
            <form action="" method="GET">
              <div class="container">
                <div class="row row-cols-auto">
                  <div class="col-1">Cari</div>
                  <div class="col">:</div>
                  <div class="col">
                    <input class="form-control" type="text" name="nama" placeholder="Nama Guru">
                  </div>
                  <div class="col">
                    <button class="btn btn-primary" type="submit" style="background-color:#384569; padding-top: calc(0.375rem + 1px);
                    padding-bottom: calc(0.375rem + 1px);
                    margin-bottom: 0; width:20%; border-color:
                    #384569
                    ; width:100px; border-radius: 30px;">
                      <i class="fas fa-search"></i> Cari
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col" style="display: flex; justify-content: flex-end; margin-right: 5%; ">
            <?php
            
              //jika belum login jangan lanjut..
              if ($_SESSION['akses'] == 'operator' || $_SESSION['akses'] == 'Admin') { ?>
                <div id="tambahBTN" style="text-align: center; background-color:#384569; width: 50px; border: 1px; border-radius: 10px;">
                  <a>
                    <h1 id="xs"><i class="fas fa-plus" style="font-size: 22px; color:white; "></i> </h1>
                  </a>
                </div>
            <?php }
             ?>
          </div>
        </div>
        <div id="tableContainer" style="margin: 10px;">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA/NIP</th>
                <th class="text-center text-1" style="width:5%;background-color: #404040; color:white;">L/P</th>
                <th class="text-center text-1" style="background-color: #404040; color:white;">TGL LAHIR</th>
                <th class="text-center text-1" style="background-color: #404040; color:white;">ALAMAT</th>
                <th class="text-center text-1" style="background-color: #404040; color:white;">JABATAN/GOL</th>
                <!-- <th class="text-center text-1"style="background-color: #404040; color:white;">JABATAN</th> -->
                <th class="text-center text-1" style="background-color: #404040; color:white;">TELEPON <?php echo $_SESSION['akses']; ?></th>
                <?php
                
                  //jika belum login jangan lanjut..
                  if ($_SESSION['akses'] == 'operator' || $_SESSION['akses'] == 'Admin') { ?>
                    <th class="text-center text-1" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;" colspan="2">OPTION</th>

                <?php    }
                
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $batas = 10;
              $halaman = @$_GET['halaman'];
              if (empty($halaman)) {
                $posisi     = 0;
                $halaman    = 1;
              } else {
                $posisi = ($halaman - 1) * $batas;
              }
              if ($posisi != 0) {

                $no = $posisi;
              } else {
                $no = 1;
              }
              if (isset($_GET['nama_guru'])) {
                if ($_GET['nama_guru'] != '') {
                  $queryDataGuru = mysqli_query($konek, "SELECT * FROM identitas_guru WHERE nama_guru like '%" . $_GET['nama_guru'] . "%' limit $posisi,$batas");
                } else {
                  $queryDataGuru = mysqli_query($konek, "SELECT * FROM identitas_guru limit $posisi,$batas");
                }
              } else {
                $queryDataGuru = mysqli_query($konek, "SELECT * FROM identitas_guru limit $posisi,$batas");
              }
              while ($dataGuru = mysqli_fetch_array($queryDataGuru)) {
              ?>
                <tr>
                  <td class="text-center text-1"><?php echo $no; ?></td>
                  <td class="text-center text-1">
                    <?php
                    if ($dataGuru['foto'] != '') {
                      // code...
                      echo "<img src='http://localhost/smkn2kotajambi/assets/images/guru/" . $dataGuru['foto'] . "' style='width: 50px; height: 50px;'>";
                    } else {
                      echo "<img src='http://localhost/smkn2kotajambi/assets/images/profil.png' style='width: 50px; height: 50px;'>";
                    }
                    ?>
                    <br><?php echo strtoupper($dataGuru['nama']); ?><br> NIP : <?php echo $dataGuru['nip']; ?>
                  </td>
                  <td class="text-center text-1" style="widtd:5%;"><?php echo $dataGuru['jenis_kelamin']; ?></td>
                  <td class="text-center text-1"><?php echo $dataGuru['tgl_lahir']; ?></td>
                  <td class="text-center text-1"><?php echo $dataGuru['alamat']; ?></td>
                  <td class="text-center text-1"><?php echo $dataGuru['golongan']; ?></td>
                  <!-- <td class="text-center text-1"><?php echo $dataGuru['jabatan_guru']; ?></td> -->
                  <td class="text-center text-1"><?php echo $dataGuru['telepon']; ?></td>
                  <?php
                  
                    //jika belum login jangan lanjut..
                    if ($_SESSION['akses'] == 'operator' || $_SESSION['akses'] == 'Admin') { ?>
                      <td class="text-center text-1" style="width:5%;">
                        <form class="form-container" style="margin:10px" autocomplete="false">
                          <!-- <input type="hidden" name="id_guru_edit" value=<?php echo $dataGuru['id_guru']; ?>> -->
                          <!-- <button class="btn editGuruBtn" type="submit" style=" border-color: white;border-radius: 5px; background-color: #999999;"><i class="fas fa-edit" style="color:white;"></i> </button> -->
                          <a href="edit/guru?id_guru=<?PHP echo $dataGuru['id_guru'] ?>" type="submit" class="btn" style=" border-color: white;border-radius: 5px; background-color: #999999;"><i class="fas fa-edit" style="color:white;"></i></a>
                        </form>
                      </td>
                      <td class="text-center" style="width:5%;">
                        <form action="prosses.php?tipe=hapus_guru" method="post" class="form-container" style="margin:10px" autocomplete="false">
                          <input type="hidden" name="id_guru" value=<?php echo $dataGuru['id_guru']; ?>>
                          <button class="btn" type="submit" style=" border-color: white;border-radius: 5px; background-color: #ff3333;"><i class="fas fa-trash" style="color:white;"></i> </button>
                        </form>
                      </td>
                  <?php }
                  ?>
                </tr>
              <?php $no++;
              }
              ?>
            </tbody>
          </table>
          <?php
          $query2 = mysqli_query($konek, "SELECT * FROM identitas_guru");
          $jumlahdata = mysqli_num_rows($query2);
          $jumlahhalaman = ceil($jumlahdata / $batas);
          ?>
          <nav>
            <ul class="pagination justify-content-center">
              <?php
              for ($i = 1; $i <= $jumlahhalaman; $i++) {
                if ($i != $halaman) {
                  echo "<li class='page-item'><a class='page-link' href='guru?halaman=$i'>$i</a></li>";
                } else {
                  echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                }
              }
              ?>
            </ul>
          </nav>
        </div>
        <!-- FORM INPUT GURU -->
        <div id="ContainerInputGuru" style="display: none;">
          <form action="prosses.php?tipe=tambah_guru" method="post" class="form-container" enctype="multipart/form-data" style="margin:10px" autocomplete="false">
            <div style="width: 100%; text-align: center;">
              <h1 class="text-1">Tambahkan guru</h1>
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
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Jenis Kelamin</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8" style="margin-left:30px;">
                <div class="row">
                  <div class="col-12">
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="jenis_kelamin" id="radioLaki" value="L" checked>
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
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Tgl Lahir</label></div>
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
                  $arrJabatan = array('Kepala Sekolah' => 'Kepala Sekolah', 'Wakil Kurikulum/PP' => 'Wakil Kurikulum', 'Wakil Kesiswaan' => 'Wakil Kesiswaan', 'Wakil Sarana dan Prasarana' => 'Wakil Sarana dan Prasarana', 'Wakil Manajemen Mutu' => 'Wakil Manajemen Mutu', 'Wakil Humas' => 'Wakil Humas', 'KaPus' => 'KaPus', 'KaProg PB' => 'KaProg PB', 'KaProg PH' => 'KaProg PH', 'KaBeng OTKP' => 'KaBeng OTKP', 'KaBeng PB' => 'KaBeng PB', 'KaProg OTKP' => 'KaProg OTKP', 'Kasubag TU' => 'Kasubag TU', 'Guru' => 'Guru');
                  foreach ($arrJabatan as $key => $value) {
                    // code...
                    echo "<option value='" . $key . "'>" . $value . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Spesialisasi</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Spesialisasi" name="spesialisasi">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2 text-1"><label class="col-sm-2 text-1 col-form-label">Mata Pelajaran</label></div>
              <div class="col-sm-1 text-1"><label class="col-sm-2 text-1 col-form-label">:</label></div>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Mata Pelajaran" name="mata_pelajaran">
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
                <input id="cancelBtn" type="batal" value="Kembali" name="batal" style="width:25%; background: #ff3333;" />
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
<script>
  var tambahBtn = document.getElementById('tambahBTN');
  var tabelContainer = document.getElementById('tableContainer');
  var inputContainer = document.getElementById('ContainerInputGuru');
  var cancelBtn = document.getElementById('cancelBtn');
  var formInput = document.getElementById('formInput');
  tambahBtn.addEventListener('click', function() {
    tabelContainer.style.display = 'none';
    inputContainer.style.display = 'block';
    tambahBtn.style.display = 'none';
    var tinggiBody = document.body.clientHeight;
    document.getElementById("side-menu").style.height = tinggiBody + "px";
  });
  cancelBtn.addEventListener('click', function() {
    tabelContainer.style.display = 'block';
    inputContainer.style.display = 'none';
    tambahBtn.style.display = 'block';
    formInput.reset();
    var tinggiBody = document.body.clientHeight;
    document.getElementById("side-menu").style.height = tinggiBody + "px";
  });

  formInput.addEventListener('submit', function(e) {
    e.preventDefault();
    // Lakukan proses penyimpanan data guru ke backend atau action yang diinginkan
    // Setelah itu, tampilkan kembali tabel dan reset form input
    tabelContainer.style.display = 'block';
    inputContainer.style.display = 'none';
    formInput.reset();
  });

  var tinggiBody = document.body.clientHeight;
  document.getElementById("side-menu").style.height = tinggiBody + "px";
</script>
<?php
include "../layout/footer.php" ?>