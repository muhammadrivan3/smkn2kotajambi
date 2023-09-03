
<?php
//memasukan modul koneksi
include "db/koneksi.php";


function MessagePopUp($message, $RedirectTo)
{
	echo "<script>window.location.href='" . $RedirectTo . "';alert('" . $message . "');</script>";
}
function presentase($total_skor, $max_skor)
{
	$total = ($total_skor / $max_skor) * 100;
	return $total;
}
function grade($message, $RedirectTo)
{
	echo "<script>window.location.href='" . $RedirectTo . "';alert('" . $message . "');</script>";
}
if (isset($_GET['tipe'])) {
	if ($_GET['tipe'] == "login") {
		$queryLoginUser = mysqli_query($konek, "SELECT * FROM user WHERE username='$_POST[username]' AND password='$_POST[password]';");
		if (mysqli_num_rows($queryLoginUser) == 1) {
			while ($user = mysqli_fetch_array($queryLoginUser)) {
				// this code bro...
				$_SESSION['id_user']  = $user['id_user'];
				$_SESSION['username'] = $user['username'];
				$_SESSION['password'] = $user['password'];
				$_SESSION['akses'] = $user['akses'];
				if ($_SESSION['akses'] == '') {
					header("Location:http://localhost/smkn2kotajambi/konfirmasi_akun");
				} else {
					Header("Location:dashboard");
				}
			}
		} else {
			MessagePopUp("Mohon maaf user tidak di temukan", "auth");
		}
	} else if ($_GET['tipe'] == "register") {
		$queryKodeUser = mysqli_query($konek, "SELECT * FROM kode_registrasi WHERE kode='$_POST[kode]';");
		if (mysqli_num_rows($queryKodeUser) == 1) {
			// code...
			// seleksi kode register
			// apakah pendaftar guru atau siswa
			
			if ($_POST['kode']==333) {
				// jika guru
				# code...
				$queryLoginUser = mysqli_query($konek, "SELECT * FROM user WHERE username='$_POST[username]' AND akses='guru'");
				if (mysqli_num_rows($queryLoginUser) == 1) {
					MessagePopUp("Mohon maaf Username sudah digunakan", "auth");
				} else {
					$queryRegister = mysqli_query($konek, "INSERT INTO user (username,password,akses) VALUES ('$_POST[username]','$_POST[password]','guru')");
					if ($queryRegister) {
						MessagePopUp("Daftar Berhasil", "auth");
					} else {
						MessagePopUp("Mohon maaf Daftar tidak Berhasil", "auth");
					}
				}
			}else{
				// jika siswa
				$queryLoginUser = mysqli_query($konek, "SELECT * FROM user WHERE username='$_POST[username]' AND akses='siswa'");
				if (mysqli_num_rows($queryLoginUser) == 1) {
					MessagePopUp("Mohon maaf Username sudah digunakan", "auth");
				} else {
					$queryRegister = mysqli_query($konek, "INSERT INTO user (username,password,akses) VALUES ('$_POST[username]','$_POST[password]','siswa')");
					if ($queryRegister) {
						MessagePopUp("Daftar Berhasil", "auth");
					} else {
						MessagePopUp("Mohon maaf Daftar tidak Berhasil", "auth");
					}
				}
			}
		} else {
			MessagePopUp("Mohon maaf kode tidak ditemukan", "auth");
		}
	} else if ($_GET['tipe'] == "tambah_guru") {

		$namaFile = $_FILES['foto']['name'];
		$namaSementara = $_FILES['foto']['tmp_name'];

		$dirUpload = "assets/images/guru/";
		$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
		$queryInputGuru = mysqli_query($konek, "INSERT INTO identitas_guru(nama, nip, jenis_kelamin, tgl_lahir, alamat, pendidikan, golongan,jabatan, spesialisasi, mata_pelajaran, telepon, foto) VALUES ('" . strtolower($_POST['nama']) . "','$_POST[nip]', '$_POST[jenis_kelamin]', '$_POST[tgl_lahir]', '$_POST[alamat]', '$_POST[pendidikan]', '$_POST[golongan]', '$_POST[jabatan]', '$_POST[spesialisasi]', '$_POST[mata_pelajaran]' , '$_POST[telepon]', '$namaFile')");

		if ($queryInputGuru) {
			MessagePopUp("Data Guru Tersimpan", "/smkn2kotajambi/guru");
		} else {
			MessagePopUp("Data Guru Tidak Tersimpan", "/smkn2kotajambi/guru");
		}
	} else if ($_GET['tipe'] == "hapus_guru") {
		// code...
		$queryHapusGuru = mysqli_query($konek, "DELETE FROM identitas_guru WHERE id_guru='$_POST[id_guru]'");
		if ($queryHapusGuru) {
			MessagePopUp("Data Guru Sudah Terhapus", "/smkn2kotajambi/guru");
		} else {
			MessagePopUp("Data Guru Tidak Terhapus", "/smkn2kotajambi/guru");
		}
	} else if (strval($_GET['tipe']) == "edit") {
		// code...
		$namaFile = $_FILES['foto']['name'];
		$namaSementara = $_FILES['foto']['tmp_name'];

		// tentukan lokasi file akan dipindahkan
		$dirUpload = "assets/images/guru/";

		// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
		$query_daftar = mysqli_query($konek, "UPDATE identitas_guru SET foto='" . $namaFile . "', nip='$_POST[nip]', nama='$_POST[nama]', jenis_kelamin='$_POST[jenis_kelamin]', tgl_lahir='$_POST[tgl_lahir]', alamat='$_POST[alamat]', pendidikan='$_POST[pendidikan]',golongan='$_POST[golongan]', spesialisasi='$_POST[spesialisasi]', mata_pelajaran='$_POST[mata_pelajaran]',jabatan='$_POST[jabatan]', telepon='$_POST[telepon]' WHERE
     id_guru='$_POST[id_guru]'");
		if ($query_daftar) {
			MessagePopUp("Data Guru Sudah Dirubah", "/smkn2kotajambi/guru");
		} else {
			MessagePopUp("Data Guru Tidak Terubah", "/smkn2kotajambi/guru");
		}
	} else if ($_GET['tipe'] == "pkg") {
		// code...
		$pertanyaan_kompetensi_1 = [$_POST['pertanyaan-kompetensi-1-1'], $_POST['pertanyaan-kompetensi-1-2'], $_POST['pertanyaan-kompetensi-1-3'], $_POST['pertanyaan-kompetensi-1-4']];
		$pertanyaan_kompetensi_2 = [$_POST['pertanyaan-kompetensi-2-1'], $_POST['pertanyaan-kompetensi-2-2'], $_POST['pertanyaan-kompetensi-2-3'], $_POST['pertanyaan-kompetensi-2-4']];
		$pertanyaan_kompetensi_3 = [$_POST['pertanyaan-kompetensi-3-1'], $_POST['pertanyaan-kompetensi-3-2'], $_POST['pertanyaan-kompetensi-3-3'], $_POST['pertanyaan-kompetensi-3-4']];
		$pertanyaan_kompetensi_4 = [$_POST['pertanyaan-kompetensi-4-1'], $_POST['pertanyaan-kompetensi-4-2'], $_POST['pertanyaan-kompetensi-4-3']];
		$pertanyaan_kompetensi_5 = [$_POST['pertanyaan-kompetensi-5-1'], $_POST['pertanyaan-kompetensi-5-2'], $_POST['pertanyaan-kompetensi-5-3'], $_POST['pertanyaan-kompetensi-5-4']];
		$pertanyaan_kompetensi_6 = [$_POST['pertanyaan-kompetensi-6-1'], $_POST['pertanyaan-kompetensi-6-2'], $_POST['pertanyaan-kompetensi-6-3']];
		$pertanyaan_kompetensi_7 = [$_POST['pertanyaan-kompetensi-7-1'], $_POST['pertanyaan-kompetensi-7-2'], $_POST['pertanyaan-kompetensi-7-3']];
		$pertanyaan_kompetensi_8 = [$_POST['pertanyaan-kompetensi-8-1'], $_POST['pertanyaan-kompetensi-8-2'], $_POST['pertanyaan-kompetensi-8-3']];
		$pertanyaan_kompetensi_9 = [$_POST['pertanyaan-kompetensi-9-1'], $_POST['pertanyaan-kompetensi-9-2'], $_POST['pertanyaan-kompetensi-9-3']];
		$pertanyaan_kompetensi_10 = [$_POST['pertanyaan-kompetensi-10-1'], $_POST['pertanyaan-kompetensi-10-2'], $_POST['pertanyaan-kompetensi-10-3']];
		$pertanyaan_kompetensi_11 = [$_POST['pertanyaan-kompetensi-11-1'], $_POST['pertanyaan-kompetensi-11-2'], $_POST['pertanyaan-kompetensi-11-3']];
		$pertanyaan_kompetensi_12 = [$_POST['pertanyaan-kompetensi-12-1'], $_POST['pertanyaan-kompetensi-12-2'], $_POST['pertanyaan-kompetensi-12-3']];
		$pertanyaan_kompetensi_13 = [$_POST['pertanyaan-kompetensi-13-1'], $_POST['pertanyaan-kompetensi-13-2'], $_POST['pertanyaan-kompetensi-13-3']];
		$pertanyaan_kompetensi_14 = [$_POST['pertanyaan-kompetensi-14-1'], $_POST['pertanyaan-kompetensi-14-2'], $_POST['pertanyaan-kompetensi-14-3']];
		$pertanyaan_kompetensi_15 = [$_POST['pertanyaan-kompetensi-15-1'],$_POST['pertanyaan-kompetensi-15-2'],$_POST['pertanyaan-kompetensi-15-3']];
		// echo "".count($pertanyaan_kompetensi_1);
		// $total_1 = array_sum($pertanyaan_kompetensi_1);
		$total_1 = presentase(array_sum($pertanyaan_kompetensi_1), count($pertanyaan_kompetensi_1) *4);
		$total_2 = presentase(array_sum($pertanyaan_kompetensi_2), count($pertanyaan_kompetensi_2) *4);
		$total_3 = presentase(array_sum($pertanyaan_kompetensi_3), count($pertanyaan_kompetensi_3) *4);
		$total_4 = presentase(array_sum($pertanyaan_kompetensi_4), count($pertanyaan_kompetensi_4) *4);
		$total_5 = presentase(array_sum($pertanyaan_kompetensi_5), count($pertanyaan_kompetensi_5) *4);
		$total_6 = presentase(array_sum($pertanyaan_kompetensi_6), count($pertanyaan_kompetensi_6) *4);
		$total_7 = presentase(array_sum($pertanyaan_kompetensi_7), count($pertanyaan_kompetensi_7) *4);
		$total_8 = presentase(array_sum($pertanyaan_kompetensi_8), count($pertanyaan_kompetensi_8) *4);
		$total_9 = presentase(array_sum($pertanyaan_kompetensi_9), count($pertanyaan_kompetensi_9) *4);
		$total_10 = presentase(array_sum($pertanyaan_kompetensi_10), count($pertanyaan_kompetensi_10) *4);
		$total_11 = presentase(array_sum($pertanyaan_kompetensi_11), count($pertanyaan_kompetensi_11) *4);
		$total_12 = presentase(array_sum($pertanyaan_kompetensi_12), count($pertanyaan_kompetensi_12) *4);
		$total_13 = presentase(array_sum($pertanyaan_kompetensi_13), count($pertanyaan_kompetensi_13) *4);
		$total_14 = presentase(array_sum($pertanyaan_kompetensi_14), count($pertanyaan_kompetensi_14) *4);
		$total_15 = presentase(array_sum($pertanyaan_kompetensi_15), count($pertanyaan_kompetensi_15) *4);


		// checking data sudah ada atau belum
		$queryCheckPendagogik = mysqli_query($konek, "SELECT * FROM pkg_pendagogik WHERE guru='$_POST[id_guru]' AND id_user=".$_SESSION['id_user'].";");
		if (mysqli_num_rows($queryCheckPendagogik) == 1) {
			$queryUpdateToPendagogik = mysqli_query($konek, "UPDATE pkg_pendagogik SET kompetensi_1='" . $total_1 . "', kompetensi_2='" . $total_2 . "', kompetensi_3='" . $total_3 . "', kompetensi_4='" . $total_4 . "', kompetensi_5='" . $total_5 . "', kompetensi_6='" . $total_6 . "', kompetensi_7='" . $total_7 . "' WHERE guru=" . $_POST['id_guru']);
		} else {
			$queryInsertToPendagogik = mysqli_query($konek, "INSERT INTO pkg_pendagogik(kompetensi_1,kompetensi_2,kompetensi_3,kompetensi_4,kompetensi_5,kompetensi_6,kompetensi_7,guru,id_user) VALUES (
  			'" . $total_1 . "','" . $total_2 . "','" . $total_3 . "','" . $total_4 . "','" . $total_5 . "','" . $total_6 . "','" . $total_7 . "','" . $_POST['id_guru'] . "',".$_SESSION['id_user'].")");
		}

		$queryCheckKepribadian = mysqli_query($konek, "SELECT * FROM pkg_kepribadian WHERE guru='$_POST[id_guru]' AND id_user=".$_SESSION['id_user'].";");
		if (mysqli_num_rows($queryCheckKepribadian) == 1) {
			$queryUpdateToKepribadian = mysqli_query($konek, "UPDATE pkg_kepribadian SET kompetensi_1='" . $total_8 . "', kompetensi_2='" . $total_9 . "', kompetensi_3='" . $total_10 . "' WHERE guru=" . $_POST['id_guru']);
		} else {
			$queryInsertToKepribadian = mysqli_query($konek, "INSERT INTO pkg_kepribadian(kompetensi_1,kompetensi_2,kompetensi_3,guru,id_user) VALUES (
  			'" . $total_8 . "','" . $total_9 . "','" . $total_10 . "','" . $_POST['id_guru'] . "',".$_SESSION['id_user'].")");
		}

		$queryCheckSosial = mysqli_query($konek, "SELECT * FROM pkg_sosial WHERE guru='$_POST[id_guru]' AND id_user=".$_SESSION['id_user'].";");
		if (mysqli_num_rows($queryCheckSosial) == 1) {
			$queryUpdateToSosial = mysqli_query($konek, "UPDATE pkg_sosial SET kompetensi_1='" . $total_11 . "', kompetensi_2='" . $total_12 . "' WHERE guru=" . $_POST['id_guru']);
		} else {
			$queryInsertToSosial = mysqli_query($konek, "INSERT INTO pkg_sosial(kompetensi_1,kompetensi_2,guru,id_user) VALUES (
  			'" . $total_11 . "','" . $total_12 . "','" . $_POST['id_guru'] . "',".$_SESSION['id_user'].")");
		}

		$queryCheckProfesional = mysqli_query($konek, "SELECT * FROM pkg_profesional WHERE guru='$_POST[id_guru]' AND id_user=".$_SESSION['id_user'].";");
		if (mysqli_num_rows($queryCheckPendagogik) == 1) {
			$queryUpdateToProfesional = mysqli_query($konek, "UPDATE pkg_profesional SET kompetensi_1='" . $total_13 . "', kompetensi_2='" . $total_14 . "' WHERE guru=" . $_POST['id_guru']);
		} else {
			$queryInsertToProfesional = mysqli_query($konek, "INSERT INTO pkg_profesional(kompetensi_1,kompetensi_2,guru,id_user) VALUES (
  		'" . $total_13 . "','" . $total_14 . "','" . $_POST['id_guru'] . "',".$_SESSION['id_user'].")");
		}

		$queryCheckPrestasi = mysqli_query($konek, "SELECT * FROM pkg_prestasi WHERE guru='$_POST[id_guru]' AND id_user=".$_SESSION['id_user'].";");
		if (mysqli_num_rows($queryCheckPendagogik) == 1) {
			$queryUpdateToPrestasi = mysqli_query($konek, "UPDATE pkg_prestasi SET kompetensi_1='" . $total_1 . "' WHERE guru=" . $_POST['id_guru']);
		} else {
			$queryInsertToPrestasi = mysqli_query($konek, "INSERT INTO pkg_prestasi(kompetensi_1,guru,id_user) VALUES (
  		'" . $total_15 . "','" . $_POST['id_guru'] . "',".$_SESSION['id_user'].")");
		}
		MessagePopUp("Data Sudah Ditambahkan", "/smkn2kotajambi/kinerja/guru");

	} else if ($_GET['tipe'] == "edit_pengguna") {
		$query_edit_user = mysqli_query($konek, "UPDATE user SET username='$_POST[username]', password='$_POST[password]', akses='$_POST[akses]' WHERE
     id_user='$_POST[id_user]'");
		if ($query_edit_user) {
			MessagePopUp("Data user Sudah Dirubah", "/smkn2kotajambi/kelola-pengguna");
		} else {
			MessagePopUp("Data user Tidak Terubah", "/smkn2kotajambi/kelola-pengguna");
		}
	} else if ($_GET['tipe'] == "add_profil") {
		$namaFile = $_FILES['foto']['name'];
		$namaSementara = $_FILES['foto']['tmp_name'];

		// tentukan lokasi file akan dipindahkan
		$dirUpload = "assets/images/guru/";

		// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
		$queryInputGuru = mysqli_query($konek, "INSERT INTO profil_user(nama,nip,jenis_kelamin,tgl_lahir,alamat,pendidikan,golongan,jabatan,telepon, foto,user) VALUES ('" . strtolower($_POST['nama']) . "','$_POST[nip]','$_POST[jenis_kelamin]','$_POST[tgl_lahir]', '$_POST[alamat]','$_POST[pendidikan]','$_POST[golongan]','$_POST[jabatan]', '$_POST[telepon]', '$namaFile','" . $_SESSION['id_user'] . "')");

		if ($queryInputGuru) {
			MessagePopUp("Data Profil Tersimpan", "/smkn2kotajambi/profil-pengguna");
		} else {
			MessagePopUp("Data Profil Tidak Tersimpan", "/smkn2kotajambi/profil-pengguna");
		}
	} else if ($_GET['tipe'] == "edit_profil") {
		$namaFile = $_FILES['foto']['name'];
		$namaSementara = $_FILES['foto']['tmp_name'];
		$dirUpload = "assets/images/guru/";

		// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
		$queryEditProfil = mysqli_query($konek, "UPDATE profil_user SET foto='" . $namaFile . "', nip='$_POST[nip]', nama='$_POST[nama]', jenis_kelamin='$_POST[jenis_kelamin]', tgl_lahir='$_POST[tgl_lahir]', alamat='$_POST[alamat]', pendidikan='$_POST[pendidikan]',golongan='$_POST[golongan]', jabatan='$_POST[jabatan]', telepon='$_POST[telepon]' WHERE
     user='$_SESSION[id_user]'");

		if ($queryEditProfil) {
			MessagePopUp("Data Profil Tersimpan", "/smkn2kotajambi/profil-pengguna");
		} else {
			MessagePopUp("Data Profil Tidak Tersimpan", "/smkn2kotajambi/profil-pengguna");
		}
	} else if ($_GET['tipe'] == "hapus_pengguna") {
		$queryHapusPengguna = mysqli_query($konek, "DELETE FROM user WHERE id_user='$_POST[id_user]'");
		if ($queryHapusPengguna) {
			$queryProfilPengguna = mysqli_query($konek, "DELETE FROM profil_user WHERE user='$_POST[id_user]'");
			MessagePopUp("Data User Sudah Terhapus", "/smkn2kotajambi/kelola-pengguna");
		} else {
			MessagePopUp("Data User Tidak Terhapus", "/smkn2kotajambi/kelola-pengguna");
		}
	}
}


?>