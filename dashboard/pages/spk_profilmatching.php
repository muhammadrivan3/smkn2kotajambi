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
                <h1 class="text-1" style="margin:10px;">SPK Profil Matching</h1>
                <div style="display: flex; justify-content: flex-end; margin: 10px;">
                <?php if ($_SESSION['akses'] == 'operator' || $_SESSION['akses'] == 'Admin') {  ?>
                    <button id="btdetail" class="btn btn-primary" style="background-color:#384569; padding-top: calc(0.375rem + 1px);
                    padding-bottom: calc(0.375rem + 1px);
                    margin-bottom: 0; border-color:
                    #384569
                    ; width:100px; border-radius: 30px;">
                        <i class="fas fa-book"></i> Detail
                    </button>
                    <button id="btkembali" class="btn btn-primary" style="display:none;background-color:#384569; padding-top: calc(0.375rem + 1px);
                    padding-bottom: calc(0.375rem + 1px);
                    margin-bottom: 0; border-color:
                    #384569
                    ; width:150px; border-radius: 30px;">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                    <?php } ?>
                </div>
                <div id="tableContainerPKG"  class="tableContainerPKG" style="display: none;">
                    <div id="tableContainer-SPK1" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">ASPEK</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">FAKTOR PENILAIAN</th>
                                    <th class="text-center text-1" style="width:5%; background-color: #404040; color:white;">Nilai Target</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">TIPE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center text-1">1</td>
                                    <td class="text-center text-1">Kecerdasan</td>
                                    <td class="text-1">
                                        <ul style="list-style: none; ">
                                            <li>Sistematika Berpikir</li>
                                            <li>Penalaran dan Solusi Real</li>
                                            <li>Konsentrasi</li>
                                            <li>Logika Praktis</li>
                                            <li>Fleksibilitas Berpikir</li>
                                            <li>Imajinasi Kreatif</li>
                                            <li>Antisipasi</li>
                                        </ul>
                                    </td>
                                    <td class="text-center text-1">
                                        <ul style="list-style: none; text-align: center;padding-left: 0rem;">
                                            <li>4</li>
                                            <li>4</li>
                                            <li>3</li>
                                            <li>3</li>
                                            <li>4</li>
                                            <li>4</li>
                                            <li>3</li>
                                        </ul>
                                    </td>
                                    <td class=" text-1">
                                        <ul style="list-style: none; ">
                                            <li>Core Factor</li>
                                            <li>Core Factor</li>
                                            <li>Secondary Factor</li>
                                            <li>Core Factor</li>
                                            <li>Core Factor</li>
                                            <li>Core Factor</li>
                                            <li>Secondary Factor</li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- ------------------ -->
                                <tr>
                                    <td class="text-center text-1">2</td>
                                    <td class="text-center text-1">Sikap Kerja</td>
                                    <td class="text-1">
                                        <ul style="list-style: none; ">
                                            <li>Ketelitian dan tanggung jawab</li>
                                            <li>Dorongan Berprestasi</li>
                                            <li>Vitalitas dan Perencanaan</li>
                                        </ul>
                                    </td>
                                    <td class="text-center text-1">
                                        <ul style="list-style: none; text-align: center;padding-left: 0rem;">
                                            <li>4</li>
                                            <li>3</li>
                                            <li>4</li>
                                        </ul>
                                    </td>
                                    <td class=" text-1">
                                        <ul style="list-style: none; ">
                                            <li>Secondary Factor</li>
                                            <li>Core Factor</li>
                                            <li>Secondary Factor</li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- ------------------ -->
                                <tr>
                                    <td class="text-center text-1">3</td>
                                    <td class="text-center text-1">Perilaku</td>
                                    <td class="text-1">
                                        <ul style="list-style: none; ">
                                            <li>Dominance (Kekuasaan)</li>
                                            <li>Influences (Pengaruh)</li>
                                            <li>Steadiness (Keteguhan Hati)</li>
                                            <li>Compliance (Pemenuhan)</li>
                                            <li>Motivasi</li>
                                        </ul>
                                    </td>
                                    <td class="text-center text-1">
                                        <ul style="list-style: none; text-align: center;padding-left: 0rem;">
                                            <li>3</li>
                                            <li>3</li>
                                            <li>4</li>
                                            <li>4</li>
                                            <li>3</li>
                                        </ul>
                                    </td>
                                    <td class=" text-1">
                                        <ul style="list-style: none; ">
                                            <li>Secondary Factor</li>
                                            <li>Secondary Factor</li>
                                            <li>Core Factor</li>
                                            <li>Core Factor</li>
                                            <li>Core Factor</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- INITIALIZATION VARIABLE -->
                    <?php
                    $pemetaanGapKecerdasan = [];
                    $pemetaanGapSikapKerja = [];
                    $pemetaanGapAspekPrilaku = [];
                    $allDataGuruNip = [];
                    $allDataGuruJnk = [];
                    $allDataGuruGol = [];
                    ?>
                    <!-- ------------------------ -->
                    <!-- TABEL KECERDASAN-->
                    <h5 class="text-1" style="margin-left:10%;">Aspek Kecerdasan</h5>
                    <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l1</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l2</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l3</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l4</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l5</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l6</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l7</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $queryDataGuru = mysqli_query($konek, "SELECT * FROM identitas_guru ");
                                while ($dataGuru = mysqli_fetch_array($queryDataGuru)) {
                                    
                                    $allDataGuruNip[$dataGuru['nama']] = $dataGuru['nip'];
                                    $allDataGuruJnk[$dataGuru['nama']] = $dataGuru['jenis_kelamin'];
                                    $allDataGuruGol[$dataGuru['nama']] = $dataGuru['golongan'];
                                    $dataPersenanPendagogik1 = 0;
                                    $dataPersenanPendagogik1_1 = 0;
                                    $dataPersenanPendagogik2 = 0;
                                    $dataPersenanPendagogik2_2 = 0;
                                    $dataPersenanPendagogik3 = 0;
                                    $dataPersenanPendagogik3_3 = 0;
                                    $dataPersenanPendagogik4 = 0;
                                    $dataPersenanPendagogik4_4 = 0;
                                    $dataPersenanPendagogik5 = 0;
                                    $dataPersenanPendagogik5_5 = 0;
                                    $dataPersenanPendagogik6 = 0;
                                    $dataPersenanPendagogik6_6 = 0;
                                    
                                    $dataPersenanPendagogik7 = 0;
                                    $dataPersenanPendagogik7_7 = 0;
                                    $queryDataGuruPersenan = mysqli_query($konek, "SELECT * FROM pkg_pendagogik WHERE guru=".$dataGuru['id_guru']);
                                    while ($dataGuruPendagogiks = mysqli_fetch_array($queryDataGuruPersenan)) {
                                        # code...
                                        $dataPersenanPendagogik1=$dataPersenanPendagogik1 + $dataGuruPendagogiks['kompetensi_1'];
                                        $dataPersenanPendagogik1_1 = $dataPersenanPendagogik1_1+100;
                                        $dataPersenanPendagogik2=$dataPersenanPendagogik2 + $dataGuruPendagogiks['kompetensi_2'];
                                        $dataPersenanPendagogik2_2 = $dataPersenanPendagogik2_2+100;
                                        $dataPersenanPendagogik3=$dataPersenanPendagogik3 + $dataGuruPendagogiks['kompetensi_3'];
                                        $dataPersenanPendagogik3_3 = $dataPersenanPendagogik3_3+100;
                                        $dataPersenanPendagogik4=$dataPersenanPendagogik4 + $dataGuruPendagogiks['kompetensi_4'];
                                        $dataPersenanPendagogik4_4 = $dataPersenanPendagogik4_4+100;
                                        $dataPersenanPendagogik5=$dataPersenanPendagogik5 + $dataGuruPendagogiks['kompetensi_5'];
                                        $dataPersenanPendagogik5_5 = $dataPersenanPendagogik5_5+100;
                                        $dataPersenanPendagogik6=$dataPersenanPendagogik6 + $dataGuruPendagogiks['kompetensi_6'];
                                        $dataPersenanPendagogik6_6 = $dataPersenanPendagogik6_6+100;
                                        $dataPersenanPendagogik7=$dataPersenanPendagogik7 + $dataGuruPendagogiks['kompetensi_7'];
                                        $dataPersenanPendagogik7_7 = $dataPersenanPendagogik7_7+100;
                                    }
                                    $dataPersenanPendagogik1= ($dataPersenanPendagogik1 / $dataPersenanPendagogik1_1) * 100;
                                    $dataPersenanPendagogik2= ($dataPersenanPendagogik2 / $dataPersenanPendagogik2_2) * 100;
                                    $dataPersenanPendagogik3= ($dataPersenanPendagogik3 / $dataPersenanPendagogik3_3) * 100;
                                    $dataPersenanPendagogik4= ($dataPersenanPendagogik4 / $dataPersenanPendagogik4_4) * 100;
                                    $dataPersenanPendagogik5= ($dataPersenanPendagogik5 / $dataPersenanPendagogik5_5) * 100;
                                    $dataPersenanPendagogik6= ($dataPersenanPendagogik6 / $dataPersenanPendagogik6_6) * 100;
                                    $dataPersenanPendagogik7= ($dataPersenanPendagogik7 / $dataPersenanPendagogik7_7) * 100;
                                ?>
                                    <tr>
                                        <td class="text-center text-1"><?php echo $no; ?></td>
                                        <td class="text-1"><?php echo $dataGuru['nama']; ?></td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenanPendagogik1 <= 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenanPendagogik1 <= 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenanPendagogik1 <= 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenanPendagogik1 <= 100) {
                                                // code...
                                                $kompetensi = 4;
                                                // echo $dataGuru['kompetensi_1'];
                                            }


                                            $totalKompetensi = $kompetensi - 4;
                                            $pemetaanGapKecerdasan[$dataGuru['nama']]['sistematika_berpikir'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-4) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenanPendagogik2 < 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenanPendagogik2 > 25 && $dataPersenanPendagogik2 < 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenanPendagogik2 > 50 && $dataPersenanPendagogik2 < 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenanPendagogik2 > 75 && $dataPersenanPendagogik2 < 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 4;
                                            $pemetaanGapKecerdasan[$dataGuru['nama']]['penalaran_dan_solusi_real'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-4) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenanPendagogik3 < 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenanPendagogik3 > 25 && $dataPersenanPendagogik3 < 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenanPendagogik3 > 50 && $dataPersenanPendagogik3 < 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenanPendagogik3 > 75 && $dataPersenanPendagogik3 < 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 3;
                                            $pemetaanGapKecerdasan[$dataGuru['nama']]['konsentrasi'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-3) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenanPendagogik4 < 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenanPendagogik4 > 25 && $dataPersenanPendagogik4 < 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenanPendagogik4 > 50 && $dataPersenanPendagogik4 < 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenanPendagogik4 > 75 && $dataPersenanPendagogik4 < 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 3;
                                            $pemetaanGapKecerdasan[$dataGuru['nama']]['logika_praktis'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-3) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenanPendagogik5 < 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenanPendagogik5 > 25 && $dataPersenanPendagogik5 < 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenanPendagogik5 > 50 && $dataPersenanPendagogik5 < 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenanPendagogik5 > 75 && $dataPersenanPendagogik5 < 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 4;
                                            $pemetaanGapKecerdasan[$dataGuru['nama']]['fleksibilitas_berpikir'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-4) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenanPendagogik6 < 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenanPendagogik6 > 25 && $dataPersenanPendagogik6 < 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenanPendagogik6 > 50 && $dataPersenanPendagogik6 < 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenanPendagogik6 > 75 && $dataPersenanPendagogik6 < 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 4;
                                            $pemetaanGapKecerdasan[$dataGuru['nama']]['imajinasi_kreatif'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-4) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenanPendagogik7 < 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenanPendagogik7 > 25 && $dataPersenanPendagogik7 < 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenanPendagogik7 > 50 && $dataPersenanPendagogik7 < 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenanPendagogik7 > 75 && $dataPersenanPendagogik7 < 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 3;
                                            $pemetaanGapKecerdasan[$dataGuru['nama']]['antisipasi'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-3) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <!-- TABEL SIKAP KERJA-->
                    <h5 class="text-1" style="margin-left:10%;">Aspek Sikap Kerja</h5>
                    <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">s1</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">s2</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">s3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $queryDataGuru = mysqli_query($konek, "SELECT * FROM identitas_guru");
                                while ($dataGuru = mysqli_fetch_array($queryDataGuru)) {
                                    $dataPersenanprofesional1 = 0;
                                    $dataPersenanprofesional1_1 = 0;
                                    $dataPersenanprofesional2 = 0;
                                    $dataPersenanprofesional2_2 = 0;
                                    $queryDataGuruPersenan = mysqli_query($konek, "SELECT * FROM pkg_profesional WHERE guru=".$dataGuru['id_guru']);
                                    while ($dataGuruprofesionals = mysqli_fetch_array($queryDataGuruPersenan)) {
                                        # code...
                                        $dataPersenanprofesional1=$dataPersenanprofesional1 + $dataGuruprofesionals['kompetensi_1'];
                                        $dataPersenanprofesional1_1 = $dataPersenanprofesional1_1+100;
                                        $dataPersenanprofesional2=$dataPersenanprofesional2 + $dataGuruprofesionals['kompetensi_2'];
                                        $dataPersenanprofesional2_2 = $dataPersenanprofesional2_2+100;
                                    }
                                    $dataPersenanprofesional1= ($dataPersenanprofesional1 / $dataPersenanprofesional1_1) * 100;
                                    $dataPersenanprofesional2= ($dataPersenanprofesional2 / $dataPersenanprofesional2_2) * 100;

                                    $dataPersenanprestasi1 = 0;
                                    $dataPersenanprestasi1_1 = 0;
                                    $queryDataGuruPersenan1 = mysqli_query($konek, "SELECT * FROM pkg_prestasi WHERE guru=".$dataGuru['id_guru']);
                                    while ($dataGuruprestasi = mysqli_fetch_array($queryDataGuruPersenan1)) {
                                        # code...
                                        $dataPersenanprestasi1=$dataPersenanprestasi1 + $dataGuruprestasi['kompetensi_1'];
                                        $dataPersenanprestasi1_1 = $dataPersenanprestasi1_1+100;
                                    }
                                     $dataPersenanprestasi1= ($dataPersenanprestasi1 / $dataPersenanprestasi1_1) * 100;

                                ?>
                                    <tr>
                                        <td class="text-center text-1"><?php echo $no; ?></td>
                                        <td class="text-1"><?php echo $dataGuru['nama']; ?></td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenanprofesional1 <= 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenanprofesional1 > 25 && $dataPersenanprofesional1 <= 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenanprofesional1 > 50 && $dataPersenanprofesional1 <= 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenanprofesional1 > 75 && $dataPersenanprofesional1 <= 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 3;
                                            $pemetaanGapSikapKerja[$dataGuru['nama']]['vitalitas_perencanaan'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-3) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenanprofesional2 <= 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenanprofesional2 > 25 && $dataPersenanprofesional2 <= 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenanprofesional2 > 50 && $dataPersenanprofesional2 <= 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenanprofesional2 > 75 && $dataPersenanprofesional2 < 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 4;
                                            $pemetaanGapSikapKerja[$dataGuru['nama']]['ketelitian_dan_tanggung_jawab'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-4) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                                <?php if ($dataPersenanprestasi1 <= 25) {
                                                    // code...
                                                    $kompetensi = 1;
                                                } else if ($dataPersenanprestasi1 > 25 && $dataPersenanprestasi1 <= 50) {
                                                    // code...
                                                    $kompetensi = 2;
                                                } else if ($dataPersenanprestasi1 > 50 && $dataPersenanprestasi1 <= 75) {
                                                    // code...
                                                    $kompetensi = 3;
                                                } else if ($dataPersenanprestasi1 > 75 && $dataPersenanprestasi1 <= 100) {
                                                    // code...
                                                    $kompetensi = 4;
                                                }
                                                $totalKompetensi = $kompetensi - 2;
                                                $pemetaanGapSikapKerja[$dataGuru['nama']]['dorongan_berprestasi'] = $totalKompetensi;
                                                echo "(" . $kompetensi . "-2) = " . $totalKompetensi;
                                                ?>
                                            </td>

                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <!-- TABEL SIKAP KERJA-->
                    <h5 class="text-1" style="margin-left:10%;">Aspek Perilaku</h5>
                    <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">p1</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">p2</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">p3</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">p4</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">p5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $queryDataGuru = mysqli_query($konek, "SELECT * FROM identitas_guru ");
                                while ($dataGuru = mysqli_fetch_array($queryDataGuru)) {
                                    
                                    $dataPersenankepribadian1 = 0;
                                    $dataPersenankepribadian1_1 = 0;
                                    $dataPersenankepribadian2 = 0;
                                    $dataPersenankepribadian2_2 = 0;
                                    $dataPersenankepribadian3 = 0;
                                    $dataPersenankepribadian3_3 = 0;
                                    $queryDataGuruPersenan = mysqli_query($konek, "SELECT * FROM pkg_kepribadian WHERE guru=".$dataGuru['id_guru']);
                                    while ($dataGurukepribadians = mysqli_fetch_array($queryDataGuruPersenan)) {
                                        # code...
                                        $dataPersenankepribadian1=$dataPersenankepribadian1 + $dataGurukepribadians['kompetensi_1'];
                                        $dataPersenankepribadian1_1 = $dataPersenankepribadian1_1+100;
                                        $dataPersenankepribadian2=$dataPersenankepribadian2 + $dataGurukepribadians['kompetensi_2'];
                                        $dataPersenankepribadian2_2 = $dataPersenankepribadian2_2+100;
                                        $dataPersenankepribadian3=$dataPersenankepribadian3 + $dataGurukepribadians['kompetensi_3'];
                                        $dataPersenankepribadian3_3 = $dataPersenankepribadian3_3+100;
                                    }
                                    $dataPersenankepribadian1= ($dataPersenankepribadian1 / $dataPersenankepribadian1_1) * 100;
                                    $dataPersenankepribadian2= ($dataPersenankepribadian2 / $dataPersenankepribadian2_2) * 100;
                                    $dataPersenankepribadian3= ($dataPersenankepribadian3 / $dataPersenankepribadian3_3) * 100;


                                    $dataPersenansosial1 = 0;
                                    $dataPersenansosial1_1 = 0;
                                    $dataPersenansosial2 = 0;
                                    $dataPersenansosial2_2 = 0;
                                    $queryDataGuruPersenan = mysqli_query($konek, "SELECT * FROM pkg_sosial WHERE guru=".$dataGuru['id_guru']);
                                    while ($dataGurusosials = mysqli_fetch_array($queryDataGuruPersenan)) {
                                        # code...
                                        $dataPersenansosial1=$dataPersenansosial1 + $dataGurusosials['kompetensi_1'];
                                        $dataPersenansosial1_1 = $dataPersenansosial1_1+100;
                                        $dataPersenansosial2=$dataPersenansosial2 + $dataGurusosials['kompetensi_2'];
                                        $dataPersenansosial2_2 = $dataPersenansosial2_2+100;
                                    }
                                    $dataPersenansosial1= ($dataPersenansosial1 / $dataPersenansosial1_1) * 100;
                                    $dataPersenansosial2= ($dataPersenansosial2 / $dataPersenansosial2_2) * 100;

                                ?>
                                    <tr>
                                        <td class="text-center text-1"><?php echo $no; ?></td>
                                        <td class="text-1"><?php echo $dataGuru['nama']; ?></td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenankepribadian1 <= 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenankepribadian1 > 25 && $dataPersenankepribadian1 <= 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenankepribadian1 > 50 && $dataPersenankepribadian1 <= 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenankepribadian1 > 75 && $dataPersenankepribadian1 <= 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 3;
                                            $pemetaanGapAspekPrilaku[$dataGuru['nama']]['dominance'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-3) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenankepribadian2 <= 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenankepribadian2 > 25 && $dataPersenankepribadian2 <= 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenankepribadian2 > 50 && $dataPersenankepribadian2 <= 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenankepribadian2 > 75 && $dataPersenankepribadian2 <= 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 4;
                                            $pemetaanGapAspekPrilaku[$dataGuru['nama']]['influences'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-4) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                            <?php if ($dataPersenankepribadian3 <= 25) {
                                                // code...
                                                $kompetensi = 1;
                                            } else if ($dataPersenankepribadian3 > 25 && $dataPersenankepribadian3 <= 50) {
                                                // code...
                                                $kompetensi = 2;
                                            } else if ($dataPersenankepribadian3 > 50 && $dataPersenankepribadian3 <= 75) {
                                                // code...
                                                $kompetensi = 3;
                                            } else if ($dataPersenankepribadian3 > 75 && $dataPersenankepribadian3 <= 100) {
                                                // code...
                                                $kompetensi = 4;
                                            }
                                            $totalKompetensi = $kompetensi - 2;
                                            $pemetaanGapAspekPrilaku[$dataGuru['nama']]['steadiness'] = $totalKompetensi;
                                            echo "(" . $kompetensi . "-2) = " . $totalKompetensi;
                                            ?>
                                        </td>
                                        <td class="text-center text-1">
                                                <?php if ($dataPersenansosial1 <= 25) {
                                                    // code...
                                                    $kompetensi = 1;
                                                } else if ($dataPersenansosial1 > 25 && $dataPersenansosial1 <= 50) {
                                                    // code...
                                                    $kompetensi = 2;
                                                } else if ($dataPersenansosial1 > 50 && $dataPersenansosial1 <= 75) {
                                                    // code...
                                                    $kompetensi = 3;
                                                } else if ($dataPersenansosial1 > 75 && $dataPersenansosial1 <= 100) {
                                                    // code...
                                                    $kompetensi = 4;
                                                }
                                                $totalKompetensi = $kompetensi - 2;
                                                $pemetaanGapAspekPrilaku[$dataGuru['nama']]['compliance'] = $totalKompetensi;
                                                echo "(" . $kompetensi . "-2) = " . $totalKompetensi;
                                                ?>
                                            </td>
                                            <td class="text-center text-1">
                                                <?php if ($dataPersenansosial2 <= 25) {
                                                    // code...
                                                    $kompetensi = 1;
                                                } else if ($dataPersenansosial2 > 25 && $dataPersenansosial2 <= 50) {
                                                    // code...
                                                    $kompetensi = 2;
                                                } else if ($dataPersenansosial2 > 50 && $dataPersenansosial2 <= 75) {
                                                    // code...
                                                    $kompetensi = 3;
                                                } else if ($dataPersenansosial2 > 75 && $dataPersenansosial2 <= 100) {
                                                    // code...
                                                    $kompetensi = 4;
                                                }
                                                $totalKompetensi = $kompetensi - 2;
                                                $pemetaanGapAspekPrilaku[$dataGuru['nama']]['motivasi'] = $totalKompetensi;
                                                echo "(" . $kompetensi . "-2) = " . $totalKompetensi;
                                                ?>
                                            </td>

                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <?php
                    $pembobotanAspekKecerdasan = [];
                    $pembobotanAspekSikapKerja = [];
                    $pembobotanAspekPrilaku = [];

                    ?>
                    <!-- TABEL PEMBOBOTAN KECERDASAN-->
                    <h5 class="text-1" style="margin-left:10%;">Pembobotan Aspek Kecerdasan</h5>
                    <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l1</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l2</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l3</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l4</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l5</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l6</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">l7</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pemetaanGapKecerdasan as $key => $values) { ?>
                                    <tr>
                                        <td class="text-center text-1 "><?php echo $no; ?></td>
                                        <td class="text-center text-1 "><?php echo $key; ?></td>
                                        <?php
                                        foreach ($values as $label => $value) {
                                        ?>
                                            <td class="text-center text-1 ">
                                                <?php
                                                if ($value == 0) {
                                                    # code...
                                                    $hasilValue  = 5;
                                                } else if ($value == 1) {
                                                    # code...
                                                    $hasilValue  = 4.5;
                                                } else if ($value == -1) {
                                                    # code...
                                                    $hasilValue  = 4;
                                                } else if ($value == 2) {
                                                    # code...
                                                    $hasilValue  = 3.5;
                                                } else if ($value == -2) {
                                                    # code...
                                                    $hasilValue  = 3;
                                                } else if ($value == 3) {
                                                    # code...
                                                    $hasilValue  = 2.5;
                                                } else if ($value == -3) {
                                                    # code...
                                                    $hasilValue  = 2;
                                                } else if ($value == 4) {
                                                    # code...
                                                    $hasilValue  = 1.5;
                                                } else if ($value == -4) {
                                                    # code...
                                                    $hasilValue  = 1;
                                                }
                                                $pembobotanAspekKecerdasan[$key][$label] = $hasilValue;
                                                echo $hasilValue;
                                                ?>
                                            </td>
                                        <?php
                                            // Menampilkan label dan nilai dalam sub-array
                                        }
                                        ?>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <!-- TABEL PEMBOBOTAN SIKAP KERJA-->
                    <h5 class="text-1" style="margin-left:10%;">Pembobotan Aspek Sikap Kerja</h5>
                    <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">s1</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">s2</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">s3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pemetaanGapSikapKerja as $key => $values) { ?>
                                    <tr>
                                        <td class="text-center text-1 "><?php echo $no; ?></td>
                                        <td class="text-1 "><?php echo $key; ?></td>
                                        <?php
                                        foreach ($values as $label => $value) {
                                        ?>
                                            <td class="text-center text-1 ">
                                                <?php
                                                if ($value == 0) {
                                                    # code...
                                                    $hasilValue  = 5;
                                                } else if ($value == 1) {
                                                    # code...
                                                    $hasilValue  = 4.5;
                                                } else if ($value == -1) {
                                                    # code...
                                                    $hasilValue  = 4;
                                                } else if ($value == 2) {
                                                    # code...
                                                    $hasilValue  = 3.5;
                                                } else if ($value == -2) {
                                                    # code...
                                                    $hasilValue  = 3;
                                                } else if ($value == 3) {
                                                    # code...
                                                    $hasilValue  = 2.5;
                                                } else if ($value == -3) {
                                                    # code...
                                                    $hasilValue  = 2;
                                                } else if ($value == 4) {
                                                    # code...
                                                    $hasilValue  = 1.5;
                                                } else if ($value == -4) {
                                                    # code...
                                                    $hasilValue  = 1;
                                                }
                                                $pembobotanAspekSikapKerja[$key][$label] = $hasilValue;
                                                echo $hasilValue;
                                                ?>
                                            </td>
                                        <?php
                                            // Menampilkan label dan nilai dalam sub-array
                                        }
                                        ?>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <!-- TABEL SIKAP KERJA-->
                    <h5 class="text-1" style="margin-left:10%;">Pembobotan Aspek Perilaku</h5>
                    <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">p1</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">p2</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">p3</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">p4</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">p5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pemetaanGapAspekPrilaku as $key => $values) { ?>
                                    <tr>
                                        <td class="text-center text-1 "><?php echo $no; ?></td>
                                        <td class="text-center text-1 "><?php echo $key; ?></td>
                                        <?php
                                        foreach ($values as $label => $value) {
                                        ?>
                                            <td class="text-center text-1 ">
                                                <?php
                                                if ($value == 0) {
                                                    # code...
                                                    $hasilValue  = 5;
                                                } else if ($value == 1) {
                                                    # code...
                                                    $hasilValue  = 4.5;
                                                } else if ($value == -1) {
                                                    # code...
                                                    $hasilValue  = 4;
                                                } else if ($value == 2) {
                                                    # code...
                                                    $hasilValue  = 3.5;
                                                } else if ($value == -2) {
                                                    # code...
                                                    $hasilValue  = 3;
                                                } else if ($value == 3) {
                                                    # code...
                                                    $hasilValue  = 2.5;
                                                } else if ($value == -3) {
                                                    # code...
                                                    $hasilValue  = 2;
                                                } else if ($value == 4) {
                                                    # code...
                                                    $hasilValue  = 1.5;
                                                } else if ($value == -4) {
                                                    # code...
                                                    $hasilValue  = 1;
                                                }
                                                $pembobotanAspekPrilaku[$key][$label] = $hasilValue;
                                                echo $hasilValue;
                                                ?>
                                            </td>
                                        <?php
                                            // Menampilkan label dan nilai dalam sub-array
                                        }
                                        ?>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <?php
                    $perhitungan = [];
                    ?>
                    <!-- TABEL PERHITUNGAN KECERDASAN-->
                    <h5 class="text-1" style="margin-left:10%;">Perhitungan Aspek Kecerdasan</h5>
                    <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Core Factor</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Secondary Factor</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pembobotanAspekKecerdasan as $key => $values) { ?>
                                    <tr>
                                        <td class="text-center text-1 "><?php echo $no; ?></td>
                                        <td class="text-center text-1 "><?php echo $key; ?></td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            $coreFactory = 0;
                                            $coreFactory = $pembobotanAspekKecerdasan[$key]['sistematika_berpikir']
                                                + $pembobotanAspekKecerdasan[$key]['penalaran_dan_solusi_real'] + $pembobotanAspekKecerdasan[$key]['logika_praktis']
                                                + $pembobotanAspekKecerdasan[$key]['fleksibilitas_berpikir'] + $pembobotanAspekKecerdasan[$key]['imajinasi_kreatif'];
                                            $coreFactory = $coreFactory / 5;
                                            echo $coreFactory;
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            $secondaryFactory = 0;
                                            $secondaryFactory = $pembobotanAspekKecerdasan[$key]['konsentrasi']
                                                + $pembobotanAspekKecerdasan[$key]['antisipasi'];
                                            $secondaryFactory = $secondaryFactory / 2;
                                            echo $secondaryFactory;
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            $totalFactory = 0;
                                            $totalFactory = 0.7 * $coreFactory + 0.3 * $secondaryFactory;
                                            echo $totalFactory;
                                            $perhitungan[$key]['kecerdasan'] = $totalFactory;
                                            ?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <!-- TABEL PERHITUNGAN SIKAP KERJA-->
                    <h5 class="text-1" style="margin-left:10%;">Perhitungan Aspek Sikap Kerja</h5>
                    <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Core Factor</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Secondary Factor</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pembobotanAspekSikapKerja as $key => $values) { ?>
                                    <tr>
                                        <td class="text-center text-1 "><?php echo $no; ?></td>
                                        <td class="text-center text-1 "><?php echo $key; ?></td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            $coreFactory = 0;
                                            if (isset($pembobotanAspekSikapKerja[$key]['dorongan_berprestasi'])) {
                                                # code...
                                                $coreFactory = $pembobotanAspekSikapKerja[$key]['dorongan_berprestasi'];
                                                $coreFactory = $coreFactory / 1;
                                            }
                                            echo $coreFactory;
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            $secondaryFactory = 0;
                                            $secondaryFactory = $pembobotanAspekSikapKerja[$key]['vitalitas_perencanaan']
                                                + $pembobotanAspekSikapKerja[$key]['ketelitian_dan_tanggung_jawab'];
                                            $secondaryFactory = $secondaryFactory / 2;
                                            echo $secondaryFactory;
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            $totalFactory = 0;
                                            $totalFactory = 0.7 * $coreFactory + 0.3 * $secondaryFactory;
                                            echo $totalFactory;
                                            $perhitungan[$key]['sikap_kerja'] = $totalFactory;
                                            ?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <!-- TABEL PERHITUNGAN PRILAKU-->
                    <h5 class="text-1" style="margin-left:10%;">Perhitungan Aspek Prilaku</h5>
                    <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Core Factor</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Secondary Factor</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pembobotanAspekPrilaku as $key => $values) { ?>
                                    <tr>
                                        <td class="text-center text-1 "><?php echo $no; ?></td>
                                        <td class="text-center text-1 "><?php echo $key; ?></td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            $coreFactory = 0;
                                            if (isset($pembobotanAspekPrilaku[$key]['steadiness']) && isset($pembobotanAspekPrilaku[$key]['compliance']) && isset($pembobotanAspekPrilaku[$key]['motivasi'])) {
                                                # code...
                                                $coreFactory = $pembobotanAspekPrilaku[$key]['steadiness'] + $pembobotanAspekPrilaku[$key]['compliance'] + $pembobotanAspekPrilaku[$key]['motivasi'];
                                                $coreFactory = $coreFactory / 3;
                                            }
                                            echo $coreFactory;
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            $secondaryFactory = 0;
                                            if (isset($pembobotanAspekPrilaku[$key]['dominance']) && isset($pembobotanAspekPrilaku[$key]['influences'])) {
                                                # code...
                                                $secondaryFactory = $pembobotanAspekPrilaku[$key]['dominance'] + $pembobotanAspekPrilaku[$key]['influences'];
                                                $secondaryFactory = $secondaryFactory / 2;
                                            }
                                            echo $secondaryFactory;
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            $totalFactory = 0;
                                            $totalFactory = 0.7 * $coreFactory + 0.3 * $secondaryFactory;
                                            echo $totalFactory;
                                            $perhitungan[$key]['prilaku'] = $totalFactory;
                                            ?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <!-- TABEL PERENGKINGAN -->
                    <h5 class="text-1" style="margin-left:10%;">RANGKING</h5>
                    <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">Rank</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">NAMA</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Kecerdasan</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Sikap Kerja</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Prilaku</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $rangking = [];
                                foreach ($perhitungan as $key => $values) {
                                    $totalNilai = 0.3 * $perhitungan[$key]['kecerdasan'] + 0.3 * $perhitungan[$key]['sikap_kerja'] + 0.4 * $perhitungan[$key]['prilaku'];
                                    // echo $totalNilai;
                                    $rangking[$key]['kecerdasan'] = $perhitungan[$key]['kecerdasan'];
                                    $rangking[$key]['sikap_kerja'] = $perhitungan[$key]['sikap_kerja'];
                                    $rangking[$key]['prilaku'] = $perhitungan[$key]['prilaku'];
                                    $rangking[$key]['total'] = $totalNilai;
                                }
                                function compareTotal($a, $b)
                                {
                                    return $b['total'] <=> $a['total'];
                                }

                                // Mengurutkan data berdasarkan total tertinggi ke terendah
                                uasort($rangking, 'compareTotal');
                                foreach ($rangking as $nama => $data) {
                                    // echo "Nama: " . $nama . ", Total: " . $data['total'] . PHP_EOL;

                                ?>
                                    <tr>
                                        <td class="text-center text-1 "><?php echo $no; ?></td>
                                        <td class="text-center text-1 "><?php echo $nama; ?></td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            echo $rangking[$nama]['kecerdasan'];
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            echo $rangking[$nama]['sikap_kerja'];
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            echo $rangking[$nama]['prilaku'];
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            echo number_format($rangking[$nama]['total'], 4);
                                            ?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- // Fungsi untuk membandingkan total

                                $no++;
                            
                            // Fungsi untuk membandingkan total -->

                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <!-- ENDING -->

                </div>
                <div id='tableRank' class="tableRank">
                <div id="tableContainer-SPK2" style="margin: 10px; ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">Rank</th>
                                    
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">Nama/Nip</th>
                                    <th class="text-center text-1" style="width:10%; background-color: #404040; color:white;">Jenis Kelamin</th>
                                    <th class="text-center text-1" style="background-color: #404040; color:white;">Golongan</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Kecerdasan</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Sikap Kerja</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Prilaku</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Total</th>
                                    <th class="text-center text-1" style="width:10%;background-color: #404040; color:white;">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                
                                foreach ($rangking as $nama => $data) {
                                    // echo "Nama: " . $nama . ", Total: " . $data['total'] . PHP_EOL;

                                ?>
                                    <tr>
                                        <td class="text-center text-1 "><?php echo $no; ?></td>
                                        <td class="text-center text-1 "><?php echo $nama."<br/>"."Nip: ".$allDataGuruNip[$nama]; ?></td>
                                        <td class="text-center text-1 "><?php echo $allDataGuruJnk[$nama]; ?></td>
                                        <td class="text-center text-1 "><?php echo $allDataGuruGol[$nama]; ?></td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            echo number_format($rangking[$nama]['kecerdasan'], 4);
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            echo number_format($rangking[$nama]['sikap_kerja'], 4);
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            echo number_format($rangking[$nama]['prilaku'], 4);
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            echo number_format($rangking[$nama]['total'], 4);
                                            ?>
                                        </td>
                                        <td class="text-center text-1 ">
                                            <?php
                                            if (number_format($rangking[$nama]['total'], 1) <=1.9 ) {
                                                # code...
                                                echo "sangat buruk";
                                            }else if (number_format($rangking[$nama]['total'], 1) >=2 && number_format($rangking[$nama]['total'], 1) <= 2.9) {
                                                # code...
                                                echo "buruk";
                                            }else if (number_format($rangking[$nama]['total'], 1) >=3 && number_format($rangking[$nama]['total'], 1) <= 3.9) {
                                                # code...
                                                echo "baik";
                                            }else if (number_format($rangking[$nama]['total'], 1) >=4 && number_format($rangking[$nama]['total'], 1) <= 5) {
                                                # code...
                                                echo "Sangat Baik";
                                            }else{
                                                echo "-";
                                            }
                                            // echo number_format($rangking[$nama]['total'], 4);
                                            ?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- // Fungsi untuk membandingkan total

                                $no++;
                            
                            // Fungsi untuk membandingkan total -->

                                <!-- ------------------ -->
                            </tbody>
                        </table>
                    </div>
                    <!-- ----- -->
                    <!-- ENDING -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var detailBTN = document.getElementById('btdetail');
    var kembaliBTN = document.getElementById('btkembali');
    
    var tableContainerPKG = document.getElementById('tableContainerPKG');
    var tableRank = document.getElementById('tableRank');
    detailBTN.addEventListener('click',function () {
        tableContainerPKG.style.display = "block";
        tableRank.style.display = "none";
        kembaliBTN.style.display = "block";
        detailBTN.style.display = "none";
    });
    kembaliBTN.addEventListener('click',function () {
        tableContainerPKG.style.display = "none";
        tableRank.style.display = "block";
        detailBTN.style.display = "block";
        kembaliBTN.style.display = "none";
    })
</script>