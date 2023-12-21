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
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Tambah Transaksi</a>
					</li>
				</ul>
			</div>

			<!-- TAMBAH TRANSAKSI -->
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Tambah Transaksi
								<a href="?view=datatransaksi">
									<button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</a>
							</div>
						</div>
						<form method="POST" action="" enctype="multipart/form-data">
							<div class=" row card-body">
								<div class="col-md-4">
									<div style="display: grid; grid-template-columns:2fr 1fr;">
										<div class="form-group" id="skuFormGroup">
											<?php
											$query = mysqli_query($conn, 'SELECT * FROM barang');
											$queryCountItem = mysqli_query($conn, 'SELECT COUNT(*) AS total_items FROM cart');
											$resultCountItem = mysqli_fetch_assoc($queryCountItem);
											$totalItems = $resultCountItem['total_items'];

											$queryTotalJumlah = mysqli_query($conn, 'SELECT SUM(harga) AS total_jumlah FROM cart');
											$resultTotalJumlah = mysqli_fetch_assoc($queryTotalJumlah);
											$totalJumlah = $resultTotalJumlah['total_jumlah'];
											?>
											<label>SKU</label>
											<select class="form-control choices-single" id="sku" name="sku" autocomplete="on">
												<option></option>
												<?php
												while ($sku = mysqli_fetch_assoc($query)) {
													echo '<option value="' . $sku['idBarang'] . '">' . $sku['sku'] . '</option>';
												}
												?>
											</select>

											<span>Sisa Barang : <span id="sisaBarang"></span></span>
										</div>


										<!-- <div class="form-group" id="skuFormGroup">
											<label class="fw-bold">SKU</label>
											<input type="text" name="sku" id="skuInput" class="form-control" placeholder="RT001-001-STRW" required="">
											<span>Sisa Barang: XX</span>
										</div> -->

										<div class="d-flex" style="align-items: center; overflow: auto;">
											<span id="namaBarang"></span>
										</div>
									</div>
									<div style="display: grid; grid-template-columns:2fr 1fr;">
										<div class="form-group" id="jumlahFormGroup">
											<label class="fw-bold">Jumlah</label>
											<input type="number" name="jumlah" id="jumlahInput" class="form-control" placeholder="0">
										</div>
									</div>


									<div class="d-flex">
										<div class="form-group" id="totalNominal" style="width: 70px; padding-right: 0;">
											<label class="fw-bold">Total</label>
										</div>
										<div class="form-group w-100" id="angkaNominal" style="padding-left: 0;">
											<span id="total" style="color: red; font-size: 70px"><?php echo $totalJumlah == '' ? 0 : $totalJumlah ?></span>
										</div>
									</div>
									<div style="display: grid; grid-template-columns:2fr 1fr;">
										<div class="form-group" id="idTransaksiFormGroup">
											<label class="fw-bold">Nominal</label>
											<input type="number" name="nominal" id="nominalinput" class="form-control" placeholder="Rp">
										</div>
										<input type="hidden" name="totalBarang" value="<?= $totalItems; ?>">
										<input type="hidden" name="totalJumlah" value="<?= $totalJumlah; ?>">
									</div>

								</div>
								<div class="row col-md-8">
									<div class="table-responsive d-flex">
										<table id="add-row" class="display table table-striped table-hover">
											<thead>
												<tr>
													<th>No</th>
													<th>SKU</th>
													<th>Nama Barang</th>
													<th>Harga</th>
													<th>Jumlah</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												<!-- <td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>

												<td>
													<a href="modalHapusTransaksi<?php echo $row[''] ?>" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
												</td> -->

												<?php
												$no = 1;
												$query = mysqli_query($conn, 'SELECT barang.idBarang AS id_barang, cart.jumlah AS jumlah, barang.sku AS sku, barang.namaBarang AS nama_barang, barang.harga AS harga, cart.jumlah AS card from cart INNER JOIN barang ON cart.id_barang = barang.idBarang');

												while ($barang = mysqli_fetch_array($query)) {
												?>
													<tr>
														<td>
															<?php echo $no++ ?>
														</td>
														<td>
															<?php echo $barang['sku'] ?>
														</td>
														<td>
															<?php echo $barang['nama_barang'] ?>
														</td>
														<td>
														<td>Rp<?php echo number_format($barang['harga'], 0, ',', '.'); ?></td>
														</td>
														<td>
															<?php echo $barang['jumlah'] ?>
														</td>
														<td>
															<a href="#" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger hapusCart" data-id="<?php echo $barang['id_barang']; ?>"><i class="fa fa-trash"></i></a>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="card-action w-100">
								<button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
								<button type="submit" name="bayar" class="btn btn-success"><i class="fa fa-usd" aria-hidden="true"></i> Bayar</button>
								<!-- <a href="modalBayarTransaksi<?php echo $row[''] ?>">
								</a> -->
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="modalBayarTransaksi<?php echo $row[''] ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
						Kembalian</span>
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
					<input type="hidden" name="jenisBarang" value="<?php echo $row['jenisBarang'] ?>">
					<h4>Kembalian anda sebesar Rp</h4>
					<span id="total" style="color: red;">1000</span>
				</div>
				<div class="modal-footer no-bd">
					<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalHapusTransaksi<?php echo $row[''] ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
						Hapus</span>
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
					<input type="hidden" name="jenisBarang" value="<?php echo $row['jenisBarang'] ?>">
					<h4>Apakah anda ingin menghapus transaksi ini ?</h4>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	$(document).ready(function() {
		// Triggered when SKU selection changes
		$('#sku').change(function() {
			var selectedSku = $(this).val();

			// Make an Ajax request to fetch the stock value
			$.ajax({
				type: 'POST',
				url: 'dataPegawai/transaksi/getStock.php', // Replace with the actual server-side script to fetch stock value
				data: {
					sku: selectedSku
				},
				dataType: 'json',
				success: function(response) {
					console.log(response);
					// Update the "Sisa Barang" span with the fetched stock value							
					$('#sisaBarang').text(response.stok);
					$('#namaBarang').text(response.namaBarang);
				}
			});
		});
		$('.hapusCart').click(function() {
			var idBarang = $(this).data('id');


			$.ajax({
				type: 'POST',
				url: 'dataPegawai/transaksi/deleteTransaction.php', // Replace with your actual server-side script
				data: {
					id_barang: idBarang
				},
				success: function(response) {
					// Reload the page or update the table as needed
					location.reload();
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
					alert('Error occurred while deleting the transaction.');
				}
			});

		});
	});
</script>
<script type="text/javascript">
	<?php
	echo $stok;
	echo $deskripsi;
	echo $nama_barang;
	?>

	function changeValue(id) {
		document.getElementById('stok').value = stok[id].stok;
		document.getElementById('nama_barang').value = nama_barang[id].nama_barang;
	}
</script>


<?php
if (isset($_POST['simpan'])) {
	// Ambil data dari formulir
	$id_barang = $_POST['id_barang'];
	$id_user = $_POST['id_user'];
	$qty = $_POST['qty'];
	$tgl_mulai = $_POST['tgl_mulai'];
	$tgl_selesai = $_POST['tgl_selesai'];
	$lokasi_barang = $_POST['lokasi_barang'];
	$status = $_POST['status'];
	$email_user = $_POST['email_user'];
	$email_admin = $_POST['email_admin'];
	$password_user = $_POST['password_user'];
	$nama_barang = $_POST['nama_barang'];

	// Lakukan operasi penyimpanan data sesuai kebutuhan
	// ...

	// Tampilkan pesan atau redirect ke halaman yang sesuai
	echo "<script>alert('Data Berhasil Disimpan')</script>";
	echo "<script>window.location.replace('?view=datapinjambarang');</script>";
} else if (isset($_POST['tambah'])) {
	$id_barang = $_POST['sku'];
	$jumlah = $_POST['jumlah'];

	// query to search harga
	$querySearchHarga = "SELECT harga from barang WHERE idBarang = '$id_barang'";
	$resultSearchHarga = mysqli_query($conn, $querySearchHarga);
	// Ambil hasil query
	$rowHarga = mysqli_fetch_assoc($resultSearchHarga);

	// Ambil nilai harga
	$harga = $rowHarga['harga'] * $jumlah;

	// Lakukan validasi atau operasi lain jika diperlukan

	// Masukkan data ke dalam tabel cart
	$query = "INSERT INTO cart (id_barang, jumlah, harga) VALUES ('$id_barang', '$jumlah', '$harga')";
	$result = mysqli_query($conn, $query);

	if ($result) {
		// echo "<script>alert('Data berhasil ditambahkan ke dalam cart.')</script>";
		// Tambahkan redirect atau operasi lain sesuai kebutuhan
	} else {
		echo "Error: " . mysqli_error($conn);
	}
	echo "<script>window.location.replace('?view=createtransaksi');</script>";
} else if (isset($_POST['bayar'])) {
	$totalBarang = $_POST['totalBarang'];
	$totalJumlah = $_POST['totalJumlah'];
	$nominal = $_POST['nominal'];

	// Insert into 'transaksi' table
	$queryTransaksi = "INSERT INTO transaksi (jumlahitem, totalPembayaran, nip, tanggal) VALUES ('$totalBarang', '$totalJumlah', '1792371', CURDATE())";
	$resultTransaksi = mysqli_query($conn, $queryTransaksi);

	if ($resultTransaksi) {
		// Get the last inserted ID from 'transaksi' table
		$idTransaksi = mysqli_insert_id($conn);

		// Now, insert data into 'detailTransaksi' table
		// Ambil data dari tabel cart
		$sqlSelectCart = "SELECT * FROM cart";
		$resultCart = $conn->query($sqlSelectCart);

		// Periksa apakah ada data di tabel cart
		if ($resultCart->num_rows > 0) {
			// Loop through each row in cart table
			while ($rowCart = $resultCart->fetch_assoc()) {
				// Ambil data dari tabel cart
				$id_barang = $rowCart['id_barang'];
				$jumlah = $rowCart['jumlah'];
				$harga = $rowCart['harga'];

				// Insert data ke tabel detailTransaksi
				$sqlInsertDetail = "INSERT INTO detailTransaksi (kodeTransaksi, idBarang, jumlah, harga) VALUES ('$idTransaksi', '$id_barang', '$jumlah', '$harga')";
				$conn->query($sqlInsertDetail);
			}
			// Optional: Clear data from the 'cart' table after successful insertion
			$queryClearCart = "DELETE FROM cart";
			$resultClearCart = mysqli_query($conn, $queryClearCart);
			if (!$resultClearCart) {
				echo "Error clearing data from cart: " . mysqli_error($conn);
			}

			// Calculate the change (kembalian)
			$change = $nominal - $totalJumlah;
			$_SESSION['kembalian'] = $change;
?>
			<script>

			</script>
<?php
			// echo "<script>window.location.replace('?view=datatransaksi');</script>";
		} else {
			echo "<script>alert('Tidak ada data di tabel cart.')</script>";
			echo "<script>window.location.replace('?view=datatransaksi');</script>";
		}
	} else {
		echo "Error inserting data into transaksi: " . mysqli_error($conn);
		echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
	}

	echo "<script>window.location.replace('?view=createtransaksi');</script>";
}
?>

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1ZqjKw0BOyL8GfZ2mPAmUw/A763lSNtFqIo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
	<?php if (isset($_SESSION['kembalian'])) : ?>
		Swal.fire({
			title: 'Transaksi Berhasil!',
			text: `Kembalian Customer: Rp<?php echo $_SESSION['kembalian']; ?>`,
			icon: 'success',
			confirmButtonColor: '#2e8aff'
		});

	<?php endif; ?>
</script>