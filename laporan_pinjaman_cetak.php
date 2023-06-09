<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Daftar Pinjaman</title>
    
</head>
<body>
    <!-- QUERY -->
    <?php
    ini_set('display_errors', 0); 
    include ('koneksi.php');
    include ('fungsi.php');
    session_start();  
    if(!$_SESSION['no_anggota'])  
    {  
      
        header("Location: login.php"); 
    }  
    $x = $_SESSION['no_anggota'];
    $query_nama = "SELECT u.role, a.* FROM anggota as a, users as u WHERE a.no_anggota=u.no_anggota AND a.no_anggota='$x'";
    $sql_nama = mysqli_query($con, $query_nama);
    $data_nama = mysqli_fetch_array($sql_nama);
    $session_id = $data_nama['no_anggota'];
    $session_nama = $data_nama['nama_anggota'];
    $session_role = $data_nama['role'];
    $no = 1;
    if ($session_role=='admin' OR $session_role=='bendahara' OR $session_role=='kepala koperasi'){ 
        $query = "SELECT distinct p.*, a.nama_anggota as nama FROM pinjaman as p, anggota as a WHERE p.no_anggota=a.no_anggota";
    } else {
        $query = "SELECT distinct p.*, a.nama_anggota as nama FROM pinjaman as p, anggota as a WHERE p.no_anggota=a.no_anggota AND p.no_anggota='$session_id'";
    }
    $sql = mysqli_query($con, $query);
    $data = mysqli_fetch_array($sql);
    ?>
    <!-- QUERY -->
<style type="text/css">
.tg  {border-collapse:collapse;border-color:#ccc;border-spacing:0;}
.tg td{background-color:#fff;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
  font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{background-color:#f0f0f0;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
  font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:center;vertical-align:top}
</style>
<h1 align="center">Laporan Daftar Pinjaman</h1><br>
<table class="tg" width="100%">
<thead>
  <tr>
    <th class="tg-0lax">No</th>
    <th class="tg-0lax">No. Anggota</th>
    <th class="tg-0lax">Nama Anggota</th>
    <th class="tg-0lax">No. Pinjaman</th>
    <th class="tg-0lax">Tanggal</th>
    <th class="tg-0lax">Lama Pinjaman</th>
    <th class="tg-0lax">Bunga</th>
    <th class="tg-0lax">Jumlah Pinjaman</th>                                                
    <th class="tg-0lax">Jumlah Pembayaran</th>
    <th class="tg-0lax">Angsuran</th>
    <th class="tg-0lax">Status</th>
    <th class="tg-0lax">Status Pembayaran</th>

  </tr>
</thead>
<tbody>
<?php 
  do { 
      $totalbayar=totalbayar($data['no_pinjaman']);
      $angsuran_ke=angsuran_ke($data['no_pinjaman']);
      foreach($data as $key=>$value) {$$key=$value;}
      $jml_pinjaman2 = rp($jml_pinjaman);
  ?>
  <tr>
      <td class="tg-0lax"><?=$no?></td>
      <td class="tg-0lax"><?=$no_anggota?></td>
      <td class="tg-0lax"><?=$nama?></td>
      <td class="tg-0lax"><?=kode_pinjam($no_pinjaman,$tgl_pinjaman)?></td>
      <td class="tg-0lax"><?=$tgl_pinjaman?></td>
      <td class="tg-0lax"><?=$lama_pinjaman?> bulan</td>
      <td class="tg-0lax"><?=$bunga?>%</td>
      <td class="tg-0lax"><?=$jml_pinjaman2?></td>
      <td class="tg-0lax"><?=$totalbayar?></td>
      <td class="tg-0lax"><?=$angsuran_ke?> kali</td>
      <td class="tg-0lax"><?=status_cetak($status)?></td>
      <td class="tg-0lax"><?=status_pinjaman_cetak($no_pinjaman)?></td>
  </tr>
  <?php 
      $no++; 
      } 
      while ($data = mysqli_fetch_array($sql));
  ?>
</tbody>
</table>
</body>
</html>
<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>