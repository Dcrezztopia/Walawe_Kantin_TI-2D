<?php
include 'crudDataBarang.php';

$crudDataBarang = new crudDataBarang($conn);
?>
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
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>SKU</th>
                                            <th>Nama Supplier</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($conn, 'SELECT * from barang');
                                        while ($barang = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++ ?>
                                                </td>
                                                <td><img src="../img/<?php echo $barang['gambar'] ?>" alt="Gambar Barang" class="gambar-barang"></td>
                                                <td>
                                                    <?php echo $barang['namaBarang'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $barang['jenisBarang'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $barang['stok'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $barang['harga'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $barang['sku'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $barang['namaSupplier'] ?>
                                                </td>
                                                <td>

                                                    <a href="#modalEditBarang<?php echo $barang['idBarang'] ?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>

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
$p = mysqli_query($conn, 'SELECT * from barang');
while ($d = mysqli_fetch_array($p)) {
?>

    <!-- UPDATE -->
    <div class="modal fade" id="modalEditBarang<?php echo $d['idBarang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <input type="hidden" name="id" value="<?php echo $d['idBarang'] ?>">
                        <input type="hidden" name="gambarLama" value="<?php echo $d['gambar'] ?>">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input value="<?php echo $d['namaBarang'] ?>" type="text" name="namaBarang" class="form-control" placeholder="Barang" required="" readonly>
                        </div>
                        <div class="form-group">
                            <?php
                            $query = mysqli_query($conn, 'SELECT * FROM jenisbarang');
                            ?>
                            <label>Jenis Barang</label>
                            <select name="jenisbarang" class="form-control" required="" readonly>
                                <?php
                                while ($jenis_barang = mysqli_fetch_assoc($query)) {
                                    echo '<option value="' . $jenis_barang['jenisBarang'] . '">' . $d['jenisBarang'] . '</option>';
                                }
                                ?>
                            </select>
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
                            <input value="<?php echo $d['sku'] ?>" type="text" name="SKU" class="form-control" placeholder="SKU" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Supplier</label>
                            <input value="<?php echo $d['namaSupplier'] ?>" type="text" name="namaSupplier" class="form-control" placeholder="Nama Supplier" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <img src="../img/<?php echo $k['gambar'] ?>" width="100%" height="200">
                        </div>


                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-save"></i> Save
                            Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                            Close</button>
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
                            Stok Barang
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>
                            Close</button>
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
    <div class="modal fade" id="modalDetailBarang<?php echo $k['idBarang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                        <input type="hidden" name="id" value="<?php echo $k['idBarang'] ?>">
                        <input type="hidden" name="gambarLama" value="<?php echo $d['gambar'] ?>">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input readonly value="<?php echo $k['namaBarang'] ?>" type="text" name="namaBarang" class="form-control" placeholder="Barang" required="">
                        </div>
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <input readonly value="<?php echo $k['jenisBarang'] ?>" type="text" name="jenisBarang" class="form-control" placeholder="Jenis Barang ..." required="">
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input readonly value="<?php echo $k['stok'] ?>" type="number" name="stok" class="form-control" placeholder="Stok" required="">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input readonly value="<?php echo $k['harga'] ?>" type="number" name="harga" class="form-control" placeholder="Harga" required="">
                        </div>
                        <div class="form-group">
                            <label>SKU</label>
                            <input readonly value="<?php echo $k['sku'] ?>" type="text" name="sku" class="form-control" placeholder="SKU" required="">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <img src="../img/<?php echo $k['gambar'] ?>" width="100%" height="200">
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                            Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

<?php
if (isset($_POST['ubah'])) {
    $data = array(
        'id' => $_POST['id'],
        'namaBarang' => $_POST['namaBarang'],
        'jenisBarang' => $_POST['jenisBarang'],
        'stok' => $_POST['stok'],
        'harga' => $_POST['harga'],
        'sku' => $_POST['sku'],
        'gambarLama' => $_POST['gambarLama'],  // Menggunakan $_POST untuk gambar lama
        'foto' => $_FILES['foto']['name'],
        'file_tmp' => $_FILES['foto']['tmp_name'],
    );
    $crudDataBarang->Update($data);
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE from barang where idBarang='$id'");
    echo "<script>alert ('Data Berhasil Dihapus') </script>";
    echo "<meta http-equiv='refresh' content=0; URL=?view=databarang>";
}
?>