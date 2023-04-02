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
                                $no_pinjaman = $_GET['no_pinjaman'];
                                $query = "SELECT a.nama_anggota, p.* FROM pinjaman as p, anggota as a WHERE a.no_anggota=p.no_anggota AND p.no_pinjaman='$no_pinjaman'";
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                                foreach($data as $key=>$value) {$$key=$value;}
                                ?>
                                <!-- QUERY -->
                                <div class="basic-form">
                                    <form method="post" action="pinjaman_edit_save.php">
                                    <h4 class="card-title">Peminjam</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Nama Peminjam</label>
                                                <input type="text" disabled class="form-control" name="no_anggota" value="<?=$nama_anggota?>" >
                                                <input type="text" hidden class="form-control" name="no_pinjaman" value="<?=$no_pinjaman?>" >
                                            </div>
                                        </div>
                                        <br>
                                        <h4 class="card-title">Detail Pinjaman</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label>Tanggal Pinjam</label>
                                                <input type="text" required class="form-control" name="tgl_pinjaman" value="<?=$tgl_pinjaman?>" id="mdate">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label>Jumlah Pinjaman</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="rupiah" value="<?=rp2($jml_pinjaman)?>" name="jml_pinjaman">
                                                    <div class="input-group-append"><span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Lama Pinjaman</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="lama_pinjaman" value="<?=$lama_pinjaman?>" placeholder="Lama Pinjaman">
                                                    <div class="input-group-append"><span class="input-group-text">bulan</span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </form>
                                    <button onclick="window.history.back()" class="btn btn-danger">Kembali</button>
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