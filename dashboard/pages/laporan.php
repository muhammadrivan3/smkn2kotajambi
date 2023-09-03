<?php

include '../../db/koneksi.php';

$query = mysqli_query($konek, "SELECT * FROM identitas_sekolah");
$data = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LAPORAN | <?php echo strtoupper($data['nama_sekolah']); ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="http://localhost/smkn2kotajambi/assets/css/styles.css"> -->
  <link rel="stylesheet" href="../smkn2kotajambi/assets/css/print.css" media="print">
  <link rel="stylesheet" href="http://localhost/smkn2kotajambi/assets/css/laporan.css">
  <link rel="shortcut icon" href="http://localhost/smkn2kotajambi/assets/icons/ic_smk2kotajambi.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <div class="laporan">
    <div>
      <img class="background-laporan" src="http://localhost/smkn2kotajambi/assets/images/logo_smk2kotajambi.png">
      <div class="head-laporan" style="text-align:center;">
        <span style="color:black; font-size: 22px; font-weight:bold;">
          REKAPITULASI HASIL PENILAIAN KINERJA GURU KELAS/MATA PELAJARAN
        </span>
      </div>
      <?php
      $queryDataGuru = mysqli_query($konek, "SELECT * FROM identitas_guru WHERE id_guru=" . $_GET['id_guru']);
      $DataGuru = mysqli_fetch_assoc($queryDataGuru);
      $queryDataKepalaSekolah = mysqli_query($konek, "SELECT * FROM identitas_guru WHERE jabatan = 'Kepala Sekolah'");
      $queryIdentitasSekolah = mysqli_query($konek, "SELECT * FROM identitas_sekolah");
      $DataSekolah = mysqli_fetch_assoc($queryIdentitasSekolah);
      $kompetensi_1 = 0;
      $kompetensi_2 = 0;
      $kompetensi_3 = 0;
      $kompetensi_4 = 0;
      $kompetensi_5 = 0;
      $kompetensi_6 = 0;
      $kompetensi_7 = 0;
      $kompetensi_8 = 0;
      $kompetensi_9 = 0;
      $kompetensi_10 = 0;
      $kompetensi_11 = 0;
      $kompetensi_12 = 0;
      $kompetensi_13 = 0;
      $kompetensi_14 = 0;
      $kompetensi_15 = 0;
      if ($queryDataKepalaSekolah) {
        $DataKepalaSekolah = mysqli_fetch_assoc($queryDataKepalaSekolah);
      } else {
        $DataKepalaSekolah = ["nama" => ""];
      }


      ?>
      <div class="container">
        <table>
          <tr>
            <th class="print-th text-start" style="width:10%; ">a.</th>
            <th class="text-start" style="width:25%; "><span class="text-title">Nama</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataGuru['nama']; ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">NIP</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataGuru['nip']; ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">Tempat/Tgl Lahir</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataGuru['alamat'] . ", " . $DataGuru['tgl_lahir']; ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">Jenis Kelamin</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php
                                                                                                    if ($DataGuru['jenis_kelamin'] == "L") {
                                                                                                      // code...
                                                                                                      echo "Laki-Laki";
                                                                                                    } else {
                                                                                                      echo "Perempuan";
                                                                                                    }
                                                                                                    ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">Golongan</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataGuru['golongan']; ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">Jabatan</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataGuru['jabatan']; ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">Pendidikan</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataGuru['pendidikan']; ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">Spesialisasi</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataGuru['spesialisasi']; ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">Program keahlian yang diampu</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataGuru['mata_pelajaran']; ?></span></th>
          </tr>
        </table>
      </div>



      <div class="container">
        <table>
          <tr>
            <th class="print-th text-start" style="width:11%; ">b.</th>
            <th class="text-start" style="width:26%; "><span class="text-title">Nama Sekolah</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataSekolah['nama_sekolah']; ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">Alamat</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataSekolah['alamat_sekolah']; ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">Telepon</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataSekolah['telepon_sekolah']; ?></span></th>
          </tr>
          <tr>
            <th class="print-th text-start" style="width:10%; "></th>
            <th class="text-start" style="width:25%; "><span class="text-title">Email</span></th>
            <th class="text-start" style="border-bottom: 1px solid black;"><span class="text-title"><?php echo $DataSekolah['email_sekolah']; ?></span></th>
          </tr>

        </table>
      </div>

      <table class="table table-bordered" style="border:2px;">
        <thead>
          <tr>
            <th class="print-th text-center" style="width:5%;background-color: #404040; color:white;">No</th>
            <th class="text-center" style="background-color: #404040; color:white;">KOMPETENSI</th>
            <th class="text-center" style="background-color: #404040; color:white;">NILAI</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="3"><span style="margin-left:50px;">PENDAGOGIK</span></td>
          </tr>
          <?php
          $queryDataPendagogik = mysqli_query($konek, "SELECT * FROM pkg_pendagogik WHERE guru=" . $_GET['id_guru']);

          if ($queryDataPendagogik) {
            // code...
            $DataPendagogik = mysqli_fetch_assoc($queryDataPendagogik);
            
          ?>
            <tr>
              <td>1</td>
              <td>SISTEMATIKA BERPIKIR</td>
              <td class="text-center">
                <?php
                if ($DataPendagogik != null) {
                  // code...
                  // echo $DataPendagogik['kompetensi_1'];
                  if ($DataPendagogik['kompetensi_1'] <= 25) {
                    // code...
                    $kompetensi_1 = 1;
                  } else if ($DataPendagogik['kompetensi_1'] > 25 && $DataPendagogik['kompetensi_1'] < 50) {
                    // code...
                    $kompetensi_1 = 2;
                  } else if ($DataPendagogik['kompetensi_1'] > 50 && $DataPendagogik['kompetensi_1'] < 75) {
                    // code...
                    $kompetensi_1 = 3;
                  } else if ($DataPendagogik['kompetensi_1'] > 75 && $DataPendagogik['kompetensi_1'] < 100) {
                    // code...
                    $kompetensi_1 = 4;
                  } else {
                    $kompetensi_1 = 0;
                  }
                } else {
                  $kompetensi_1 = 0;
                }
                echo $kompetensi_1;
                ?>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>PENALARAN DAN KONDISI REAL</td>
              <td class="text-center">
                <?php
                if ($DataPendagogik != null) {
                  if ($DataPendagogik['kompetensi_2'] <= 25) {
                    // code...
                    $kompetensi_2 = 1;
                  } else if ($DataPendagogik['kompetensi_2'] > 25 && $DataPendagogik['kompetensi_2'] <= 50) {
                    // code...
                    $kompetensi_2 = 2;
                  } else if ($DataPendagogik['kompetensi_2'] > 50 && $DataPendagogik['kompetensi_2'] <= 75) {
                    // code...
                    $kompetensi_2 = 3;
                  } else if ($DataPendagogik['kompetensi_2'] > 75 && $DataPendagogik['kompetensi_2'] <= 100) {
                    // code...
                    $kompetensi_2 = 4;
                  }
                } else {
                  $kompetensi_2 = 0;
                }
                echo $kompetensi_2;
                ?>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>KONSENTRASI</td>
              <td class="text-center">
                <?php
                if ($DataPendagogik != null) {
                  if ($DataPendagogik['kompetensi_3'] <= 25) {
                    // code...
                    $kompetensi_3 = 1;
                  } else if ($DataPendagogik['kompetensi_3'] > 25 && $DataPendagogik['kompetensi_3'] <= 50) {
                    // code...
                    $kompetensi_3 = 2;
                  } else if ($DataPendagogik['kompetensi_3'] > 50 && $DataPendagogik['kompetensi_3'] <= 75) {
                    // code...
                    $kompetensi_3 = 3;
                  } else if ($DataPendagogik['kompetensi_3'] > 75 && $DataPendagogik['kompetensi_3'] <= 100) {
                    // code...
                    $kompetensi_3 = 4;
                  }
                } else {
                  $kompetensi_3 = 0;
                }
                echo $kompetensi_3;
                ?>
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>LOGIKA PRAKTIS</td>
              <td class="text-center">
                <?php
                if ($DataPendagogik['kompetensi_4'] <= 25) {
                  // code...
                  $kompetensi_4 = 1;
                } else if ($DataPendagogik['kompetensi_4'] > 25 && $DataPendagogik['kompetensi_4'] <= 50) {
                  // code...
                  $kompetensi_4 = 2;
                } else if ($DataPendagogik['kompetensi_4'] > 50 && $DataPendagogik['kompetensi_4'] <= 75) {
                  // code...
                  $kompetensi_4 = 3;
                } else if ($DataPendagogik['kompetensi_4'] > 75 && $DataPendagogik['kompetensi_4'] <= 100) {
                  // code...
                  $kompetensi_4 = 4;
                }
                echo $kompetensi_4;
                ?>
              </td>
            </tr>
            <tr>
              <td>5</td>
              <td>FLEKSIBILTAS BERPIKIR</td>
              <td class="text-center">
                <?php
                if ($DataPendagogik['kompetensi_5'] <= 25) {
                  // code...
                  $kompetensi_5 = 1;
                } else if ($DataPendagogik['kompetensi_5'] > 25 && $DataPendagogik['kompetensi_5'] <= 50) {
                  // code...
                  $kompetensi_5 = 2;
                } else if ($DataPendagogik['kompetensi_5'] > 50 && $DataPendagogik['kompetensi_5'] <= 75) {
                  // code...
                  $kompetensi_5 = 3;
                } else if ($DataPendagogik['kompetensi_5'] > 75 && $DataPendagogik['kompetensi_5'] <= 100) {
                  // code...
                  $kompetensi_5 = 4;
                }
                echo $kompetensi_5;
                ?>
              </td>
            </tr>
            <tr>
              <td>6</td>
              <td>IMAJINASI KREATIF</td>
              <td class="text-center">
                <?php
                if ($DataPendagogik['kompetensi_6'] <= 25) {
                  // code...
                  $kompetensi_6 = 1;
                } else if ($DataPendagogik['kompetensi_6'] > 25 && $DataPendagogik['kompetensi_6'] <= 50) {
                  // code...
                  $kompetensi_6 = 2;
                } else if ($DataPendagogik['kompetensi_6'] > 50 && $DataPendagogik['kompetensi_6'] <= 75) {
                  // code...
                  $kompetensi_6 = 3;
                } else if ($DataPendagogik['kompetensi_6'] > 75 && $DataPendagogik['kompetensi_6'] <= 100) {
                  // code...
                  $kompetensi_6 = 4;
                }
                echo $kompetensi_6;
                ?>
              </td>
            </tr>
            <tr>
              <td>7</td>
              <td>ANTISIPASI</td>
              <td class="text-center">
                <?php
                if ($DataPendagogik['kompetensi_7'] <= 25) {
                  // code...
                  $kompetensi_7 = 1;
                } else if ($DataPendagogik['kompetensi_7'] > 25 && $DataPendagogik['kompetensi_7'] <= 50) {
                  // code...
                  $kompetensi_7 = 2;
                } else if ($DataPendagogik['kompetensi_7'] > 50 && $DataPendagogik['kompetensi_7'] <= 75) {
                  // code...
                  $kompetensi_7 = 3;
                } else if ($DataPendagogik['kompetensi_7'] > 75 && $DataPendagogik['kompetensi_7'] <= 100) {
                  // code...
                  $kompetensi_7 = 4;
                }
                echo $kompetensi_7;
                ?>
              </td>
            </tr>

          <?php } ?>

          <tr>
            <td colspan="3"><span style="margin-left:50px;">KEPRIBADIAN</span></td>
          </tr>
          <?php
          $queryDataKepribadian = mysqli_query($konek, "SELECT * FROM pkg_kepribadian WHERE guru=" . $_GET['id_guru']);

          if ($queryDataKepribadian) {
            // code...
            $DataKepribadian = mysqli_fetch_assoc($queryDataKepribadian);
          ?>
            <tr>
              <td>8</td>
              <td>KETELITIAN DAN TANGGUNG JAWAB</td>
              <td class="text-center">
                <?php
                if ($DataKepribadian['kompetensi_1'] <= 25) {
                  // code...
                  $kompetensi_8 = 1;
                } else if ($DataKepribadian['kompetensi_1'] > 25 && $DataKepribadian['kompetensi_1'] <= 50) {
                  // code...
                  $kompetensi_8 = 2;
                } else if ($DataKepribadian['kompetensi_1'] > 50 && $DataKepribadian['kompetensi_1'] <= 75) {
                  // code...
                  $kompetensi_8 = 3;
                } else if ($DataKepribadian['kompetensi_1'] > 75 && $DataKepribadian['kompetensi_1'] <= 100) {
                  // code...
                  $kompetensi_8 = 4;
                }
                echo $kompetensi_8;
                ?>
              </td>
            </tr>
            <tr>
              <td>9</td>
              <td>DORONGAN BERPRESTASI</td>
              <td class="text-center">

                <?php
                if ($DataKepribadian['kompetensi_2'] <= 25) {
                  // code...
                  $kompetensi_9 = 1;
                } else if ($DataKepribadian['kompetensi_2'] > 25 && $DataKepribadian['kompetensi_2'] <= 50) {
                  // code...
                  $kompetensi_9 = 2;
                } else if ($DataKepribadian['kompetensi_2'] > 50 && $DataKepribadian['kompetensi_2'] <= 75) {
                  // code...
                  $kompetensi_9 = 3;
                } else if ($DataKepribadian['kompetensi_2'] > 75 && $DataKepribadian['kompetensi_2'] <= 100) {
                  // code...
                  $kompetensi_9 = 4;
                }
                echo $kompetensi_9;
                ?>

              </td>
            </tr>
            <tr>
              <td>10</td>
              <td>VITALITAS DAN PERENCANAAN</td>
              <td class="text-center">

                <?php
                if ($DataKepribadian['kompetensi_3'] <= 25) {
                  // code...
                  $kompetensi_10 = 1;
                } else if ($DataKepribadian['kompetensi_3'] > 25 && $DataKepribadian['kompetensi_3'] <= 50) {
                  // code...
                  $kompetensi_10 = 2;
                } else if ($DataKepribadian['kompetensi_3'] > 50 && $DataKepribadian['kompetensi_3'] <= 75) {
                  // code...
                  $kompetensi_10 = 3;
                } else if ($DataKepribadian['kompetensi_3'] > 75 && $DataKepribadian['kompetensi_3'] <= 100) {
                  // code...
                  $kompetensi_10 = 4;
                }
                echo $kompetensi_10;
                ?>

              </td>
            </tr>

          <?php } ?>

          <tr>
            <td colspan="3"><span style="margin-left:50px;">SOSIAL</span></td>
          </tr>
          <?php
          $queryDataSosial = mysqli_query($konek, "SELECT * FROM pkg_sosial WHERE guru=" . $_GET['id_guru']);

          if ($queryDataSosial) {
            // code...
            $DataSosial = mysqli_fetch_assoc($queryDataSosial);
          ?>
            <tr>
              <td>11</td>
              <td>DOMINANCE(KEKUASAAN)</td>
              <td class="text-center">

                <?php
                if ($DataSosial['kompetensi_1'] <= 25) {
                  // code...
                  $kompetensi_11 = 1;
                } else if ($DataSosial['kompetensi_1'] > 25 && $DataSosial['kompetensi_1'] <= 50) {
                  // code...
                  $kompetensi_11 = 2;
                } else if ($DataSosial['kompetensi_1'] > 50 && $DataSosial['kompetensi_1'] <= 75) {
                  // code...
                  $kompetensi_11 = 3;
                } else if ($DataSosial['kompetensi_1'] > 75 && $DataSosial['kompetensi_1'] <= 100) {
                  // code...
                  $kompetensi_11 = 4;
                }
                echo $kompetensi_11;
                ?>

              </td>
            </tr>
            <tr>
              <td>12</td>
              <td>Influences (Pengaruh)</td>
              <td class="text-center">

                <?php
                if ($DataSosial['kompetensi_2'] <= 25) {
                  // code...
                  $kompetensi_12 = 1;
                } else if ($DataSosial['kompetensi_2'] > 25 && $DataSosial['kompetensi_2'] <= 50) {
                  // code...
                  $kompetensi_12 = 2;
                } else if ($DataSosial['kompetensi_2'] > 50 && $DataSosial['kompetensi_2'] <= 75) {
                  // code...
                  $kompetensi_12 = 3;
                } else if ($DataSosial['kompetensi_2'] > 75 && $DataSosial['kompetensi_2'] <= 100) {
                  // code...
                  $kompetensi_12 = 4;
                }
                echo $kompetensi_12;
                ?>

              </td>
            </tr>
          <?php } ?>


          <tr>
            <td colspan="3"><span style="margin-left:50px;">PROFESIONAL</span></td>
          </tr>
          <?php
          $queryDataProfesional = mysqli_query($konek, "SELECT * FROM pkg_profesional WHERE guru=" . $_GET['id_guru']);

          if ($queryDataProfesional) {
            // code...
            $DataProfesional = mysqli_fetch_assoc($queryDataProfesional);
          ?>
            <tr>
              <td>13</td>
              <td>Steadiness (Keteguhan Hati)</td>
              <td class="text-center">
                <?php
                if ($DataProfesional['kompetensi_1'] <= 25) {
                  // code...
                  $kompetensi_13 = 1;
                } else if ($DataProfesional['kompetensi_1'] > 25 && $DataProfesional['kompetensi_1'] <= 50) {
                  // code...
                  $kompetensi_13 = 2;
                } else if ($DataProfesional['kompetensi_1'] > 50 && $DataProfesional['kompetensi_1'] <= 75) {
                  // code...
                  $kompetensi_13 = 3;
                } else if ($DataProfesional['kompetensi_1'] > 75 && $DataProfesional['kompetensi_1'] <= 100) {
                  // code...
                  $kompetensi_13 = 4;
                }
                echo $kompetensi_13;
                ?>
              </td>
            </tr>
            <tr>
              <td>14</td>
              <td>Compliance (Pemenuhan)</td>
              <td class="text-center">

                <?php
                if ($DataProfesional['kompetensi_2'] <= 25) {
                  // code...
                  $kompetensi_14 = 1;
                } else if ($DataProfesional['kompetensi_2'] > 25 && $DataProfesional['kompetensi_2'] <= 50) {
                  // code...
                  $kompetensi_14 = 2;
                } else if ($DataProfesional['kompetensi_2'] > 50 && $DataProfesional['kompetensi_2'] <= 75) {
                  // code...
                  $kompetensi_14 = 3;
                } else if ($DataProfesional['kompetensi_2'] > 75 && $DataProfesional['kompetensi_2'] <= 100) {
                  // code...
                  $kompetensi_14 = 4;
                }
                echo $kompetensi_14;
                ?>

              </td>
            </tr>
          <?php } ?>
          <tr>
            <td colspan="3"><span style="margin-left:50px;">PRESTASI</span></td>
          </tr>
          <?php
          $queryDataPrestasi = mysqli_query($konek, "SELECT * FROM pkg_prestasi WHERE guru=" . $_GET['id_guru']);

          if ($queryDataPrestasi) {
            // code...
            $DataPrestasi = mysqli_fetch_assoc($queryDataPrestasi);
          ?>
            <tr>
              <td>15</td>
              <td>MOTIVASI</td>
              <td class="text-center">

                <?php
                if ($DataPrestasi['kompetensi_1'] <= 25) {
                  // code...
                  $kompetensi_15 = 1;
                } else if ($DataPrestasi['kompetensi_1'] > 25 && $DataPrestasi['kompetensi_1'] <= 50) {
                  // code...
                  $kompetensi_15 = 2;
                } else if ($DataPrestasi['kompetensi_1'] > 50 && $DataPrestasi['kompetensi_1'] <= 75) {
                  // code...
                  $kompetensi_15 = 3;
                } else if ($DataPrestasi['kompetensi_1'] > 75 && $DataPrestasi['kompetensi_1'] <= 100) {
                  // code...
                  $kompetensi_15 = 4;
                }
                echo $kompetensi_15;
                ?>

              </td>
            </tr>
          <?php } ?>
          <tr>
            <td colspan="2">Jumlah (Hasil Penilaian Kinerja Guru) </td>
            <td class="text-center" style="font-weight:bold;">
              <?php $total = $kompetensi_1 + $kompetensi_2 + $kompetensi_3 + $kompetensi_4 + $kompetensi_5 + $kompetensi_6 + $kompetensi_7 + $kompetensi_8 + $kompetensi_9 + $kompetensi_10 + $kompetensi_11 + $kompetensi_12 + $kompetensi_13 + $kompetensi_14 + $kompetensi_15;
              echo $total;
              ?></td>
          </tr>

          <tr>
            <td colspan="2">Hasil Penilaian Kinerja Guru (Skala 100) : (Skor/max_skor) x 100</td>
            <td class="text-center" style="font-weight:bold;"><?php $hasil = ($total / 56) * 100;
                                                              echo number_format($hasil, 2);
                                                              ?></td>
          </tr>
        </tbody>
      </table>
      <table style="width:100%;">
        <tr>
          <th style="text-align: left;">Guru Yang dinilai</th>
          <th style="text-align: right;">Kepala Sekolah</th>
        </tr>
      </table>
      <br />
      <br />
      <br />
      <table style="width:100%;">
        <tr>
          <th style="text-align: left;"><?php echo $DataGuru['nama']; ?></th>
          <th style="text-align: right;"><?php echo $DataKepalaSekolah['nama']; ?></th>
        </tr>
      </table>
    </div>
  </div>


</body>

</html>