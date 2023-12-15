<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Laporan</h4>
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
								<a href="#">Laporan</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Laporan Transaksi</h4>
									</div>
								</div>
								<div class="row card-body">	
									<div class="col-md-3">
										<div class="form-group mb-3">
											<label>Tanggal Transaksi</label>
											<input type="date" name="tanggalTransaksi" class="form-control">
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group mb-3">
											<label>Omzet</label>
											<input type="number" name="omzet" class="form-control" placeholder="Rp" readonly>
										</div>
									</div>

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
															$query = mysqli_query($conn,'SELECT * FROM transaksi');
															while ($transaksi = mysqli_fetch_array($query)) {
														?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $transaksi['kodeTransaksi'] ?></td>
													<td><?php echo $transaksi['tanggal'] ?></td>
													<td><?php echo $transaksi['jumlahitem'] ?></td>
													<td><?php echo $transaksi['totalPembayaran'] ?></td>
													<td><?php echo $transaksi['nip'] ?></td>
													<td>
													<a href="#modalDetailBarang<?php echo $transaksi['kodeTransaksi'] ?>"  data-toggle="modal" title="Detail" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
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
										$q = mysqli_query($conn, 'SELECT * FROM transaksi');
									
										while($k = mysqli_fetch_array($q)) {
									?>

									<div class="modal fade" id="modalDetailBarang<?php echo $k['kodeTransaksi'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Detail</span> 
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
													<input type="hidden" name="id" value="<?php echo $k['kodeTransaksi'] ?>">
													<div class="form-group">
														<label>Kode Transaksi</label>
														<input readonly value="<?php echo $k['kodeTransaksi'] ?>" type="number" name="kodeTransaksi" class="form-control" >
													</div>
													<div class="form-group">
														<label>Tanggal</label>
														<input readonly value="<?php echo $k['tanggal'] ?>" type="date" name="tanggal" class="form-control" >
													</div>
													<div class="form-group">
														<label>Jumlah Item</label>
														<input readonly value="<?php echo $k['jumlahitem'] ?>" type="number" name="jumlahitem" class="form-control">
													</div>
													<div class="form-group">
														<label>Total Pembayaran</label>
														<input readonly value="<?php echo $k['totalPembayaran'] ?>" type="number" name="totalpembayaran" class="form-control">
													</div>
													<div class="form-group">
														<label>Pegawai yang menangani</label>
														<input readonly value="<?php echo $k['nip'] ?>" type="number" name="nip" class="form-control">
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

								<?php } ?>
