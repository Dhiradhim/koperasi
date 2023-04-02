<?php
include ('koneksi.php');
session_start();  
  
if(!$_SESSION['no_anggota'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 

$no_pinjaman=$_POST['no_pinjaman'];
$tgl_pinjaman=$_POST['tgl_pinjaman'];
$jml_pinjaman=$_POST['jml_pinjaman'];
$jml_pinjaman2 = str_replace('.', '',$jml_pinjaman);
$lama_pinjaman=$_POST['lama_pinjaman'];

    $query = "UPDATE pinjaman SET tgl_pinjaman='$tgl_pinjaman',jml_pinjaman='$jml_pinjaman2',lama_pinjaman='$lama_pinjaman' WHERE no_pinjaman='$no_pinjaman'";
    $sql=mysqli_query($con, $query);
    // echo $query;
    echo '<script type="text/javascript">alert("Perubahan Data Berhasil.");</script>';
    echo '<script>window.location.href="pinjaman_daftar.php"</script>';
?>