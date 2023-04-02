<?php
include ('koneksi.php');
session_start();  
  
if(!$_SESSION['no_anggota'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 

$no_anggota=$_POST['no_anggota'];
$tgl_simpanan=$_POST['tgl_simpanan'];
$jml_simpanan=$_POST['jml_simpanan'];
$jml_simpanan2 = str_replace('.', '',$jml_simpanan);

    $query = "INSERT into simpanan (no_anggota,tgl_simpanan,jml_simpanan) values ('$no_anggota', '$tgl_simpanan', '$jml_simpanan2')";
    $sql=mysqli_query($con, $query);
    // echo $query;
    echo '<script type="text/javascript">alert("Simpanan Berhasil Disimpan.");</script>';
    echo '<script>window.location.href="simpanan_daftar.php"</script>';
?>