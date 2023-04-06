<?php

function kode_pinjam($no,$tgl_pinjaman){
  if (empty($no)){
    $hasil = '';
  } else {
  $tgl= explode("-", $tgl_pinjaman);
  $hasil = 'PN/'.$no.'/'.$tgl[1].'/'.$tgl[2];
  }
  return $hasil;
}
function kode_simpan($no,$tgl_simpanan){
  if (empty($no)){
    $hasil = '';
  } else {
  $tgl= explode("-", $tgl_simpanan);
  $hasil = 'SM/'.$no.'/'.$tgl[1].'/'.$tgl[2];
  }
  return $hasil;
}
function kode_angsuran($no,$tgl_angsuran){
  if (empty($no)){
    $hasil = '';
  } else {
  $tgl= explode("-", $tgl_angsuran);
  $hasil = 'AS/'.$no.'/'.$tgl[1].'/'.$tgl[2];
  }
  return $hasil;
}

function rp($angka){
  if (empty($angka)){
    $hasil_rupiah = '';
  } else {
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  }
    return $hasil_rupiah;
}
function rp2($angka){
  if (empty($angka)){
    $hasil_rupiah = '';
  } else {
    $hasil_rupiah = number_format($angka,0,',','.');
  }
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

function status_cetak($stat){
  if ($stat=='0'){
    $hasil = '<p style="color:yellow;">Pending</p>';
  } else if ($stat=='1'){
    $hasil = '<p style="color:green;">Accepted</p>';
  } else if ($stat=='2'){
    $hasil = '<p style="color:red;">Denied</p>';
  }
  return $hasil;
}
function status_pinjaman_cetak($no_pinjaman){
  include('koneksi.php');
  $query = "SELECT SUM(jml_angsuran) as jml FROM angsuran WHERE no_pinjaman='$no_pinjaman'";
  $sql = mysqli_query($con, $query);
  $data = mysqli_fetch_array($sql);
  $query2 = "SELECT jml_pinjaman as jml2 FROM pinjaman WHERE no_pinjaman='$no_pinjaman'";
  $sql2 = mysqli_query($con, $query2);
  $data2 = mysqli_fetch_array($sql2);
  if ($data2['jml2']==$data['jml']){
    $hasil = '<p style="color:green;">Lunas</p>';
  } else {
    $hasil = '<p style="color:red;">Belum Lunas</p>';
  }
    return $hasil;
}
function status_pinjaman($no_pinjaman){
  include('koneksi.php');
  $query = "SELECT SUM(jml_angsuran) as jml FROM angsuran WHERE no_pinjaman='$no_pinjaman'";
  $sql = mysqli_query($con, $query);
  $data = mysqli_fetch_array($sql);
  $query2 = "SELECT no_anggota, jml_pinjaman as jml2 FROM pinjaman WHERE no_pinjaman='$no_pinjaman'";
  $sql2 = mysqli_query($con, $query2);
  $data2 = mysqli_fetch_array($sql2);
    if (empty($data['jml'])){
    $hasil = '';
  } else if ($data2['jml2']==$data['jml']){
    $hasil = '<button type="button" class="btn btn-success btn-sm">Lunas</button>';
  } else if ($data2['jml2']!==$data['jml']){
    $hasil = '<button type="button" class="btn btn-warning btn-sm">Belum Lunas</button>';
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

function jml_pinjaman($id){
  include('koneksi.php');
  $query_pinjaman = "SELECT SUM(jml_pinjaman) as jml FROM pinjaman WHERE no_anggota='$id' and status='1'";
  $sql_pinjaman = mysqli_query($con, $query_pinjaman);
  $data_pinjaman = mysqli_fetch_array($sql_pinjaman);
  $total_pinjaman = $data_pinjaman['jml'];
  return $total_pinjaman;
}
function jml_simpanan($id){
  include('koneksi.php');
  $query_simpanan = "SELECT SUM(jml_simpanan) as jml FROM simpanan WHERE no_anggota='$id'";
  $sql_simpanan = mysqli_query($con, $query_simpanan);
  $data_simpanan = mysqli_fetch_array($sql_simpanan);
  $total_simpanan = $data_simpanan['jml'];
  return $total_simpanan;
}
?>