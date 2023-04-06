<?php
include ('head.php');
include ('sidebar.php');
?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <center><h1>Form Pinjaman</h1></center>
                                <br><br>
                                <!-- QUERY -->
                                <?php
                                $query = "SELECT u.role, a.no_anggota, a.nama_anggota FROM anggota as a, users as u WHERE a.no_anggota=u.no_anggota AND u.role='anggota'";
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                                ?>
                                <!-- QUERY -->
                                <div class="basic-form">
                                    <form method="post" action="pinjaman_save.php">
                                    <h4 class="card-title">Peminjam</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Nama Peminjam</label>
                                                <?php if ($session_role=='admin' OR $session_role=='bendahara'){ ?>
                                                    <select class="form-control" required id="sel1" name="no_anggota">
                                                    <option value="" hidden>Pilih</option>
                                                <?php 
                                                do { 
                                                foreach($data as $key=>$value) {$$key=$value;}
                                                ?>
                                                <option value="<?=$no_anggota?>"><?=$nama_anggota?> (No. Anggota: <?=$no_anggota?>)</option>
                                                <?php } while ($data = mysqli_fetch_array($sql)); 
                                                } else {  foreach($data as $key=>$value) {$$key=$value;} ?>
                                                    <input type="text" hidden required class="form-control" name="no_anggota" value="<?=$session_id?>">
                                                    <input type="text" disabled required class="form-control" name="nama_anggota" value="<?=$session_nama?>">
                                                <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                        <br>
                                        <h4 class="card-title">Detail Pinjaman</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label>Tanggal Pinjam</label>
                                                <input type="text" required class="form-control" name="tgl_pinjaman" value="<?=date('Y-m-d');?>" id="mdate">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label>Jumlah Pinjaman</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="rupiah" name="jml_pinjaman">
                                                    <div class="input-group-append"><span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Lama Pinjaman</label>
                                                <select class="form-control" required id="sel1" name="lama_pinjaman">
                                                    <option value="" hidden>Pilih</option>
                                                    <option value="3" >3 Bulan (Bunga 0%)</option>
                                                    <option value="6" >6 Bulan (Bunga 3%)</option>
                                                    <option value="12" >12 Bulan (Bunga 5%)</option>
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <button onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
<?php
include ('footer.php');
?>
</body>

</html>