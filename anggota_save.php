<?php
include ('koneksi.php');
session_start();  
  
if(!$_SESSION['no_anggota'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 

$user_id=$_POST['user_id'];
$password=md5($_POST['password']);
$confirmpassword=md5($_POST['confirmpassword']);
$nama_anggota=$_POST['nama_anggota'];
$jk=$_POST['jk'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$nohp=$_POST['nohp'];
$alamat=$_POST['alamat'];

if ($password !== $confirmpassword)
{
	echo '<script type="text/javascript">alert("Password Tidak Sesuai");</script>';
	echo '<script>window.history.back();</script>';
}else{
    $query = "INSERT into users (user_id,password) values ('$user_id', '$password')";
    $sql=mysqli_query($con, $query);

    $query = "SELECT no_anggota FROM users WHERE user_id='$user_id'";
    $xno = mysqli_query($con, $query);
    $hasil = mysqli_fetch_assoc($xno);
    $no_anggota = $hasil['no_anggota'];

    $query = "INSERT into anggota (no_anggota,nama_anggota,jk,tempat_lahir,tgl_lahir,nohp,alamat) values ('$no_anggota', '$nama_anggota', '$jk', '$tempat_lahir', '$tgl_lahir', '$nohp', '$alamat')";
    $sql=mysqli_query($con, $query);
    echo '<script type="text/javascript">alert("Pendaftaran Anggota Berhasil.");</script>';
    echo '<script>window.location.href="anggota_daftar.php"</script>';
}
?>