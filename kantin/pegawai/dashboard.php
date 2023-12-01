<?php 
$query = mysqli_query($conn,'SELECT count(*) as barang from barang');
$row = mysqli_fetch_array($query);
?>

<?php 
$p = mysqli_query($conn,'SELECT count(*) as ruangan from ruangan');
$q = mysqli_fetch_array($p);
?>

<?php 
$key = mysqli_query($conn,'SELECT count(*) as user from user');
$b = mysqli_fetch_array($key);
?>

<?php 
$r = mysqli_query($conn,'SELECT count(*) as pinjambarang from pinjambarang');
$d = mysqli_fetch_array($r);
?>

<?php 
$t = mysqli_query($conn,'SELECT count(*) as pinjamruangan from pinjamruangan');
$z = mysqli_fetch_array($t);
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Transaksi</p>
                                        <h4 class="card-title"><?php echo $row['barang'] ?></h4>
                                        <a href="?view=datatransaksi" class="btn btn-primary"><i
                                                class="fa fa-folder-open-o" aria-hidden="true"></i>Kelola</a>
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
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Data Pengajuan</p>
                                        <h4 class="card-title"><?php echo $q['ruangan'] ?></h4>
                                        <a href="?view=datapengajuan" class="btn btn-primary"><i
                                                class="fa fa-folder-open-o" aria-hidden="true"></i>Kelola</a>
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