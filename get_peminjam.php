<?php
include('koneksi.php');
$sql = "SELECT DISTINCT p.no_anggota, a.nama_anggota FROM pinjaman as p, anggota as a WHERE p.no_anggota=a.no_anggota";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
$data = array();
do {
$data[] = array("no_anggota" => $row['no_anggota'], "nama_anggota" => $row['nama_anggota']);
} while($row = mysqli_fetch_assoc($query));
echo json_encode($data);
?>