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
						<a href="?view=dashboard">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
					    <i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="?view=datajenisbarang">Jenis Barang</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Detail Jenis Barang</a>
					</li>
				</ul>
            </div>

            <div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
                            <div class="card-title">Detail Jenis Barang
								<a href="?view=datajenisbarang">
									<button	button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table">											
									<tr>
										<td>Jenis Barang</td>
										<td>:</td>
										<td><?php echo $d['jenis_barang'] ?></td>
									</tr>
                                     <tr>
										<td>Deskripsi</td>
										<td>:</td>
										<td><?php echo $d['deskripsi'] ?></td>
									</tr>
								</table>
							</div>
                            <div class="card-action">
								<a href="?view=datajenisbarang" class="btn btn-danger"><i class="fa fa-times"></i> Close</a>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>