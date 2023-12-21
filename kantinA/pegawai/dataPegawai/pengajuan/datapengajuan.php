<?php
include 'crudPengajuan.php';

$crudPengajuan = new CrudPengajuan($conn);
?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengajuan Barang</h4>
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
                        <a href="#">Pengajuan Barang</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Pengajuan Barang</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddBarang">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>

                                            <th>ID Waiting</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Harga</th>
                                            <th>SKU</th>
                                            <th>Nama Supplier</th>
                                            <th>Gambar</th>
                                            <th>Status</th>
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
                                                <td>
                                                    <?php echo $no++ ?>
                                                </td>
                                                <td>
                                                    <?php echo $pengajuan['namabarang'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $pengajuan['jenisbarang'] ?>
                                                </td>
                                                <td>Rp<?php echo number_format($pengajuan['harga'], 0, ',', '.'); ?></td>
                                                <td>
                                                    <?php echo $pengajuan['sku'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $pengajuan['namasupplier'] ?>
                                                </td>
                                                <td><img src="../img/<?php echo $pengajuan['gambar'] ?>" alt="Gambar Barang" class="gambar-barang"></td>
                                                <td>
                                                    <?php if ($pengajuan['status'] == 'menunggu') { ?>
                                                        <div class="badge badge-warning">
                                                            <?php echo $pengajuan['status'] ?>
                                                        </div>
                                                    <?php } elseif ($pengajuan['status'] == 'disetujui') { ?>
                                                        <div class="badge badge-success">
                                                            <?php echo $pengajuan['status'] ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="badge badge-danger">
                                                            <?php echo $pengajuan['status'] ?>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="#modalEditBarang<?php echo $pengajuan['id_waiting'] ?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
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



<!-- CREATE -->
<div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Tambah</span>
                    <span class="fw-light">
                        Pengajuan Barang
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <?php
                        $query = mysqli_query($conn, 'SELECT * FROM jenisbarang');
                        ?>
                        <label>Jenis Barang</label>
                        <select name="jenis_barang" class="form-control" required="">
                            <?php
                            while ($jenis_barang = mysqli_fetch_assoc($query)) {
                                echo '<option value="' . $jenis_barang['jenisBarang'] . '">' . $jenis_barang['jenisBarang'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" name="sku" class="form-control" placeholder="SKU" required="" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" name="namasupplier" class="form-control" placeholder="Nama Supplier" required="" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" placeholder="Harga" required="" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" placeholder required="">
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i>
                            Save</button>
                        <button type="button" name="close" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
$p = mysqli_query($conn, 'SELECT * from waitingroom');
while ($pengajuan = mysqli_fetch_array($p)) {
?>

    <!-- UPDATE -->
    <div class="modal fade" id="modalEditBarang<?php echo $pengajuan['id_waiting'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Edit</span>
                        <span class="fw-light">
                            Pengajuan
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $pengajuan['id_waiting'] ?>">
                        <input type="hidden" name="gambarLama" value="<?php echo $pengajuan['gambar'] ?>">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input value="<?php echo $pengajuan['namabarang'] ?>" type="text" name="namabarang" class="form-control" placeholder="Nama Barang" required="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <?php
                            $query = mysqli_query($conn, 'SELECT * FROM jenisbarang');
                            ?>
                            <label>Jenis Barang</label>
                            <select name="jenisbarang" class="form-control" required="">
                                <?php
                                while ($jenis_barang = mysqli_fetch_assoc($query)) {
                                    // $selected = ($jenis_barang['jenisBarang'] == $pengajuan['jenisbarang']) ? 'selected' : '';
                                    // echo '<option value="' . $jenis_barang['jenisBarang'] . '" ' . $selected . '>' . $jenis_barang['jenisBarang'] . '</option>';  
                                    echo '<option value="' . $pengajuan['jenisbarang'] . '">' . $jenis_barang['jenisBarang'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>SKU</label>
                            <input value="<?php echo $pengajuan['sku'] ?>" type="text" name="sku" class="form-control" placeholder="SKU" required="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Nama Supplier</label>
                            <input value="<?php echo $pengajuan['namasupplier'] ?>" type="text" name="namasupplier" class="form-control" placeholder="Nama Supplier" required="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input value="<?php echo $pengajuan['harga'] ?>" type="number" name="harga" class="form-control" placeholder="Harga" required="">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <img src="../img/<?php echo $pengajuan['gambar'] ?>" class="gambar-barang">
                            <input type="file" name="foto" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        <button type="button" name="close" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

<?php } ?>

<?php
if (isset($_POST['simpan'])) {
    $data = array(
        'nama_barang' => $_POST['nama_barang'],
        'jenis_barang' => $_POST['jenis_barang'],
        'sku' => $_POST['sku'],
        'namasupplier' => $_POST['namasupplier'],
        'harga' => $_POST['harga'],
        'foto' => $_FILES['foto']['name'],
        'file_tmp' => $_FILES['foto']['tmp_name'],
    );

    $crudPengajuan->Create($data);
} else if (isset($_POST['ubah'])) {
    $data = array(
        'id_waiting' => $_POST['id'],
        'nama_barang' => $_POST['namabarang'],
        'jenis_barang' => $_POST['jenisbarang'],
        'sku' => $_POST['sku'],
        'namasupplier' => $_POST['namasupplier'],
        'harga' => $_POST['harga'],
        'foto' => $_FILES['foto']['name'],
        'file_tmp' => $_FILES['foto']['tmp_name'],
    );
    // echo "<script>alert ('pe') </script>";
    $crudPengajuan->Update($data);
}

?>