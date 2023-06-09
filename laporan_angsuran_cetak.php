<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Daftar Pembayaran</title>
    
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
    if ($session_role=='admin' OR $session_role=='bendahara'){
        $query = "SELECT a.*, an.nama_anggota, p.tgl_pinjaman FROM angsuran as a, anggota as an, pinjaman as p WHERE a.no_anggota=an.no_anggota AND p.no_pinjaman=a.no_pinjaman";
    } else {   
        $query = "SELECT a.*, an.nama_anggota, p.tgl_pinjaman FROM angsuran as a, anggota as an, pinjaman as p WHERE a.no_anggota=an.no_anggota AND p.no_pinjaman=a.no_pinjaman AND a.no_anggota='$session_id'";
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
<h1 align="center">Laporan Daftar Pembayaran</h1><br>
<table class="tg" width="100%">
<thead>
  <tr>
    <th class="tg-0lax">No</th>
    <th class="tg-0lax">No. Anggota</th>
    <th class="tg-0lax">Nama Anggota</th>
    <th class="tg-0lax">No. Pinjaman</th>
    <th class="tg-0lax">No. Angsuran</th>
    <th class="tg-0lax">Tanggal Angsuran</th>
    <th class="tg-0lax">Angsuran Ke</th>
    <th class="tg-0lax">Jumlah Angsuran</th>
  </tr>
</thead>
<tbody>
  <?php 
  do { 
      foreach($data as $key=>$value) {$$key=$value;}
      $jml_simpanan2 = rp($jml_simpanan);
  ?>
  <tr>
    <td class="tg-0lax"><?=$no?></td>
    <td class="tg-0lax"><?=$no_anggota?></td>
    <td class="tg-0lax"><?=$nama_anggota?></td>
    <td class="tg-0lax"><?=kode_pinjam($no_pinjaman,$tgl_pinjaman)?></td>
    <td class="tg-0lax"><?=kode_angsuran($id,$tgl_angsuran)?></td>
    <td class="tg-0lax"><?=$tgl_angsuran?></td>
    <td class="tg-0lax"><?=$angsuran_ke?></td>
    <td class="tg-0lax"><?=rp($jml_angsuran)?></td>
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