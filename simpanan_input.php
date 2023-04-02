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
                                <center><h1>Form Simpanan</h1></center>
                                <br><br>
                                <!-- QUERY -->
                                <?php
                                $query = "SELECT no_anggota, nama_anggota FROM anggota";
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                                ?>
                                <!-- QUERY -->
                                <div class="basic-form">
                                    <form method="post" action="simpanan_save.php">
                                    <h4 class="card-title">Anggota</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Nama Anggota</label>
                                                <select class="form-control" required id="sel1" name="no_anggota">
                                                <option value="" hidden>Pilih</option>
                                                <?php 
                                                do { 
                                                    foreach($data as $key=>$value) {$$key=$value;}
                                                ?>
                                                <option value="<?=$no_anggota?>"><?=$nama_anggota?> (No. Anggota: <?=$no_anggota?>)</option>
                                                <?php } while ($data = mysqli_fetch_array($sql)) ?>
                                            </select>
                                            </div>
                                        </div>
                                        <br>
                                        <h4 class="card-title">Detail Simpanan</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label>Tanggal Simpan</label>
                                                <input type="text" required class="form-control" name="tgl_simpanan" value="<?=date('Y-m-d');?>" id="mdate">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label>Jumlah Simpanan</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="rupiah" name="jml_simpanan">
                                                    <div class="input-group-append"><span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            
                                        </div>
                                        <div class="form-row">
                                            
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