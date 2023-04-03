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
    $query = "SELECT jml_pinjaman,bunga FROM pinjaman WHERE no_pinjaman='$no_pinjaman'";
    $sql = mysqli_query($con, $query);
    $data = mysqli_fetch_array($sql);
    $jml_pinjaman = $data['jml_pinjaman']+($data['jml_pinjaman']*$data['bunga']/100);
    $query="UPDATE pinjaman SET status='1', jml_pinjaman='$jml_pinjaman' WHERE no_pinjaman='$no_pinjaman'";
    $sql = mysqli_query($con, $query);
    // echo $query;
} else if ($action=='deny'){
    $query = "SELECT status,bunga,jml_pinjaman FROM pinjaman WHERE no_pinjaman='$no_pinjaman'";
    $sql = mysqli_query($con, $query);
    $data = mysqli_fetch_array($sql);
    if ($data['status']==1){
        $jml_pinjaman=$data['jml_pinjaman']/(100+$data['bunga'])*100;
        $query="UPDATE pinjaman SET status='2', jml_pinjaman='$jml_pinjaman' WHERE no_pinjaman='$no_pinjaman'";
    } else {
        $query="UPDATE pinjaman SET status='2' WHERE no_pinjaman='$no_pinjaman'";
    }
    // echo $query;
    $sql = mysqli_query($con, $query);
}
echo '<script type="text/javascript">alert("Status berhasil diubah.");</script>';
echo '<script>window.location.href="pinjaman_daftar.php"</script>';
?>