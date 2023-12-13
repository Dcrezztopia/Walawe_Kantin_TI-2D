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
                                            <th>Tanggal</th>
                                            <th>Jumlah Item</th>
                                            <th>Total Pembayaran</th>
                                            <th>NIP Pegawai</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($conn, 'SELECT * FROM waitingroom');
                                        while ($pengajuan = mysqli_fetch_array($query)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="#modalDetailBarang<?php echo $barang['jenisBarang'] ?>" data-toggle="modal" title="Detail" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
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


if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $id_ruangan = $_POST['id_ruangan'];

    $selSto = mysqli_query($conn, "SELECT * FROM ruangan WHERE id='$id_ruangan'");
    $sto    = mysqli_fetch_array($selSto);
    $sisa    = 'free';

    mysqli_query($conn, "UPDATE ruangan SET status='$sisa' WHERE id='$id_ruangan'");
    mysqli_query($conn, "DELETE from pinjamruangan where id='$id'");
    echo "<script>alert ('Data Berhasil Dihapus') </script>";
    echo "<meta http-equiv='refresh' content=0; URL=?view=datapinjamruangan>";
} elseif (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $id_ruangan = $_POST['id_ruangan'];

    $selSto = mysqli_query($conn, "SELECT * FROM ruangan WHERE id='$id_ruangan'");
    $sto    = mysqli_fetch_array($selSto);
    $sisa   = 'free';
    $status = 'selesai';

    mysqli_query($conn, "UPDATE ruangan SET status='$sisa' WHERE id='$id_ruangan'");
    mysqli_query($conn, "UPDATE pinjamruangan SET status='$status' where id='$id'");
    echo "<script>alert ('Data Berhasil Dihapus') </script>";
    echo "<meta http-equiv='refresh' content=0; URL=?view=datapinjamruangan>";
}
?>