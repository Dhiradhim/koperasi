<?php
include ('koneksi.php');
session_start();  
  
if(!$_SESSION['no_anggota'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 

$no_anggota=$_POST['no_anggota'];
$password1=$_POST['password'];
$password=md5($_POST['password']);
$password2=$_POST['confirmpassword'];
$confirmpassword=md5($_POST['confirmpassword']);
$nama_anggota=$_POST['nama_anggota'];
$jk=$_POST['jk'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$nohp=$_POST['nohp'];
$alamat=$_POST['alamat'];

if (empty($password1) OR empty($password2))
{
    $query = "UPDATE anggota SET tempat_lahir='$tempat_lahir',nama_anggota='$nama_anggota',nohp='$nohp',alamat='$alamat',jk='$jk',tgl_lahir='$tgl_lahir' WHERE no_anggota='$no_anggota'";
    $sql = mysqli_query($con,$query);
    echo '<script type="text/javascript">alert("Perubahan Data Berhasil.");</script>';
    echo '<script>window.location.href="profil.php"</script>';
}else if ($password !== $confirmpassword)
{
	echo '<script type="text/javascript">alert("Password Tidak Sesuai");</script>';
	echo '<script>window.history.back();</script>';
}else{
    $query = "UPDATE anggota SET tempat_lahir='$tempat_lahir',nama_anggota='$nama_anggota',nohp='$nohp',alamat='$alamat',jk='$jk',tgl_lahir='$tgl_lahir' WHERE no_anggota='$no_anggota'";
    $sql = mysqli_query($con,$query);
    $query = "UPDATE users SET password='$password' WHERE no_anggota='$no_anggota'";
    $sql = mysqli_query($con,$query);
    echo '<script type="text/javascript">alert("Perubahan Data dan/atau Password Berhasil.");</script>';
    echo '<script>window.location.href="profil.php"</script>';
}
?>