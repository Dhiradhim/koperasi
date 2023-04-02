<?php
include ('koneksi.php');
session_start();  
  
if(!$_SESSION['no_anggota'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 

$no_pinjaman=$_GET['no_pinjaman'];
$action=$_GET['action'];

if ($action=='acc'){
    $query="UPDATE pinjaman SET status='1' WHERE no_pinjaman='$no_pinjaman'";
    $sql = mysqli_query($con, $query);
} else if ($action=='deny'){
    $query="UPDATE pinjaman SET status='2' WHERE no_pinjaman='$no_pinjaman'";
    $sql = mysqli_query($con, $query);
}
echo '<script type="text/javascript">alert("Status berhasil diubah.");</script>';
echo '<script>window.location.href="pinjaman_daftar.php"</script>';
?>