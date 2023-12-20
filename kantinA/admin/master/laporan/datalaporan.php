<style>
	.no-border,
	.no-border th,
	.no-border td {
		border: none;
	}
</style>


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
			<form method="POST" enctype="multipart/form-data" action="">
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
								<?php
								$no = 1;
								$query = mysqli_query($conn, 'SELECT * FROM omset where id = 1');
								while ($omset = mysqli_fetch_array($query)) {
								?>
									<div class="col-md-5 mb-4 ml-3">
										<table class="table table-bordered border-light no-border">
											<tbody>
												<tr>
													<td class="font-weight-bold">Mulai Tanggal</td>
													<td class="font-weight-bold">:</td>
													<td><?php echo date('d/m/Y', strtotime($omset['tanggalMulai'])) ?></td>
												</tr>
												<tr>
													<td class="font-weight-bold">Sampai Tanggal</td>
													<td class="font-weight-bold">:</td>
													<td><?php echo date('d/m/Y', strtotime($omset['tanggalSelesai'])) ?></td>
												</tr>
											<?php } ?>
											</tbody>
										</table>

										<div class="row">
											<?php
											$no = 1;
											$query = mysqli_query($conn, 'SELECT nilai_omset FROM omset where id = 1');
											while ($omset = mysqli_fetch_array($query)) {
											?>
												<div class="form-group col-md-7">
													<label>Omzet</label>
													<input readonly value="<?php echo $omset['nilai_omset'] ?>" type="number" name="omset" class="form-control">
												</div>

												<div class="d-flex align-items-center form-group mt-4">
													<a href="?view=export.php" target="_blank">
														<button type="button" name="cetak" class="btn btn-success w-100"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Cetak</button>
													</a>
												</div>
										</div>
									<?php } ?>

									</div>
			</form>


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
						$query_omset_date = mysqli_query($conn, "SELECT tanggalMulai, tanggalSelesai FROM omset WHERE id = 1");
						$omset_date = mysqli_fetch_assoc($query_omset_date);
						$tanggal_mulai_omset = $omset_date['tanggalMulai'];
						$tanggal_selesai_omset = $omset_date['tanggalSelesai'];
						$no = 1;
						$query = mysqli_query($conn, "SELECT * FROM transaksi WHERE tanggal BETWEEN '$tanggal_mulai_omset' AND '$tanggal_selesai_omset'");
						while ($transaksi = mysqli_fetch_array($query)) {
						?>

							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $transaksi['kodeTransaksi'] ?></td>
								<td><?php echo date('d/m/Y', strtotime($transaksi['tanggal'])) ?></td>
								<td><?php echo $transaksi['jumlahitem'] ?></td>
								<td><?php echo $transaksi['totalPembayaran'] ?></td>
								<td><?php echo $transaksi['nip'] ?></td>
								<td>
									<a href="#modalDetailTransaksi<?php echo $transaksi['kodeTransaksi'] ?>" data-toggle="modal" title="Detail" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
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
$q = mysqli_query($conn, 'SELECT t.kodeTransaksi, t.tanggal, b.sku, dt.jumlah, dt.harga FROM transaksi t JOIN detailtransaksi dt 
ON t.kodeTransaksi = dt.kodeTransaksi JOIN barang b ON dt.idBarang = b.idBarang;
');

while ($k = mysqli_fetch_array($q)) {
?>

	<div class="modal fade" id="modalDetailTransaksi<?php echo $k['kodeTransaksi'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Detail</span>
						<span class="fw-light">
							Transaksi
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
							<input readonly value="<?php echo $k['kodeTransaksi'] ?>" type="number" name="kodeTransaksi" class="form-control">
						</div>
						<div class="form-group">
							<label>Tanggal</label>
							<input readonly value="<?php echo $k['tanggal'] ?>" type="date" name="tanggal" class="form-control">
						</div>
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>SKU</th>
										<th>Jumlah</th>
										<th>Harga</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$s = mysqli_query($conn, 'SELECT 
                                t.kodeTransaksi,
                                t.tanggal,
                                b.sku,
                                dt.jumlah,
                                dt.harga
                                FROM 
                                transaksi t
                                JOIN 
                                detailtransaksi dt ON t.kodeTransaksi = dt.kodeTransaksi
                                JOIN 
                                barang b ON dt.idBarang = b.idBarang;
                                ');

									while ($k = mysqli_fetch_array($s)) {
									?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $k['sku'] ?></td>
											<td><?php echo $k['jumlah'] ?></td>
											<td><?php echo $k['harga'] ?></td>

										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal-footer no-bd">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php

if (isset($_POST['tampil'])) {
	echo "Mulai Tanggal: " . $_POST['mulai_tanggal'] . "<br>";
	echo "Sampai Tanggal: " . $_POST['sampai_tanggal'] . "<br>";

	$mulai_tanggal = $_POST['mulai_tanggal'];
	$sampai_tanggal = $_POST['sampai_tanggal'];
	// Query untuk menghitung total omset dalam rentang tanggal
	$query_omset = "SELECT SUM(totalPembayaran) AS totalOmset
                    FROM transaksi
                    WHERE tanggal BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'";

	$result_omset = mysqli_query($conn, $query_omset);

	if ($result_omset) {
		$omset_data = mysqli_fetch_assoc($result_omset);
		$omzet = $omset_data['totalOmset'];
		$query_update_omset = "UPDATE omset SET nilai_omset = $omzet, tanggalMulai = '$mulai_tanggal', tanggalSelesai = '$sampai_tanggal' WHERE id = 1";

		mysqli_query($conn, $query_update_omset);
		echo "<meta http-equiv='refresh' content=0; URL=?view=datalaporan>";
	} else {
		echo "Error: " . mysqli_error($conn);
		echo "<script>alert('Data Tidak Disimpan 3')</script>";
	}
}
?>


<!-- <?php

		// if (isset($_POST['tampil'])) {
		//     // Ambil nilai tanggal mulai dan tanggal sampai dari form
		//     $mulai_tanggal = $_POST['mulai_tanggal'];
		//     $sampai_tanggal = $_POST['sampai_tanggal'];

		//     // Query untuk menghitung total omset dalam rentang tanggal
		//     $query_omset = "SELECT SUM(totalPembayaran) AS totalOmset
		//                     FROM transaksi
		//                     WHERE tanggal BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'";

		//     $result_omset = mysqli_query($conn, $query_omset);

		//     if ($result_omset) {
		//         $omset_data = mysqli_fetch_assoc($result_omset);
		//         $total_omset = $omset_data['totalOmset'];
		// 		echo "Total Omset dari $mulai_tanggal sampai $sampai_tanggal adalah: $total_omset";

		//         // Tampilkan total omset pada input field "Omzet"
		//         echo '<script>
		//                 document.getElementsByName("omzet")[0].value = "' . number_format($total_omset, 0, ',', '.') . '";
		//               </script>';
		//     } else {
		//         echo "Error: " . mysqli_error($conn);
		//     }
		// }
		?> -->