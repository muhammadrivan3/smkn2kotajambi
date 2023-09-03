<?php
session_start();
ob_start();
$konek=mysqli_connect("localhost:3306","root","") or die('koneksigagal');
mysqli_select_db($konek,"pkg_smk2kotajambi") or die("gagal");
?>
