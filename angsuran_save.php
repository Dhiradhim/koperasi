<?php
include ('koneksi.php');
include ('fungsi.php');
session_start();  
  
if(!$_SESSION['no_anggota'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 

$no_anggota=$_POST['no_anggota'];
$no_pinjaman=$_POST['no_pinjaman'];
$tgl_angsuran=$_POST['tgl_angsuran'];
$jml_angsuran=$_POST['jml_angsuran'];
$jml_angsuran2=str_replace('.', '',$jml_angsuran);
$angsuran_ke=angsuran_ke($no_pinjaman)+1;

    $query = "INSERT into angsuran (no_anggota,no_pinjaman,tgl_angsuran,jml_angsuran,angsuran_ke) values ('$no_anggota','$no_pinjaman','$tgl_angsuran','$jml_angsuran2','$angsuran_ke')";
    // echo $query;
    $sql=mysqli_query($con, $query);
    echo '<script type="text/javascript">alert("Pembayaran Berhasil.");</script>';
    echo '<script>window.location.href="angsuran_daftar.php"</script>';
// ?>