<?php
include 'crudJenisBarang.php';
$crudJenisBarang = new CrudJenisBarang($conn);
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit</h4>
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
                        <a href="#">Jenis Barang</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Jenis Barang</a>
                    </li>
                </ul>
            </div>


            <?php

            $p = mysqli_query($conn, 'SELECT * from jenisbarang');
            while ($jenis = mysqli_fetch_array($p)) {
                ?>

                <!-- TAMBAH EDIT JENIS BARANG -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit Jenis Barang</div>
                            </div>

                            <form method="POST" enctype="multipart/form-data" action="">
                                <!-- <input type="hidden" name="jenisBarang" value="<?php echo $jenis['jenisbarang'] ?>"> -->
                                <div class="modal-body">
                                    <div class="form-group col-md-4 ml-3 mt-2">
                                        <label>Jenis Barang</label>
                                        <input value="<?php echo $jenis['jenisBarang'] ?>" type="text" name="jenis_barang"
                                            class="form-control" placeholder="Jenis Barang ..." required="">
                                    </div>
                                    <div class="form-group col-md-4 ml-3">
                                        <label>Deskripsi</label>
                                        <input value="<?php echo $jenis['deskripsi'] ?>" type="text" name="deskripsi"
                                            class="form-control" placeholder="Deskripsi ..." required="">
                                    </div>

                                </div>
                                <div class="card-action">
                                    <button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-save"></i>
                                        Save
                                        Changes</button>
                                    <a href="?view=datajenisbarang" class="btn btn-danger"><i class="fa fa-times"></i>
                                        Cancel</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php

if (isset($_POST['ubah'])) {
    $data = array('jenis_barang' => $_POST['jenis_barang'],
        'deskripsi' => $_POST['deskripsi']);
    // echo "<script>alert ('pe') </script>";
    $crudJenisBarang->Update($data);
}
?>