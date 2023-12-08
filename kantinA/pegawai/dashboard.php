<?php
$query = mysqli_query($conn, 'SELECT count(*) as transaksi from transaksi');
$row = mysqli_fetch_array($query);
?>

<?php
$p = mysqli_query($conn, 'SELECT count(*) as pengajuan from waitingroom');
$q = mysqli_fetch_array($p);
?>

<?php
$key = mysqli_query($conn, 'SELECT count(*) as barang from barang');
$b = mysqli_fetch_array($key);
?>

<div class="main-panel">
    <div class="content">
        <div class="my-3" style="margin: 0 2rem;">
			<h1 class="fw-bold">Dashboard Pegawai</h1>
			<hr>
		</div>
        <div class="page-inner">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Data Transaksi</p>
                                        <h4 class="card-title"><?php echo $row['transaksi'] ?></h4>
<<<<<<< HEAD
                                        <a href="?view=datatransaksi" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i>Kelola</a>
=======
                                        <a href="?view=datatransaksi" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Kelola</a>
>>>>>>> 775a34432d55a786c70c33ed89ae2d49ba191e11
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fa fa-upload"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Data Pengajuan Barang</p>
                                        <h4 class="card-title"><?php echo $q['pengajuan'] ?></h4>
<<<<<<< HEAD
                                        <a href="?view=datapengajuan" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i>Kelola</a>
=======
                                        <a href="?view=datapengajuan" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Kelola</a>
>>>>>>> 775a34432d55a786c70c33ed89ae2d49ba191e11
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
<<<<<<< HEAD
                                        <i class="fas fa-check-circle"></i>
=======
                                        <i class="fa fa-suitcase"></i>
>>>>>>> 775a34432d55a786c70c33ed89ae2d49ba191e11
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Data Jenis Barang</p>
                                        <h4 class="card-title"><?php echo $b['barang'] ?></h4>
<<<<<<< HEAD
                                        <a href="?view=databarang" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i>Kelola</a>
=======
                                        <a href="?view=datajenisbarang" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Kelola</a>
>>>>>>> 775a34432d55a786c70c33ed89ae2d49ba191e11
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
<<<<<<< HEAD
                                        <i class="fas fa-check-circle"></i>
=======
                                        <i class="fas fa-briefcase"></i>
>>>>>>> 775a34432d55a786c70c33ed89ae2d49ba191e11
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Data Barang</p>
                                        <h4 class="card-title"><?php echo $b['barang'] ?></h4>
<<<<<<< HEAD
                                        <a href="?view=databarang" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i>Kelola</a>
=======
                                        <a href="?view=databarang" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Kelola</a>
>>>>>>> 775a34432d55a786c70c33ed89ae2d49ba191e11
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>