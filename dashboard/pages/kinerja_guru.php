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
				<?php if (!isset($_GET['id_guru'])) { ?>

					<h1 class="text-1" style="margin:10px;">DATA GURU</h1>
					<div id="tableContainer" style="margin: 10px; ">
						<form action="" method="GET">
							<div class="container">
								<div class="row row-cols-auto" style="margin:10px;">
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
											<i class="icon-search"></i> Cari
										</button>
									</div>
								</div>
						</form>
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
									<th class="text-center text-1" style="background-color: #404040; color:white;">TELEPON</th>
									<th class="text-center text-1" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;" colspan="2">PKG/LAPORAN</th>
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
										
										<td class="text-center text-1" style="width:5%;">
											<a href="../kinerja/guru?id_guru=<?PHP echo $dataGuru['id_guru'] ?>" type="submit" class="btn" style=" border-color: white;border-radius: 5px; background-color: #999999;"><i class="fas fa-edit" style="color:white;"></i></a>
										</td>
										
										<td class="text-center" style="width:5%;">
											<a href="../laporan?id_guru=<?PHP echo $dataGuru['id_guru'] ?>" type="submit" class="btn" style=" border-color: white;border-radius: 5px; background-color: #0099cc;"><i class="fas fa-book" style="color:white;"></i></a>
											<!-- <form action="prosses.php?tipe=hapus_guru" method="post" class="form-container"  autocomplete="false">
												<input type="hidden" name="id_guru" value=<?php echo $dataGuru['id_guru']; ?>>
												<button class="btn" type="submit" style=" border-color: white;border-radius: 5px; background-color: #0099cc;"><i class="fas fa-book" style="color:white;"></i> </button>
											</form> -->
										</td>
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
					<!-- #################################################################################### -->
					<!-- Bagian Pertanyaan -->
				<?php } else { ?>
					<?php
					$queryDataKinerjaGuru = mysqli_query($konek, "SELECT * FROM identitas_guru WHERE id_guru=" . $_GET['id_guru']);
					while ($dataKinerjaGuru = mysqli_fetch_array($queryDataKinerjaGuru)) {
						$queryDataPendagogikKinerjaGuru = mysqli_query($konek, "SELECT * FROM pkg_pendagogik WHERE guru=" . $_GET['id_guru']);
						$queryDataKepribadianKinerjaGuru = mysqli_query($konek, "SELECT * FROM pkg_kepribadian WHERE guru=" . $_GET['id_guru']);
						$queryDataSosialKinerjaGuru = mysqli_query($konek, "SELECT * FROM pkg_sosial WHERE guru=" . $_GET['id_guru']);
						$queryDataProfesionalKinerjaGuru = mysqli_query($konek, "SELECT * FROM pkg_Profesional WHERE guru=" . $_GET['id_guru']);
						$queryDataPrestasiKinerjaGuru = mysqli_query($konek, "SELECT * FROM pkg_prestasi WHERE guru=" . $_GET['id_guru']);
					?>

						<div class="ContainerPKG" id="ContainerPKG" style="display: block;">
							<div style="background-color: #0099cc; border-radius: 4px; padding:10px; margin-top: 10px; margin-left: 10px; width:120px;">
							<a href="../kinerja/guru">
								<h5 class="text-1"><i class="fas fa-arrow-left"></i>KEMBALI</h5>
							</a>
							</div>
							<!-- <button class="btn" id="kembali-table"><h5 class="text-1"><i class="fas fa-arrow-left"></i>KEMBALI</h5></button> -->
							<form action="../prosses.php?tipe=pkg" method="post" enctype="multipart/form-data" autocomplete="false">
								<input type="hidden" name="id_guru" value=<?php echo $dataKinerjaGuru['id_guru']; ?>>
								<div style="text-align: center;">
									<img alt="Foto Guru" src=<?php echo "http://localhost/smkn2kotajambi/assets/images/guru/" . $dataKinerjaGuru['foto']; ?> style="width: 100px; height: 100px;">
									<h3><?php echo "" . $dataKinerjaGuru['nama']; ?></h3>
								</div>
								<div class="kompetensi">
									<h3>PENDAGOGIK</h3>
								<!-- SISTEMATIKA BERPIKIR -->
								<div class="kompetensi" id="kompetensi-1">
									<button type="button" id="1" style="background: none;border: none;
										padding: 10px 20px;
										font: inherit;
										cursor: pointer;
										border-radius: 5px;">
										<h6 class="title-kompetensi text-1">SISTEMATIKA BERPIKIR
											<?php
											if ($queryDataPendagogikKinerjaGuru) {
												// Mengambil satu baris data
												$row = mysqli_fetch_assoc($queryDataPendagogikKinerjaGuru);

												// Memeriksa apakah ada data yang ditemukan
												if ($row) {
													// Mengakses data dari setiap kolom
													$kompetensi = $row['kompetensi_1'];
													echo "(" . $kompetensi . "%)";
													// ... tambahkan kolom lainnya sesuai kebutuhan
												} else {
													echo "(50%)";
												}
											} else {
												echo "(50%)";
											}
											?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-1">

										<p style="margin-left:10px;">1. Seberapa efektif guru dalam menjelaskan konsep-konsep yang sulit?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-1-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-1-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-1-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-1-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Apakah Anda merasa ada cukup dukungan dan bimbingan dari guru dalam memahami konsep-konsep sulit?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-1-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-1-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-1-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-1-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3.
										Seberapa baik Anda dapat berkolaborasi dengan teman-teman Anda dalam memahami materi pelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-1-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-1-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-1-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-1-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">4. Bagaimana perasaan Anda terkait dengan pembelajaran ini secara keseluruhan?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-1-4" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-1-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-1-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-1-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>
									</div>
								</div>
								<!-- ------------------------------------------------------------------------------------------------------------------------ -->

								<div class="kompetensi" id="kompetensi-2">
									<button type="button" id="2" style="background: none;border: none;
										padding: 10px 20px;
										font: inherit;
										cursor: pointer;
										border-radius: 5px;">
										<h6 class="title-kompetensi text-1">PENALARAN DAN KONDISI REAL
											<?php
											if ($queryDataPendagogikKinerjaGuru) {
												// Mengambil satu baris data
												$row = mysqli_fetch_assoc($queryDataPendagogikKinerjaGuru);

												// Memeriksa apakah ada data yang ditemukan
												if ($row) {
													// Mengakses data dari setiap kolom
													$kompetensi = $row['kompetensi_2'];
													echo "(" . $kompetensi . "%)";
													// ... tambahkan kolom lainnya sesuai kebutuhan
												} else {
													echo "(50%)";
												}
											} else {
												echo "(50%)";
											}
											?> <i class="fas fa-arrow-down"></i></h6>
									</button>

									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-2">

										<p style="margin-left:10px;">1. Sejauh mana guru memberikan penjelasan yang jelas dan mudah dipahami selama pelajaran?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-2-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-2-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-2-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-2-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>

										</div>

										<p style="margin-left:10px;">2. Sejauh mana Anda merasa kemampuan penalaran Anda telah berkembang selama mengikuti program pendidikan ini ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-2-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-2-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-2-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-2-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3. Apakah Anda merasa diberi dukungan yang cukup dari guru dalam mengembangkan kemampuan penalaran Anda?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-2-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-2-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-2-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-2-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">4. Sejauh mana Anda merasa mata pelajaran ini mempersiapkan Anda untuk menghadapi tantangan penalaran dalam kehidupan nyata ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-2-4" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-2-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-2-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-2-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>


									</div>
								</div>
								<!-- ------------------------------------------------------------------------------------------------- -->

								<div class="kompetensi" id="kompetensi-3">
									<button type="button" id="3" style="background: none;border: none;
										padding: 10px 20px;
										font: inherit;
										cursor: pointer;
										border-radius: 5px;">
										<h6 class="title-kompetensi text-1">KONSENTRASI
											<?php
											if ($queryDataPendagogikKinerjaGuru) {
												// Mengambil satu baris data
												$row = mysqli_fetch_assoc($queryDataPendagogikKinerjaGuru);

												// Memeriksa apakah ada data yang ditemukan
												if ($row) {
													// Mengakses data dari setiap kolom
													$kompetensi = $row['kompetensi_3'];
													echo "(" . $kompetensi . "%)";
													// ... tambahkan kolom lainnya sesuai kebutuhan
												} else {
													echo "(50%)";
												}
											} else {
												echo "(50%)";
											}
											?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-3">

										<p style="margin-left:10px;">1. Seberapa efektif guru dalam menggunakan teknik dan alat bantu pembelajaran untuk meningkatkan konsentrasi siswa ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-3-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-3-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-3-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-3-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Sejauh mana guru memberikan umpan balik (feedback) yang membantu siswa untuk tetap fokus pada tujuan pembelajaran?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-3-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-3-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-3-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-3-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3. Seberapa baik kemampuan guru dalam menjelaskan materi pelajaran agar mudah dipahami oleh siswa?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-3-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-3-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-3-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-3-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">4. Seberapa baik guru dalam membimbing siswa untuk mengatasi gangguan eksternal selama proses pembelajaran?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-3-4" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-3-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-3-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-3-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

									</div>
								</div>

								<div class="kompetensi" id="kompetensi-4">
									<button type="button" id="4" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">LOGIKA PRAKTIS
											<?php
											if ($queryDataPendagogikKinerjaGuru) {
												// Mengambil satu baris data
												$row = mysqli_fetch_assoc($queryDataPendagogikKinerjaGuru);

												// Memeriksa apakah ada data yang ditemukan
												if ($row) {
													// Mengakses data dari setiap kolom
													$kompetensi = $row['kompetensi_4'];
													echo "(" . $kompetensi . "%)";
													// ... tambahkan kolom lainnya sesuai kebutuhan
												} else {
													echo "(50%)";
												}
											} else {
												echo "(50%)";
											}
											?> <i class="fas fa-arrow-down"></i></h6>
									</button>

									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-4">

										<p style="margin-left:10px;">1. Sejauh mana keterampilan komunikasi guru dalam menjelaskan materi?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-4-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-4-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-4-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-4-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Seberapa efektif penggunaan bahan ajar (buku, slide, materi online) dalam mendukung pembelajaran Anda ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-4-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-4-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-4-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-4-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3. Seberapa baik penilaian (ujian, tugas, proyek) membantu Anda memahami materi secara lebih mendalam ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-4-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-4-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-4-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-4-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>
									</div>
								</div>
								<!-- --------------------------------------------------------------------------------------------------- -->

								<div class="kompetensi" id="kompetensi-5">
									<button type="button" id="5" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">FLEKSIBILTAS BERPIKIR
											<?php
											if ($queryDataPendagogikKinerjaGuru) {
												// Mengambil satu baris data
												$row = mysqli_fetch_assoc($queryDataPendagogikKinerjaGuru);

												// Memeriksa apakah ada data yang ditemukan
												if ($row) {
													// Mengakses data dari setiap kolom
													$kompetensi = $row['kompetensi_5'];
													echo "(" . $kompetensi . "%)";
													// ... tambahkan kolom lainnya sesuai kebutuhan
												} else {
													echo "(50%)";
												}
											} else {
												echo "(50%)";
											}
											?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-5">

										<p style="margin-left:10px;">1. Seberapa sering Anda mencoba berbagai cara untuk menyelesaikan masalah yang sulit di sekolah ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-5-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-5-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-5-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-5-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Apakah Anda merasa nyaman mencoba pendekatan baru dalam pembelajaran, meskipun itu berbeda dari yang biasanya Anda lakukan ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-5-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-5-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-5-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-5-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3. Sejauh mana Anda percaya bahwa guru Anda memberikan Anda kesempatan untuk mengembangkan fleksibilitas berpikir Anda dalam pembelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-5-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-5-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-5-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-5-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">4. Bagaimana guru Anda merespons ide-ide kreatif atau cara berpikir yang berbeda dari Anda dalam pembelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-5-4" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-5-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-5-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-5-4" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

									</div>
								</div>
								<!-- ----------------------------------------------------------------------------------------- -->

								<div class="kompetensi" id="kompetensi-6">
									<button type="button" id="6" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">IMAJINASI KREATIF
											<?php
											if ($queryDataPendagogikKinerjaGuru) {
												// Mengambil satu baris data
												$row = mysqli_fetch_assoc($queryDataPendagogikKinerjaGuru);

												// Memeriksa apakah ada data yang ditemukan
												if ($row) {
													// Mengakses data dari setiap kolom
													$kompetensi = $row['kompetensi_6'];
													echo "(" . $kompetensi . "%)";
													// ... tambahkan kolom lainnya sesuai kebutuhan
												} else {
													echo "(50%)";
												}
											} else {
												echo "(50%)";
											}
											?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-6">

										<p style="margin-left:10px;">1. Bagaimana pendapatmu tentang tingkat dukungan guru dalam mengembangkan ide-ide kreatif dalam pembelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-6-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-6-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-6-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-6-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Apakah guru kamu mendorong kamu untuk berpikir di luar kotak ketika menyelesaikan tugas-tugas atau proyek-proyek ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-6-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-6-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-6-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-6-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3. Seberapa sering kamu merasa kamu memiliki kebebasan untuk mengeksplorasi ide-ide baru dalam pelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-6-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-6-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-6-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-6-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

									</div>
								</div>
								<!-- ------------------------------------------------------------------------------------------------- -->

								<div class="kompetensi" id="kompetensi-7">
									<button type="button" id="7" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">ANTISIPASI
											<?php
											if ($queryDataPendagogikKinerjaGuru) {
												// Mengambil satu baris data
												$row = mysqli_fetch_assoc($queryDataPendagogikKinerjaGuru);

												// Memeriksa apakah ada data yang ditemukan
												if ($row) {
													// Mengakses data dari setiap kolom
													$kompetensi = $row['kompetensi_7'];
													echo "(" . $kompetensi . "%)";
													// ... tambahkan kolom lainnya sesuai kebutuhan
												} else {
													echo "(50%)";
												}
											} else {
												echo "(50%)";
											}
											?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-7">

										<p style="margin-left:10px;">1. Seberapa baik Anda merasa persiapan pelajaran dan materi yang disampaikan oleh guru ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-7-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-7-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-7-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-7-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Sejauh mana Anda merasa guru telah mengantisipasi pertanyaan atau kebingungan yang mungkin timbul selama pembelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-7-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-7-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-7-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-7-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3. Bagaimana penilaian Anda terhadap kemampuan guru dalam mengantisipasi dan mengatasi masalah kelas yang muncul ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-7-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-7-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-7-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-7-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

									</div>
								</div>

								</div>
								<div class="kompetensi">
									<h3>KEPRIBADIAN</h3>
								<div class="kompetensi" id="kompetensi-8">
									<button type="button" id="8" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">KETELITIAN DAN TANGGUNG JAWAB
											<?php
											if ($queryDataKepribadianKinerjaGuru) {
												// Mengambil satu baris data
												$row = mysqli_fetch_assoc($queryDataKepribadianKinerjaGuru);

												// Memeriksa apakah ada data yang ditemukan
												if ($row) {
													// Mengakses data dari setiap kolom
													$kompetensi = $row['kompetensi_1'];
													echo "(" . $kompetensi . "%)";
													// ... tambahkan kolom lainnya sesuai kebutuhan
												} else {
													echo "(50%)";
												}
											} else {
												echo "(50%)";
											}
											?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-8">

										<p style="margin-left:10px;">1. Bagaimana pendapat Anda tentang kesiapan guru dalam memberikan materi pelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-8-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-8-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-8-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-8-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Sejauh mana guru memberikan penjelasan yang jelas dan lengkap terkait tugas atau materi pelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-8-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-8-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-8-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-8-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3. Bagaimana pendapat Anda tentang kemampuan guru dalam mengatasi masalah atau kesulitan belajar Anda ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-8-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-8-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-8-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-8-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

									</div>
								</div>

								<!-- ----------------------------------------------------- -->
								<div class="kompetensi" id="kompetensi-9">
									<button type="button" id="9" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">DORONGAN BERPRESTASI <?php
																														if ($queryDataKepribadianKinerjaGuru) {
																															// Mengambil satu baris data
																															$row = mysqli_fetch_assoc($queryDataKepribadianKinerjaGuru);

																															// Memeriksa apakah ada data yang ditemukan
																															if ($row) {
																																// Mengakses data dari setiap kolom
																																$kompetensi = $row['kompetensi_2'];
																																echo "(" . $kompetensi . "%)";
																																// ... tambahkan kolom lainnya sesuai kebutuhan
																															} else {
																																echo "(50%)";
																															}
																														} else {
																															echo "(50%)";
																														}
																														?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-9">

										<p style="margin-left:10px;">1. Apakah Anda merasa bahwa guru-guru Anda mendorong Anda untuk mencapai potensi terbaik Anda dalam pelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-9-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-9-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-9-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-9-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Bagaimana pendekatan guru dalam memberikan bantuan tambahan atau penjelasan jika Anda mengalami kesulitan dalam memahami materi pelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-9-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-9-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-9-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-9-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3. Sejauh mana Anda merasa dihargai oleh guru-guru Anda ketika Anda mencapai prestasi yang baik dalam pelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-9-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-9-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-9-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-9-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

									</div>
								</div>
								<!-- ---------------------------------------------------------------------------------------------------- -->

								<div class="kompetensi" id="kompetensi-10">
									<button type="button" id="10" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">VITALITAS DAN PERENCANAAN <?php
																																				if ($queryDataKepribadianKinerjaGuru) {
																																					// Mengambil satu baris data
																																					$row = mysqli_fetch_assoc($queryDataKepribadianKinerjaGuru);

																																					// Memeriksa apakah ada data yang ditemukan
																																					if ($row) {
																																						// Mengakses data dari setiap kolom
																																						$kompetensi = $row['kompetensi_3'];
																																						echo "(" . $kompetensi . "%)";
																																						// ... tambahkan kolom lainnya sesuai kebutuhan
																																					} else {
																																						echo "(50%)";
																																					}
																																				} else {
																																					echo "(50%)";
																																				}
																																				?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-10">

										<p style="margin-left:10px;">1. Seberapa sering guru Anda datang tepat waktu ke kelas ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-10-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-10-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-10-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-10-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Seberapa sering guru Anda terlihat antusias dan bersemangat saat mengajar ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-10-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-10-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-10-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-10-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3. Apakah Anda merasa guru Anda telah merencanakan pelajaran dengan baik ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-10-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-10-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-10-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-10-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

									</div>
								</div>
								<!-- ------------------------------------------------------------------------------------------------------------- -->
								
								</div>
								
								<div class="kompetensi">
									<h3>SOSIAL</h3>
								<div class="kompetensi" id="kompetensi-11">
									<button type="button" id="11" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">DOMINANCE(KEKUASAAN) <?php
																																				if ($queryDataSosialKinerjaGuru) {
																																					// Mengambil satu baris data
																																					$row = mysqli_fetch_assoc($queryDataSosialKinerjaGuru);

																																					// Memeriksa apakah ada data yang ditemukan
																																					if ($row) {
																																						// Mengakses data dari setiap kolom
																																						$kompetensi = $row['kompetensi_1'];
																																						echo "(" . $kompetensi . "%)";
																																						// ... tambahkan kolom lainnya sesuai kebutuhan
																																					} else {
																																						echo "(50%)";
																																					}
																																				} else {
																																					echo "(50%)";
																																				}
																																				?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-11">

										<p style="margin-left:10px;">1. Bagaimana pendekatan guru terhadap siswa yang kesulitan dalam memahami materi pelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-11-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-11-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-11-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-11-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Seberapa baik guru memberikan umpan balik (feedback) yang konstruktif kepada siswa ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-11-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-11-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-11-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-11-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3.
										Bagaimana kemampuan guru dalam menjaga disiplin siswa di dalam kelas?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-11-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-11-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-11-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-11-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>
									</div>
								</div>

								<div class="kompetensi" id="kompetensi-12">
									<button type="button" id="12" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">Influences (Pengaruh) <?php
																																											if ($queryDataSosialKinerjaGuru) {
																																												// Mengambil satu baris data
																																												$row = mysqli_fetch_assoc($queryDataSosialKinerjaGuru);

																																												// Memeriksa apakah ada data yang ditemukan
																																												if ($row) {
																																													// Mengakses data dari setiap kolom
																																													$kompetensi = $row['kompetensi_2'];
																																													echo "(" . $kompetensi . "%)";
																																													// ... tambahkan kolom lainnya sesuai kebutuhan
																																												} else {
																																													echo "(50%)";
																																												}
																																											} else {
																																												echo "(50%)";
																																											}
																																											?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-12">

										<p style="margin-left:10px;">1. Seberapa sering guru Anda menghadirkan pelajaran dengan semangat dan antusiasme yang tinggi ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-12-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-12-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-12-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-12-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Bagaimana respons guru terhadap pertanyaan atau kebutuhan Anda di luar jam pelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-12-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-12-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-12-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-12-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3.
										Bagaimana sikap guru Anda terhadap siswa sebagai individu ?
										</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-12-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-12-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-12-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-12-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

									</div>
								</div>
								</div>
								
								<div class="kompetensi">
									<h3>PROFESIONAL</h3>
								<div class="kompetensi" id="kompetensi-13">
									<button type="button" id="13" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">Steadiness (Keteguhan Hati) <?php
																																													if ($queryDataProfesionalKinerjaGuru) {
																																														// Mengambil satu baris data
																																														$row = mysqli_fetch_assoc($queryDataProfesionalKinerjaGuru);

																																														// Memeriksa apakah ada data yang ditemukan
																																														if ($row) {
																																															// Mengakses data dari setiap kolom
																																															$kompetensi = $row['kompetensi_1'];
																																															echo "(" . $kompetensi . "%)";
																																															// ... tambahkan kolom lainnya sesuai kebutuhan
																																														} else {
																																															echo "(50%)";
																																														}
																																													} else {
																																														echo "(50%)";
																																													}
																																													?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-13">

										<p style="margin-left:10px;">1. Sejauh mana Anda merasa bahwa guru Anda konsisten dalam memberikan pelajaran ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-13-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-13-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-13-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-13-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Bagaimana pendapat Anda tentang kemampuan guru untuk menjaga ketenangan saat menghadapi situasi sulit di kelas ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-13-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-13-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-13-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-13-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3.
										Sejauh mana guru Anda dapat diandalkan dalam mematuhi jadwal pelajaran dan tugas-tugas yang telah ditetapkan ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-13-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-13-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-13-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-13-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

									</div>
								</div>
								<!-- ------------------------------------------------------------------------------------------------------------ -->


								<div class="kompetensi" id="kompetensi-14">
									<button type="button" id="14" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">Compliance (Pemenuhan) <?php
																																			if ($queryDataProfesionalKinerjaGuru) {
																																				// Mengambil satu baris data
																																				$row = mysqli_fetch_assoc($queryDataProfesionalKinerjaGuru);

																																				// Memeriksa apakah ada data yang ditemukan
																																				if ($row) {
																																					// Mengakses data dari setiap kolom
																																					$kompetensi = $row['kompetensi_2'];
																																					echo "(" . $kompetensi . "%)";
																																					// ... tambahkan kolom lainnya sesuai kebutuhan
																																				} else {
																																					echo "(50%)";
																																				}
																																			} else {
																																				echo "(50%)";
																																			}
																																			?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-14" style="display: none;">

										<p style="margin-left:10px;">1. Bagaimana penilaian Anda terhadap keterlibatan guru dalam memastikan siswa hadir secara teratur di kelas ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-14-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-14-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-14-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-14-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">2. Sejauh mana guru-guru mendukung suasana belajar yang disiplin di kelas ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-14-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-14-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-14-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-14-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

										<p style="margin-left:10px;">3. Bagaimana pendapat Anda tentang ketepatan waktu guru dalam memberikan tugas dan mengumumkan jadwal ujian ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-14-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-14-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-14-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-14-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>

									</div>
								</div>
								<!-- ---------------------------------------------------------------------------------------------------------- -->
								</div>
								<div class="kompetensi">
									<h3>PRESTASI</h3>																											
								<div class="kompetensi" id="kompetensi-15">
									<button type="button" id="15" style="background: none;border: none;
									padding: 10px 20px;
									font: inherit;
									cursor: pointer;
									border-radius: 5px;">
										<h6 class="title-kompetensi text-1">MOTIVASI <?php
																															if ($queryDataPrestasiKinerjaGuru) {
																																// Mengambil satu baris data
																																$row = mysqli_fetch_assoc($queryDataPrestasiKinerjaGuru);

																																// Memeriksa apakah ada data yang ditemukan
																																if ($row) {
																																	// Mengakses data dari setiap kolom
																																	$kompetensi = $row['kompetensi_1'];
																																	echo "(" . $kompetensi . "%)";
																																	// ... tambahkan kolom lainnya sesuai kebutuhan
																																} else {
																																	echo "(50%)";
																																}
																															} else {
																																echo "(50%)";
																															}
																															?> <i class="fas fa-arrow-down"></i></h6>
									</button>
									<div class="container-pertanyaan-all" id="container-pertanyaan-kompetensi-15" style="display: none;">

										<p style="margin-left:10px;">1. Seberapa sering guru memberikan pujian atau pengakuan kepada siswa yang berhasil?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-15-1" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-15-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-15-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-15-1" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>
										<p style="margin-left:10px;">2. Sejauh mana guru mendukung siswa dalam mengejar tujuan akademik mereka ?</p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-15-2" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-15-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-15-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-15-2" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>
										<p style="margin-left:10px;">3. Apakah guru memberikan dorongan dan dukungan kepada siswa untuk mengejar minat dan hobi mereka di luar jam pelajaran ? </p>
										<div class="pilihan-pertanyaan">
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="pertanyaan-kompetensi-15-3" id="radio-1" value="1" checked>
												<label class="form-check-label text-1" for="radio-1">Buruk</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="2" name="pertanyaan-kompetensi-15-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Cukup</label>
											</div>
											
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="3" name="pertanyaan-kompetensi-15-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik</label>
											</div>
											<div class="form-check form-check-inline ms-3">
												<input type="radio" class="form-check-input" value="4" name="pertanyaan-kompetensi-15-3" id="radio-2">
												<label class="form-check-label text-1" for="radio-2">Baik Sekali</label>
											</div>
										</div>
									</div>
									
								</div>
								</div>

								<div style="text-align:right;">
									<input id="formInput" type="submit" value="Simpan" name="simpan" style="width:25%; margin-bottom:10px;margin-right:10px;" />
								</div>

							</form>
						</div>


				<?php }
				} ?>


				<!-- #################################################################################### -->
			</div>
		</div>
	</div>
