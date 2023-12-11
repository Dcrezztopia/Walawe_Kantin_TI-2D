<?php
$query = mysqli_query($conn,"SELECT pinjamruangan.id, pinjamruangan.id_ruangan, pinjamruangan.id_user, pinjamruangan.tgl_mulai, pinjamruangan.tgl_selesai, pinjamruangan.status, ruangan.nama_ruangan, ruangan.foto, ruangan.deskripsi, user.nama_lengkap from pinjamruangan inner join ruangan on ruangan.id=pinjamruangan.id_ruangan inner join user on user.id=pinjamruangan.id_user and pinjamruangan.id='$_GET[id]'");
$d = mysqli_fetch_array($query);
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">View</h4>
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
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Detail Pengajuan Barang</a>
					</li>
				</ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Detail Pengajuan Barang</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Nama Barang</td>
                                        <td>:</td>
                                        <td><?php echo $d['nama_barang'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Barang</td>
                                        <td>:</td>
                                        <td><?php echo $d['jenisBarang'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>SKU</td>
                                        <td>:</td>
                                        <td><?php echo $d['sku'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Supplier</td>
                                        <td>:</td>
                                        <td><?php echo $d['namasupplier'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td><?php echo $d['harga'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Foto</td>
                                        <td>:</td>
                                        <td><img src="img/..<?php echo $d['foto'] ?>"
                                                width="400" height="200"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-action">
								<a href="?view=datapengajuan" class="btn btn-danger"><i class="fa fa-times"></i> Close</a>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>