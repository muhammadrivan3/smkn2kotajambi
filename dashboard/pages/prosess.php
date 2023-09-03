
<?php

function MessagePopUp($message, $RedirectTo)
{
	echo "<script>window.location.href='" . $RedirectTo . "';alert('" . $message . "');</script>";
}

if (isset($_GET['tipe'])) {
	// code...
	if ($_GET['tipe'] == "tambah_guru") {
		// code...

		$namaFile = $_FILES['foto']['name'];
		$namaSementara = $_FILES['foto']['tmp_name'];
		$dirUpload = "../assets/images/guru/";
		$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
		$queryInputGuru = mysqli_query($konek, "INSERT INTO identitas_guru(nama, nip, jenis_kelamin, tgl_lahir, alamat, pendidikan, golongan,jabatan, spesialisasi, mata_pelajaran, telepon, foto) VALUES ('" . strtolower($_POST['nama']) . "','$_POST[nip]', '$_POST[jenis_kelamin]', '$_POST[tgl_lahir]', '$_POST[alamat]', '$_POST[pendidikan]', '$_POST[golongan]', '$_POST[jabatan]', '$_POST[spesialisasi]', '$_POST[mata_pelajaran]' , '$_POST[telepon]', '$namaFile')");
		if ($queryInputGuru) {
			MessagePopUp("Data Guru Tersimpan", "/smkn2kotajambi/guru");
		} else {
			MessagePopUp("Data Guru Tidak Tersimpan", "/smkn2kotajambi/guru");
		}
	}
}

?>