<?php
include ('koneksi.php');
session_start();  
  
if(!$_SESSION['no_anggota'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 

$id=$_POST['id'];
$tgl_simpanan=$_POST['tgl_simpanan'];
$jml_simpanan=$_POST['jml_simpanan'];
$jml_simpanan2 = str_replace('.', '',$jml_simpanan);

    $query = "UPDATE simpanan SET tgl_simpanan='$tgl_simpanan',jml_simpanan='$jml_simpanan2' WHERE id='$id'";
    $sql=mysqli_query($con, $query);
    // echo $query;
    echo '<script type="text/javascript">alert("Perubahan Data Berhasil.");</script>';
    echo '<script>window.location.href="simpanan_daftar.php"</script>';
?>