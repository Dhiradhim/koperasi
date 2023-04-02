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
                                <center><h1>Form Pendaftaran Anggota</h1></center>
                                <br><br>
                                
                                <div class="basic-form">
                                    <form method="post" action="anggota_save.php">
                                    <h4 class="card-title">User Account</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Username</label>
                                                <input type="text" required class="form-control" name="user_id" placeholder="Username">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Password</label>
                                                <input type="password" required class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Confirm Password</label>
                                                <input type="password" required class="form-control" name="confirmpassword" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <br><br>
                                    <h4 class="card-title">Detail Anggota</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Nama Anggota</label>
                                                <input type="text" required class="form-control" name="nama_anggota" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" required id="sel1" name="jk">
                                                <option value="" hidden>Pilih</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Tempat Lahir</label>
                                                <input type="text" required class="form-control" name="tempat_lahir" placeholder="Contoh: Jakarta">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tanggal Lahir</label>
                                                <input type="text" required class="form-control" name="tgl_lahir" placeholder="2023-01-01" id="mdate">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>No Handphone</label>
                                                <input type="text" required class="form-control" name="nohp" placeholder="Contoh: 081XXXXXXXXX">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" required class="form-control" name="alamat" placeholder="Contoh: Jl. Bunga No. 14, Jakarta Pusat">
                                        </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Daftar</button>
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