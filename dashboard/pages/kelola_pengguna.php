<?php
include "../../db/koneksi.php";
include "../akses.php";
$activePage = 'kelolaPengguna';
include "../layout/header.php";

// get database guru
$queryGuru = mysqli_query($konek, "SELECT * FROM user ");
?>
<div id="all-content" class="container-fluid">
	<div class="row" style="margin-top: -0px;">
		<div class="col-lg-2">
			<?php include "../layout/side_menu.php" ?>
		</div>
		<div class="col-lg-10 py-3" style="margin-left: -10px;">
			<div class="container-1">
				<h4 class="text-1" style="margin:10px;"> KELOLA PENGGUNA</h4>
				<!-- content 1 -->
				<div id="tableContainer" style="margin: 10px;">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th class="text-center text-1 " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
								<th class="text-center text-1" style="background-color: #404040; color:white;">username</th>
								<th class="text-center text-1" style="width:5%;background-color: #404040; color:white;">password</th>
								<th class="text-center text-1" style="background-color: #404040; color:white;">akses</th>
								<th class="text-center text-1" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;" colspan="2">OPTION</th>
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
							$queryDataUser = mysqli_query($konek, "SELECT * FROM user limit $posisi,$batas");
							while ($dataUsers = mysqli_fetch_array($queryDataUser)) {
							?>
								<tr>
									<td class="text-center text-1"><?php echo $no; ?></td>
									<td class="text-center text-1">
										<?php echo $dataUsers['username']; ?>
									</td>
									<td class="text-center text-1" style="widtd:5%;"><?php echo $dataUsers['password']; ?></td>
									<td class="text-center text-1"><?php echo $dataUsers['akses']; ?></td>
									<td class="text-center text-1" style="width:5%;">
										<form class="form-container" style="margin:10px" autocomplete="false">
											<a href="edit/pengguna?id_user=<?PHP echo $dataUsers['id_user'] ?>" type="submit" class="btn" style=" border-color: white;border-radius: 5px; background-color: #999999;"><i class="fas fa-edit" style="color:white;"></i></a>
										</form>
									</td>
									<td class="text-center" style="width:5%;">
										<form action="prosses.php?tipe=hapus_pengguna" method="post" class="form-container" style="margin:10px" autocomplete="false">
											<input type="hidden" name="id_user" value=<?php echo $dataUsers['id_user']; ?>>
											<button class="btn" type="submit" style=" border-color: white;border-radius: 5px; background-color: #ff3333;"><i class="fas fa-trash" style="color:white;"></i> </button>
										</form>
									</td>
								</tr>
							<?php $no++;
							}
							?>
						</tbody>
					</table>
					<?php
					$query2 = mysqli_query($konek, "SELECT * FROM user");
					$jumlahdata = mysqli_num_rows($query2);
					$jumlahhalaman = ceil($jumlahdata / $batas);
					?>
					<nav>
						<ul class="pagination justify-content-center">
							<?php
							for ($i = 1; $i <= $jumlahhalaman; $i++) {
								if ($i != $halaman) {
									echo "<li class='page-item'><a class='page-link' href='kelola-pengguna?halaman=$i'>$i</a></li>";
								} else {
									echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
								}
							}
							?>
						</ul>
					</nav>
				</div>
				<!-- ------------------------------ -->
			</div>
		</div>
	</div>
</div>
<?php
include "../layout/footer.php" ?>