</div>
<script>
	var kompetensi_1 = document.getElementById("1");
	var kompetensi_2 = document.getElementById("2");
	var kompetensi_3 = document.getElementById("3");
	var kompetensi_4 = document.getElementById("4");
	var kompetensi_5 = document.getElementById("5");
	var kompetensi_6 = document.getElementById("6");
	var kompetensi_7 = document.getElementById("7");
	var kompetensi_8 = document.getElementById("8");
	var kompetensi_9 = document.getElementById("9");
	var kompetensi_10 = document.getElementById("10");
	var kompetensi_11 = document.getElementById("11");
	var kompetensi_12 = document.getElementById("12");
	var kompetensi_13 = document.getElementById("13");
	var kompetensi_14 = document.getElementById("14");
	var kompetensi_15 = document.getElementById("15");


	var container_kompetensi_1 = document.getElementById("container-pertanyaan-kompetensi-1");
	var container_kompetensi_2 = document.getElementById("container-pertanyaan-kompetensi-2");
	var container_kompetensi_3 = document.getElementById("container-pertanyaan-kompetensi-3");
	var container_kompetensi_4 = document.getElementById("container-pertanyaan-kompetensi-4");
	var container_kompetensi_5 = document.getElementById("container-pertanyaan-kompetensi-5");
	var container_kompetensi_6 = document.getElementById("container-pertanyaan-kompetensi-6");
	var container_kompetensi_7 = document.getElementById("container-pertanyaan-kompetensi-7");
	var container_kompetensi_8 = document.getElementById("container-pertanyaan-kompetensi-8");
	var container_kompetensi_9 = document.getElementById("container-pertanyaan-kompetensi-9");
	var container_kompetensi_10 = document.getElementById("container-pertanyaan-kompetensi-10");
	var container_kompetensi_11 = document.getElementById("container-pertanyaan-kompetensi-11");
	var container_kompetensi_12 = document.getElementById("container-pertanyaan-kompetensi-12");
	var container_kompetensi_13 = document.getElementById("container-pertanyaan-kompetensi-13");
	var container_kompetensi_14 = document.getElementById("container-pertanyaan-kompetensi-14");
	var container_kompetensi_15 = document.getElementById("container-pertanyaan-kompetensi-15");

	kompetensi_1.addEventListener('click', function() {
		toggleKompetensi(0);

		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";
	});
	kompetensi_2.addEventListener('click', function() {
		toggleKompetensi(1);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});
	kompetensi_3.addEventListener('click', function() {
		toggleKompetensi(2);

		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";
	});
	kompetensi_4.addEventListener('click', function() {
		toggleKompetensi(3);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});
	kompetensi_5.addEventListener('click', function() {
		toggleKompetensi(4);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});
	kompetensi_6.addEventListener('click', function() {
		toggleKompetensi(5);

		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";
	});
	kompetensi_7.addEventListener('click', function() {
		toggleKompetensi(6);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});
	kompetensi_8.addEventListener('click', function() {
		toggleKompetensi(7);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});
	kompetensi_9.addEventListener('click', function() {
		toggleKompetensi(8);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});
	kompetensi_10.addEventListener('click', function() {
		toggleKompetensi(9);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});
	kompetensi_11.addEventListener('click', function() {
		toggleKompetensi(10);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});
	kompetensi_12.addEventListener('click', function() {
		toggleKompetensi(11);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});
	kompetensi_13.addEventListener('click', function() {
		toggleKompetensi(12);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});
	kompetensi_14.addEventListener('click', function() {
		toggleKompetensi(13);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});

	kompetensi_15.addEventListener('click', function() {
		toggleKompetensi(14);
		var tinggiBody = document.body.clientHeight;
		document.getElementById("side-menu").style.height = tinggiBody + "px";

	});

	function toggleKompetensi(selectedKompetensi) {

		var kompetensiList = [container_kompetensi_1, container_kompetensi_2, container_kompetensi_3, container_kompetensi_4, container_kompetensi_5, container_kompetensi_6, container_kompetensi_7, container_kompetensi_8,
			container_kompetensi_9, container_kompetensi_10, container_kompetensi_11, container_kompetensi_12, container_kompetensi_13,
			container_kompetensi_14,
			container_kompetensi_15
		];

		for (var i = 0; i < kompetensiList.length; i++) {
			var kompetensi = kompetensiList[i];

			if (kompetensi) {
				if (selectedKompetensi === i) {
					if (kompetensi.style.display == "") {
						kompetensi.style.display = "block";
					} else {
						kompetensi.style.display = "";
					}
				} else {
					kompetensi.style.display = "none";
				}
			}
		}
	}
</script>
<script>
	var tinggiBody = document.body.clientHeight;
	document.getElementById("side-menu").style.height = tinggiBody + "px";
</script>
<?php
include "../layout/footer.php" ?>