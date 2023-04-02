<?php

function rp($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}
function rp2($angka){
    $hasil_rupiah = number_format($angka,0,',','.');
    return $hasil_rupiah;
}
function status($stat){
    if ($stat=='0'){
      $hasil = '<button type="button" class="btn btn-warning btn-sm">Pending</button>';
    } else if ($stat=='1'){
      $hasil = '<button type="button" class="btn btn-success btn-sm">Accepted</button>';
    } else if ($stat=='2'){
      $hasil = '<button type="button" class="btn btn-danger btn-sm">Denied</button>';
    }
    return $hasil;
}

function totalbayar($no_pinjaman){
  include('koneksi.php');
  $no_pinjaman = $no_pinjaman;
  $sql1 = "SELECT SUM(jml_angsuran) as totalbayar FROM angsuran WHERE no_pinjaman='$no_pinjaman'";
  $query1 = mysqli_query($con,$sql1);
  $row1 = mysqli_fetch_assoc($query1);
  $x=rp($row1['totalbayar']);
  return $x;
}

function angsuran_ke($no_pinjaman){
  include('koneksi.php');
  $query = "SELECT COUNT(no_pinjaman) FROM angsuran WHERE no_pinjaman='$no_pinjaman'";
  $sql = mysqli_query($con, $query);
  $data = mysqli_fetch_assoc($sql);
  $x=($data['COUNT(no_pinjaman)']);
  return $x;
}

?>