<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
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
    $no = 1;
    $id = $_GET['id'];
    if ($id=='all') {
        $query = "SELECT u.role , a.* FROM anggota as a, users as u WHERE a.no_anggota=u.no_anggota AND role='anggota'";
    } else {
        $query = "SELECT * FROM anggota WHERE no_anggota='$id'";
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
<h1 align="center">Laporan Keuangan</h1><br>
<table class="tg" width="100%">
<thead>
  <tr>
    <th class="tg-0lax">No</th>
    <th class="tg-0lax">No. Anggota</th>
    <th class="tg-0lax">No. Karyawan</th>
    <th class="tg-0lax">Nama Anggota</th>
    <th class="tg-0lax">Jenis Kelamin</th>
    <th class="tg-0lax">Total Simpanan</th>
    <th class="tg-0lax">Total Pinjaman</th>

  </tr>
</thead>
<tbody>
<?php 
    do { 
        foreach($data as $key=>$value) {$$key=$value;}
    ?>
    <tr>
        <td class="tg-0lax"><?=$no?></td>
        <td class="tg-0lax"><?=$no_anggota?></td>
        <td class="tg-0lax"><?=$no_karyawan?></td>
        <td class="tg-0lax"><?=$nama_anggota?></td>
        <td class="tg-0lax"><?=$jk?></td>
        <td class="tg-0lax"><?=rp(jml_simpanan($no_anggota))?></td>
        <td class="tg-0lax"><?=rp(jml_pinjaman($no_anggota))?></td>
    <?php 
        $no++; 
        } 
        while ($data = mysqli_fetch_array($sql));
    ?>
    </tr>
</tbody>
</table>
</body>
</html>
<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>