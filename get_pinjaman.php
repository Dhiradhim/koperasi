<?php
include('koneksi.php');
include('fungsi.php');
$no_anggota = $_GET['no_anggota'];
$sql = "SELECT no_pinjaman, jml_pinjaman FROM pinjaman WHERE no_anggota='$no_anggota' AND status='1'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
$data = array();
do {
$totalbayar = 0;
$totalbayar=totalbayar($row['no_pinjaman']);
$data[] = array("no_pinjaman" => $row['no_pinjaman'], "jml_pinjaman" => rp($row['jml_pinjaman']), "totalbayar" => $totalbayar);
} while($row = mysqli_fetch_assoc($query));
echo json_encode($data);
?>