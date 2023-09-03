<?php
include "../../db/koneksi.php";
include "../akses.php";
$activePage = 'profilPengguna';
include "../layout/header.php";

// get database guru
$queryUser = mysqli_query($konek, "SELECT * FROM user WHERE id_user=" . $_SESSION['id_user']); ?>
<div id="all-content" class="container-fluid">
	<div class="row" style="margin-top: -0px;">
		<div class="col-lg-2">
			<?php include "../layout/side_menu.php" ?>
		</div>
		<div class="col-lg-10 py-3" style="margin-left: -10px;">
			<?php
			$queryDataProfilUser = mysqli_query($konek, "SELECT * FROM profil_user WHERE user=" . $_SESSION['id_user']);

			$nip = '';
			$nama = '';
			$foto = '';
			$alamat = '';
			$telepon = '';
			$tgl_lahir = '';
			$jabatan = '';
			$jenis_kelamin = '';
			$golongan = '';
			$pendidikan = '';
			if (mysqli_num_rows($queryDataProfilUser) == 1) {
				while ($DataProfilUser = mysqli_fetch_array($queryDataProfilUser)) {
					$nip = $DataProfilUser['nip'];
					$nama = $DataProfilUser['nama'];
					$foto = $DataProfilUser['foto'];
					$alamat = $DataProfilUser['alamat'];
					$telepon = $DataProfilUser['telepon'];
					$tgl_lahir = $DataProfilUser['tgl_lahir'];
					$jabatan = $DataProfilUser['jabatan'];
					$jenis_kelamin = $DataProfilUser['jenis_kelamin'];
					$golongan = $DataProfilUser['golongan'];
					$pendidikan = $DataProfilUser['pendidikan'];
				}
			}
			?>
			<div class="container-1">
				<div style="width: 100%; height: 150px; background-color:#212529;">
					<div style="display: flex;">
						<div style="height: 150px; margin-bottom: -50%; text-align: end; display: flex;flex-direction: column;align-items: flex-start;justify-content: flex-end;margin-left: 10px; margin-top: 30px;">
							<img <?php
									if ($foto != '') {
										echo "src='http://localhost/smkn2kotajambi/assets/images/guru/" . $foto . "'";
									} else {
										echo "src='http://localhost/smkn2kotajambi/assets/images/profil.png'";
									} ?> alt="" width="100px">
						</div>
						<div style="margin-top: 75px; margin-left: 10px; height: 100px; display: flex; justify-content: flex-end;flex-direction: column;">
							<span><?php
									if ($nama != '') {
										echo $nama;
									} else {
										echo "MY NAME";
									} ?><a href="edit/profil?id_user=<?PHP echo $_SESSION['id_user'] ?>" style="margin-left:5px;"><i class="fas fa-cog"></i></a></span>
							<span><?php echo $_SESSION['akses']; ?></span>
						</div>
					</div>
				</div>
				<div style="width: 100%; height: 300px; margin-top: 50px; ">
					<div class="info-Profil">
						<ul style="padding-left: 1rem; padding-top: 1rem;">
							<li style="list-style: none;">
								<i class="fas fa-list-ol" style="color: grey;"></i>
								<span style="margin-left: 10px; padding-right: 100px;">NIP</span>
								<span>:</span>
								<span style="padding-left: 10px;"><?php
																	if ($nip != '') {
																		echo $nip;
																	} else {
																		echo "-";
																	} ?></span>
							</li>
							<li style="list-style: none;">
								<i class="fas fa-venus-mars" style="color: grey;"></i><span style="margin-left: 15px; padding-right: 28px;">Jenis Kelamin</span>
								<span>:</span>
								<span style="padding-left: 10px;"><?php
																	if ($jenis_kelamin != '') {
																		echo $jenis_kelamin;
																	} else {
																		echo "-";
																	} ?></span>
							</li>
							<li style="list-style: none;">
								<i class="fas fa-birthday-cake" style="color: grey;"></i>
								<span style="margin-left: 10px; padding-right: 52px;">TGL LAHIR</span>
								<span>:</span>
								<span style="padding-left: 10px;"><?php
																	if ($tgl_lahir != '') {
																		echo $tgl_lahir;
																	} else {
																		echo "-";
																	} ?></span>
							</li>
							<li style="list-style: none;">
								<i class="fas fa-map-marker-alt" style="color: grey;"></i><span style="margin-left: 15px; padding-right: 67px;">ALAMAT</span>
								<span>:</span>
								<span style="padding-left: 10px;"><?php
																	if ($alamat != '') {
																		echo $alamat;
																	} else {
																		echo "-";
																	} ?></span>
							</li>
							<li style="list-style: none;">
								<i class="fas fa-graduation-cap" style="color: grey;"></i><span style="margin-left: 15px; padding-right: 42px;">Pendidikan</span>
								<span>:</span>
								<span style="padding-left: 10px;"><?php
																	if ($pendidikan != '') {
																		echo $pendidikan;
																	} else {
																		echo "-";
																	} ?></span>
							</li>
							<li style="list-style: none;">
								<i class="fas fa-briefcase" style="color: grey;"></i><span style="margin-left: 15px; padding-right: 40px;">Gol/Jabatan</span>
								<span>:</span>
								<span style="padding-left: 10px;"><?php
																	if ($golongan != '') {
																		echo $golongan . "/" . $jabatan;
																	} else {
																		echo "-";
																	} ?></span>
							</li>
							<li style="list-style: none;">
								<i class="fas fa-phone" style="color: grey;"></i><span style="margin-left: 10px; padding-right: 63px;">TELEPON</span>
								<span>:</span>
								<span style="padding-left: 10px;"><?php
																	if ($telepon != '') {
																		echo $telepon;
																	} else {
																		echo "-";
																	} ?></span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include "../layout/footer.php"
?>