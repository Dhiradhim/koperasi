<?php
include ('koneksi.php');
session_start();  
  
if(!$_SESSION['no_anggota'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 

$no_anggota=$_POST['no_anggota'];
$tgl_pinjaman=$_POST['tgl_pinjaman'];
$jml_pinjaman=$_POST['jml_pinjaman'];
$lama_pinjaman=$_POST['lama_pinjaman'];
$jml_pinjaman2 = str_replace('.', '',$jml_pinjaman);

    $query = "INSERT into pinjaman (no_anggota,tgl_pinjaman,jml_pinjaman,lama_pinjaman) values ('$no_anggota', '$tgl_pinjaman', '$jml_pinjaman2', '$lama_pinjaman')";
    $sql=mysqli_query($con, $query);
    // echo $query;
    echo '<script type="text/javascript">alert("Pinjaman Berhasil Disimpan.");</script>';
    echo '<script>window.location.href="pinjaman_daftar.php"</script>';
?>