<?php  
  
include("koneksi.php");  

  $id = $_GET['id'];
  $table = $_GET['table'];
  if ($table=='anggota'){
    $sql = "DELETE FROM $table WHERE no_anggota='$id'";
    $q = mysqli_query($con,$sql);
    $sql = "DELETE FROM users WHERE no_anggota='$id'";
    $q = mysqli_query($con,$sql);
    $sql = "DELETE FROM pinjaman WHERE no_anggota='$id'";
    $q = mysqli_query($con,$sql);
    $sql = "DELETE FROM angsuran WHERE no_anggota='$id'";
    $q = mysqli_query($con,$sql);
    $sql = "DELETE FROM simpanan WHERE no_anggota='$id'";
    $q = mysqli_query($con,$sql);
  } else if ($table=='angsuran'){
    $sql = "DELETE FROM $table WHERE id='$id'";
    $q = mysqli_query($con,$sql);
  } else if ($table=='pinjaman'){
    $sql = "DELETE FROM $table WHERE no_pinjaman='$id'";
    $q = mysqli_query($con,$sql);
    $sql = "DELETE FROM angsuran WHERE no_pinjaman='$id'";
    $q = mysqli_query($con,$sql);
  } else if ($table=='simpanan'){
    $sql = "DELETE FROM $table WHERE id='$id'";
    $q = mysqli_query($con,$sql);
  }
  $table_text=$table.'_daftar.php';
  echo "<script type='text/javascript'>alert('Data Sudah Terhapus');</script>";
  echo "<script type='text/javascript'>window.location.href='$table_text'</script>";
  
?>  