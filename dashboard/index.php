<?php
include "../db/koneksi.php";
include "akses.php";
$activePage = 'dashboard';
include "layout/header.php";

// get database guru
$queryGuru = mysqli_query($konek, "SELECT * FROM identitas_guru ");
// $data=mysqli_fetch_array($queryGuru);
$queryGuruMataPelajaran = mysqli_query($konek, "SELECT * FROM identitas_guru WHERE mata_pelajaran!='' AND mata_pelajaran!='bk' ");
$queryGuruPembimbing = mysqli_query($konek, "SELECT * FROM identitas_guru WHERE mata_pelajaran='bk' ");
$totalDataGuru = mysqli_num_rows($queryGuru);
$totalDataGuruPelajaran = mysqli_num_rows($queryGuruMataPelajaran);
$totalDataGuruPembimbing = mysqli_num_rows($queryGuruPembimbing);
?>
<div id="all-content" class="container-fluid">
	<div class="row" style="margin-top: -0px;">
		<div class="col-lg-2">
			<?php include "layout/side_menu.php" ?>
		</div>
		<div class="col-lg-10 py-3" style="margin-left: -10px;">
			<div class="container-1">
				<h4 class="text-1" style="margin:10px;"> Beranda</h4>
				<!-- content 1 -->
				<div class="container" style="height:100px; margin-bottom: 80px;">
					<div class="row justify-content-md-center">
						<div class="col text-1 container-grid" style="background-color:#333841;">
							<div class="row">
								<div class="col d-flex flex-column align-items-center">
									<div class="profile-icon">
										<i class="fas fa-user fa-3x"></i>
									</div>
									<span class="mt-2 fw-bold" style="font-size: 1.2rem;">Jumlah Guru</span>
									<span class="mt-1" style="font-size: 1.5rem;"><?php echo $totalDataGuru; ?></span>
								</div>
							</div>
						</div>
						<div class="col text-1 container-grid" style="background-color:#333841;">

							<div class="row">
								<div class="col d-flex flex-column align-items-center">
									<div class="profile-icon">
										<i class="fas fa-user fa-3x"></i>
									</div>
									<span class="mt-2 fw-bold" style="font-size: 1.2rem;">Guru Mata Pelajaran</span>
									<span class="mt-1" style="font-size: 1.5rem;"><?php echo $totalDataGuruPelajaran; ?></span>
								</div>
							</div>

						</div>
						<div class="col text-1 container-grid" style="background-color:#333841;">
							<div class="row">
								<div class="col d-flex flex-column align-items-center">
									<div class="profile-icon">
										<i class="fas fa-user fa-3x"></i>
									</div>
									<span class="mt-2 fw-bold" style="font-size: 1.2rem;">Guru Pembimbing</span>
									<span class="mt-1" style="font-size: 1.5rem;"><?php echo $totalDataGuruPembimbing; ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- content 2 -->
				<div class="row">
					<div class="col text-center">
						<img src="../assets/images/logo_smk2kotajambi.png" style="height: 50%;width: 100%;">
					</div>
					<div class="col-3">
						<h2 class="text-1">Visi</h2>
						<h6 class="text-1">Visi SMK Negeri 2 Kota Jambi adalah sebagai berikut “Terwujudnya peserta didik yang berkarakter, mandiri, kreatif, berprestasi dan berwawasan global”</h6>
					</div>
					<div class="col-6" style="margin-left:10px; margin-right: 10px;">
						<h2 class="text-1">MISI</h2>
						<ol class="text-1">
							<li>
								<h6 class="text-1">Mewujudkan lulusan yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa</h6>
							</li>
							<li>
								<h6 class="text-1">Mengembangkan pembelajaran berbasis pendidikan karakter</h6>
							</li>
							<li>
								<h6 class="text-1">Menumbuh kembangkan jiwa berwirausaha siswa</h6>
							</li>
							<li>
								<h6 class="text-1">Mewujudkan siswa yang tangguh, pantang menyerah, dan mampu menghadapi tantangan</h6>
							</li>
							<li>
								<h6 class="text-1">Mengembangkan rasa tanggung jawab, rasa sosial, serta rasa saling menghargai antar warga sekolah</h6>
							</li>
							<li>
								<h6 class="text-1">Mengadakan program kegiatan yang mengembangkan kreativitas serta kemandirian</h6>
							</li>
							<li>
								<h6 class="text-1">Menyelenggarakan pendidikan berbasis TIK</h6>
							</li>
							<li>
								<h6 class="text-1">Memberdayakan potensi kecerdasan intelektual, kecerdasan emosional, kecerdasan sosial, dan kecerdasan religius siswa</h6>
							</li>
							<li>
								<h6 class="text-1">Menjalin kerja sama dengan pihak lain untuk merealisasikan program sekolah</h6>
							</li>
							<li>
								<h6 class="text-1">Meningkatkan layanan dalam proses pembelajaran berbasis Teknologi Informasi</h6>
							</li>
						</ol>
					</div>
				</div>
				<!-- ------------------------------ -->
			</div>
		</div>
	</div>
</div>
<?php
include "layout/footer.php" ?>