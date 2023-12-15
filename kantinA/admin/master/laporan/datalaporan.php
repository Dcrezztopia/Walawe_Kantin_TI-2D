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
								<h4 class="card-title">Filter Laporan</h4>
							</div>
						</div>
						<div class="row card-body">

							<div class="col-md-4">
								<div class="form-group mb-3">
									<label for="inputMulaiTanggal" class="font-weight-bold">Mulai Tanggal :</label>
									<input type="date" id="inputMulaiTanggal" class="form-control" name="mulai_tanggal" value="<?php echo $mulai_tanggal ?>" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group mb-3">
									<label for="inputSampaiTanggal" class="font-weight-bold">Sampai Tanggal :</label>
									<input type="date" id="inputSampaiTanggal" class="form-control" name="sampai_tanggal" value="<?php echo $sampai_tanggal ?>" required>
								</div>
							</div>

							<div class="col-md-4 d-flex align-items-center mt-2">
								<button type="submit" name="tampil" class="btn btn-primary"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp; Tampilkan</button>
							</div>


						</div>
					</div>

					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Laporan Penghasilan</h4>
							</div>
						</div>
						<div class="row card-body">
							<div class="col-md-4">
								<div class="form-group mb-3">
									<label>Omzet</label>
									<input type="number" name="omzet" class="form-control" placeholder="Rp" readonly>
								</div>
							</div>

							<div class="col-md-4 d-flex align-items-center mt-2">
								<a href="cetaklaporan.php" target="_blank">
									<button type="button" name="cetak" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Cetak</button>
								</a>
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