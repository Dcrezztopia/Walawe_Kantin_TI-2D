<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Stok Barang</h4>
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
                        <a href="#">Stok Barang</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Stok Barang</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>SKU</th>
                                            <th>ID Supplier</th>
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
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="#modalDetailBarang<?php echo $barang['idBarang'] ?>" data-toggle="modal" title="Detail" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a href="#modalEditBarang<?php echo $barang['idBarang'] ?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                                    <a href="#modalHapusBarang<?php echo $barang['idBarang'] ?>" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
$p = mysqli_query($conn, 'SELECT * from waitingroom');
while ($d = mysqli_fetch_array($p)) {
?>

    <!-- UPDATE -->
    <div class="modal fade" id="modalEditBarang<?php echo $d['id_waiting'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Edit</span>
                        <span class="fw-light">
                            Stok Barang
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $d['id_waiting'] ?>">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input value="<?php echo $d['namabarang'] ?>" type="text" name="namabarang" class="form-control" placeholder="Nama Barang" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <input value="<?php echo $d['jenisbarang'] ?>" type="text" name="jenisbarang" class="form-control" placeholder="Jenis Barang" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input value="<?php echo $d['stok'] ?>" type="number" name="stok" class="form-control" placeholder="Stok" required="">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input value="<?php echo $d['harga'] ?>" type="number" name="harga" class="form-control" placeholder="Harga" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>SKU</label>
                            <input value="<?php echo $d['sku'] ?>" type="text" name="sku" class="form-control" placeholder="SKU" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>ID Supplier</label>
                            <input value="<?php echo $d['namasupplier'] ?>" type="text" name="namasupplier" class="form-control" placeholder="Nama Supplier" required="" readonly>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

<?php
$q = mysqli_query($conn, 'SELECT * FROM barang');

while ($k = mysqli_fetch_array($q)) {
?>

    <!-- READ -->
    <div class="modal fade" id="modalDetailBarang<?php echo $k['jenisBarang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Detail</span>
                        <span class="fw-light">
                            Stok Barang
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $d['id_waiting'] ?>">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input value="<?php echo $d['namabarang'] ?>" type="text" name="namabarang" class="form-control" placeholder="Nama Barang" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <input value="<?php echo $d['jenisbarang'] ?>" type="text" name="jenisbarang" class="form-control" placeholder="Jenis Barang" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input value="<?php echo $d['stok'] ?>" type="number" name="stok" class="form-control" placeholder="Stok" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input value="<?php echo $d['harga'] ?>" type="number" name="harga" class="form-control" placeholder="Harga" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>SKU</label>
                            <input value="<?php echo $d['sku'] ?>" type="text" name="sku" class="form-control" placeholder="SKU" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>ID Supplier</label>
                            <input value="<?php echo $d['namasupplier'] ?>" type="text" name="namasupplier" class="form-control" placeholder="Nama Supplier" required="" readonly>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

<?php
$c = mysqli_query($conn, 'SELECT * from barang');
while ($row = mysqli_fetch_array($c)) {
?>

    <!-- DELETE -->
    <div class="modal fade" id="modalHapusBarang<?php echo $row['idBarang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Hapus</span>
                        <span class="fw-light">
                            Barang
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $row['idBarang'] ?>">
                        <h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
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
    echo "<meta http-equiv='refresh' content=0; URL=?view=datastokbarang>";
}
?>