<?php
session_start();

include "../koneksi.php";

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    $username = $_SESSION['username'];
    $level = $_SESSION['level'];

    $ambildata = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND level='$level'");
    $user = mysqli_fetch_assoc($ambildata);
}
?>

<div class="main-panel" style="margin-top: -40px;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Profil</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="?view=dashboard">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Profil</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row card-body">                           
                            <div class="row">
                                <div class="col-sm-8 ml-5 mr-5 mt-3 text-center">
                                    <img src="../assets/img/pegawai.png" class="rounded" alt="user" width="201" height="177">
                                    <h4 class="fw-bold mt-3">PEGAWAI</h4>        
                                    <a href="?view=editprofil">Edit Profil</a>                           
                                </div>
                            </div>     
                              
                            <div class="col-sm-4 mb-4">
                                <div class="form-group" id="namaFormGroup">
                                    <label class="fw-bold">Nama</label>
                                    <input type="text" id="nama" class="form-control" value="<?= $user['nama_lengkap']?>" readonly>
                                </div>
                                <div class="form-group" id="usernameFormGroup">
                                    <label class="fw-bold">Username</label>
                                    <input type="text" id="username" class="form-control" value="<?= $user['username']?>" readonly>
                                </div>
                                <div class="form-group" id="nipFormGroup">
                                    <label class="fw-bold">NIP</label>
                                    <input type="number" id="nip" class="form-control" value="<?= $user['nip']?>" readonly>
                                </div>
                                <div class="form-group" id="passwordFormGroup">
                                    <label class="fw-bold">Password</label>
                                    <input type="password" id="password" class="form-control" value="<?= $user['password']?>" readonly>
                                </div>
                                
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php mysqli_close($conn); ?>