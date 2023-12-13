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
                                <a href="?view=createpengajuan" class="btn btn-primary btn-round ml-auto">
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

                                            <th>ID Waiting</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Harga</th>
                                            <th>SKU</th>
                                            <th>Nama Supplier</th>
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
                                                <td>
                                                    <?php echo $pengajuan['sku'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $pengajuan['namasupplier'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $pengajuan['harga'] ?>
                                                </td>
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
                                                    <a href="?view=editpengajuan" title="Edit"
                                                        class="btn btn-xs btn-warning">
                                                        <i class="fa fa-edit"></i></a>
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