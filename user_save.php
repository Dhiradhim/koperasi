<?php
include ('koneksi.php');
session_start();  
  
if(!$_SESSION['no_anggota'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 

$user_id=$_POST['user_id'];
$role=$_POST['role'];
$password=md5($_POST['password']);
$confirmpassword=md5($_POST['confirmpassword']);
$no_karyawan=$_POST['no_karyawan'];
$nama_anggota=$_POST['nama_anggota'];
$jk=$_POST['jk'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$nohp=$_POST['nohp'];
$alamat=$_POST['alamat'];

$query = "SELECT COUNT('user_id') FROM users WHERE user_id='$user_id'";
$sql = mysqli_query($con, $query);
$data = mysqli_fetch_array($sql);
$count = $data["COUNT('user_id')"];

if ($count>0){
    echo '<script type="text/javascript">alert("Username sudah Terdaftar");</script>';
	echo '<script>window.history.back();</script>';
} else if ($password !== $confirmpassword)
{
	echo '<script type="text/javascript">alert("Password Tidak Sesuai");</script>';
	echo '<script>window.history.back();</script>';
}else{
    if ($role=='kepala'){
        $role = 'kepala koperasi';
    }
    $query = "INSERT into users (user_id,password,role) values ('$user_id', '$password','$role')";
    $sql=mysqli_query($con, $query);

    $query = "SELECT no_anggota FROM users WHERE user_id='$user_id'";
    $sql = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($sql);
    $no_anggota = $data['no_anggota'];

    $query = "INSERT into anggota (no_anggota,no_karyawan,nama_anggota,jk,tempat_lahir,tgl_lahir,nohp,alamat) values ('$no_anggota', '$no_karyawan', '$nama_anggota', '$jk', '$tempat_lahir', '$tgl_lahir', '$nohp', '$alamat')";
    // echo $query;
    $sql=mysqli_query($con, $query);
    echo '<script type="text/javascript">alert("Pendaftaran '. ucfirst($role).' Berhasil.");</script>';
    echo '<script>window.location.href="user_daftar.php?role='. $role .'"</script>';
}
?>