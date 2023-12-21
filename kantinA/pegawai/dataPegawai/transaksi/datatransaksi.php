<?php unset($_SESSION['kembalian']); ?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Transaksi</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Transaksi</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Transaksi</h4>
                                <a href="?view=createtransaksi" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Transaksi</th>
                                            <th>Jumlah Item</th>
                                            <th>Total Pembayaran</th>
                                            <th>NIP Pegawai</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($conn, 'SELECT * FROM transaksi');
                                        while ($pengajuan = mysqli_fetch_array($query)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?= $pengajuan['kodeTransaksi']; ?></td>
                                                <td><?= $pengajuan['jumlahitem']; ?></td>
                                                <td>Rp<?php echo number_format($pengajuan['totalPembayaran'], 0, ',', '.'); ?></td>
                                                <td><?= $pengajuan['nip']; ?></td>
                                                <td><?= date('d/m/Y', strtotime($pengajuan['tanggal'])); ?></td>
                                                <td>
                                                    <a href="#modalDetailTransaksi<?php echo $pengajuan['kodeTransaksi'] ?>" data-toggle="modal" title="Detail" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>

                                                </td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$q = mysqli_query($conn, 'SELECT t.kodeTransaksi, t.tanggal, b.sku, dt.jumlah, dt.harga FROM transaksi t JOIN detailtransaksi dt 
ON t.kodeTransaksi = dt.kodeTransaksi JOIN barang b ON dt.idBarang = b.idBarang;
');

while ($k = mysqli_fetch_array($q)) {
?>

    <!-- READ -->
    <div class="modal fade" id="modalDetailTransaksi<?php echo $k['kodeTransaksi'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Detail</span>
                        <span class="fw-light">
                            Transaksi
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $k['kodeTransaksi'] ?>">
                        <div class="form-group">
                            <label>Kode Transaksi</label>
                            <input readonly value="<?php echo $k['kodeTransaksi'] ?>" type="number" name="kodeTransaksi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input readonly value="<?php echo $k['tanggal'] ?>" type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>SKU</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $s = mysqli_query($conn, "SELECT 
t.kodeTransaksi,
t.tanggal,
b.sku,
dt.jumlah,
dt.harga
FROM 
transaksi t
JOIN 
detailtransaksi dt ON t.kodeTransaksi = dt.kodeTransaksi
JOIN 
barang b ON dt.idBarang = b.idBarang
WHERE 
t.kodeTransaksi = '{$k['kodeTransaksi']}'");

                                    while ($k = mysqli_fetch_array($s)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $k['sku'] ?></td>
                                            <td><?php echo $k['jumlah'] ?></td>
                                            <td>Rp<?php echo number_format($k['harga'], 0, ',', '.'); ?></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

<?php
if (isset($_POST['ubah'])) {
    $id_Waiting = $_POST['id'];
    $nama_barang = $_POST['namabarang'];
    $jenis_barang = $_POST['jenisbarang'];
    $sku = $_POST['sku'];
    $namaSupplier = $_POST['namaSupplier'];
    $harga = $_POST['harga'];


    mysqli_query($conn, "UPDATE waitingroom set namabarang='$nama_barang', jenisbarang='$jenis_barang', sku='$sku', namasupplier='$namaSupplier', harga='$harga' where id_waiting='$id_Waiting'");
    echo "<script>alert ('Data Berhasil Diubah') </script>";
    echo "<meta http-equiv='refresh' content=0; URL=?view=datapengajuan>";
}
?>