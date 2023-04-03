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

    $query = "SELECT SUM(jml_angsuran) as jml FROM angsuran WHERE no_pinjaman='$no_pinjaman'";
    $sql = mysqli_query($con, $query);
    $data = mysqli_fetch_array($sql);
    $query2 = "SELECT jml_pinjaman as jml2 FROM pinjaman WHERE no_pinjaman='$no_pinjaman'";
    $sql2 = mysqli_query($con, $query2);
    $data2 = mysqli_fetch_array($sql2);
    $jml3 = $data2['jml2']-$data['jml']-$jml_angsuran2;
    $angsuran_max = $data2['jml2']-$data['jml'];
    if ($jml3<0){
        echo '<script type="text/javascript">alert("Angsuran maksimal = '.rp($angsuran_max).'");</script>';
	    echo '<script>window.history.back();</script>';
    } else {
    $query = "INSERT into angsuran (no_anggota,no_pinjaman,tgl_angsuran,jml_angsuran,angsuran_ke) values ('$no_anggota','$no_pinjaman','$tgl_angsuran','$jml_angsuran2','$angsuran_ke')";
    // echo $query;
    $sql=mysqli_query($con, $query);
    echo '<script type="text/javascript">alert("Pembayaran Berhasil.");</script>';
    echo '<script>window.location.href="angsuran_daftar.php"</script>';
    }
// ?>