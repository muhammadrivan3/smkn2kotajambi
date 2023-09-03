<?php
if(!isset($_SESSION['id_user'])){
//jika belum login jangan lanjut..
	if ($_SESSION['akses'] == '') {
		// code...
		header("Location:http://localhost/smkn2kotajambi/konfirmasi_akun");
	}else{
		header("Location:http://localhost/smkn2kotajambi/");
	}
}
