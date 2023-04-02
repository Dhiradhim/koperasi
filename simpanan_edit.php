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
                                $id = $_GET['id'];
                                $query = "SELECT s.*, a.nama_anggota FROM simpanan as s, anggota as a WHERE s.no_anggota=a.no_anggota AND s.id='$id'";
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                                foreach($data as $key=>$value) {$$key=$value;}
                                ?>
                                <!-- QUERY -->
                                <div class="basic-form">
                                    <form method="post" action="simpanan_edit_save.php">
                                    <h4 class="card-title">Anggota</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Nama Anggota</label>
                                                <input type="text" disabled class="form-control" name="no_anggota" value="<?=$nama_anggota?>" >
                                                <input type="text" hidden class="form-control" name="id" value="<?=$id?>" >
                                            </div>
                                        </div>
                                        <br>
                                        <h4 class="card-title">Detail Simpanan</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label>Tanggal Simpan</label>
                                                <input type="text" required class="form-control" name="tgl_simpanan" value="<?=$tgl_simpanan?>" id="mdate">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label>Jumlah Simpanan</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="rupiah" value="<?=rp2($jml_simpanan)?>" name="jml_simpanan">
                                                    <div class="input-group-append"><span class="input-group-text">.00</span>
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