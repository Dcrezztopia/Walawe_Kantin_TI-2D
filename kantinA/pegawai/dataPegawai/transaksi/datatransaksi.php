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
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Id Transaksi</th>
													<th>Tanggal</th>
													<th>Jumlah</th>
													<th>Total Pembayaran</th>
													<th>NIP Pegawai</th>
												</tr>
											</thead>
											
											<tbody>
											<?php
													$no = 1;
													$query = mysqli_query($conn,'SELECT * FROM waitingroom');
													while ($pengajuan = mysqli_fetch_array($query)) {
												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												
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
										$c = mysqli_query($conn,'SELECT pinjambarang.id, pinjambarang.id_barang, pinjambarang.id_user, pinjambarang.tgl_mulai, pinjambarang.tgl_selesai, pinjambarang.qty, pinjambarang.lokasi_barang, pinjambarang.status, barang.nama_barang from pinjambarang inner join barang on barang.id=pinjambarang.id_barang inner join user on user.id=pinjambarang.id_user');
										while($row = mysqli_fetch_array($c)) {
									?>

									<div class="modal fade" id="modalHapusPinjamBarang<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Batalkan</span> 
														<span class="fw-light">
															Pinjaman
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
													<input type="hidden" name="id_barang" value="<?php echo $row['id_barang'] ?>">
													<input type="hidden" name="qty" value="<?php echo $row['qty'] ?>">
													<h4>Apakah Anda Ingin Membatalkan Pinjamanan Ini ?</h4>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Batal Pinjam</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

									<?php 
										$c = mysqli_query($conn,'SELECT pinjambarang.id, pinjambarang.id_barang, pinjambarang.id_user, pinjambarang.tgl_mulai, pinjambarang.tgl_selesai, pinjambarang.qty, pinjambarang.lokasi_barang, pinjambarang.status, barang.nama_barang from pinjambarang inner join barang on barang.id=pinjambarang.id_barang inner join user on user.id=pinjambarang.id_user');
										while($row = mysqli_fetch_array($c)) {
									?>

									<div class="modal fade" id="modalKembalikanPinjamBarang<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Batalkan</span> 
														<span class="fw-light">
															Pinjaman
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
													<input type="hidden" name="id_barang" value="<?php echo $row['id_barang'] ?>">
													<input type="hidden" name="qty" value="<?php echo $row['qty'] ?>">
													<input type="hidden" name="status" value="selesai">
													<h4>Apakah Anda Ingin Mengembalikan Pinjamanan Ini ?</h4>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="ubah" class="btn btn-warning"><i class="fa fa-warning"></i> Kembalikan Pinjaman</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

		<?php 
			if(isset($_POST['hapus']))
			{
				$id = $_POST['id'];
				$id_barang = $_POST['id_barang'];
				$qty = $_POST['qty'];

				$selSto = mysqli_query($conn, "SELECT * FROM barang WHERE id='$id_barang'");
			    $sto    = mysqli_fetch_array($selSto);
			    $stok   = $sto['stok'];
			    $sisa    =$stok+$qty;

		        mysqli_query($conn, "UPDATE barang SET stok='$sisa' WHERE id='$id_barang'");
		        mysqli_query($conn,"DELETE from pinjambarang where id='$id'");
		        echo "<script>alert ('Data Berhasil Dihapus') </script>";
                echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjambarang>";
			
			}elseif(isset($_POST['ubah']))
			{
				$id = $_POST['id'];
				$id_barang = $_POST['id_barang'];
				$qty = $_POST['qty'];
				$status = $_POST['status'];

				$selSto = mysqli_query($conn, "SELECT * FROM barang WHERE id='$id_barang'");
			    $sto    = mysqli_fetch_array($selSto);
			    $stok   = $sto['stok'];
			    $sisa    =$stok+$qty;

		        mysqli_query($conn, "UPDATE barang SET stok='$sisa' WHERE id='$id_barang'");
		        mysqli_query($conn,"UPDATE pinjambarang set status='$status' where id='$id'");
		        echo "<script>alert ('Data Berhasil Dihapus') </script>";
                echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjambarang>";
			}
		?>

