<?php
include ('koneksi.php');
include ('fungsi.php');
session_start();  
  
if(!$_SESSION['no_anggota'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 
$id=$_POST['id'];
$tgl_angsuran=$_POST['tgl_angsuran'];
$jml_angsuran=$_POST['jml_angsuran'];
$jml_angsuran2=str_replace('.', '',$jml_angsuran);

    $query = "UPDATE angsuran SET tgl_angsuran='$tgl_angsuran', jml_angsuran='$jml_angsuran2' WHERE id='$id'";
    // echo $query;
    $sql=mysqli_query($con, $query);
    echo '<script type="text/javascript">alert("Perubahan Data Berhasil.");</script>';
    echo '<script>window.location.href="angsuran_daftar.php"</script>';
?>