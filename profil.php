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
                                 <!-- QUERY -->
                                <?php
                                    $query = "SELECT a.*, u.user_id FROM users as u, anggota as a WHERE u.no_anggota=a.no_anggota AND a.no_anggota='$session_id'";
                                    $sql = mysqli_query($con, $query);
                                    $data = mysqli_fetch_array($sql);
                                    foreach($data as $key=>$value) {$$key=$value;}
                                ?>
                                <!-- QUERY -->
                                <center><h1>Profil</h1></center>
                                <br><br>
                                <div class="basic-form">
                                        <h4 class="card-title">User Account</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Username</label>
                                                <input type="text" disabled required class="form-control" name="user_id" placeholder="Username" value="<?=$user_id?>">
                                                <input type="text" hidden required class="form-control" name="no_anggota" placeholder="Username" value="<?=$no_anggota?>">
                                            </div>
                                        </div>
                                        <br><br>
                                        <h4 class="card-title">Detail Anggota</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Nama Anggota</label>
                                                <input type="text" disabled required class="form-control" name="nama_anggota" placeholder="Nama Lengkap" value="<?=$nama_anggota?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Jenis Kelamin</label>
                                                <input type="text" disabled required class="form-control" name="jk" placeholder="Nama Lengkap" value="<?=$jk?>">    
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Tempat Lahir</label>
                                                <input type="text" disabled required class="form-control" name="tempat_lahir" placeholder="Contoh: Jakarta" value="<?=$tempat_lahir?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tanggal Lahir</label>
                                                <input type="text" disabled required class="form-control" name="tgl_lahir" value="<?=$tgl_lahir?>" id="mdate">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>No Handphone</label>
                                                <input type="text" disabled required class="form-control" name="nohp" placeholder="Contoh: 081XXXXXXXXX" value="<?=$nohp?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" disabled required class="form-control" name="alamat" placeholder="Contoh: Jl. Bunga No. 14, Jakarta Pusat" value="<?=$alamat?>">
                                        </div>
                                </div>
                                    <a href="profil_edit.php"><button type="button" class="btn btn-success">Edit Data</button></a>
                                    <button onclick="window.history.back()" class="btn btn-danger">Kembali</button>
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