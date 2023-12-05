<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data</h4>
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
								<a href="#">Kantin</a>
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
										
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Id Waiting</th>
													<th>Nama Barang</th>
													<th>Jenis Barang</th>
													<th>SKU </th>
													<th>Nama Supplier</th>
													<th>Harga</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>
												<?php
													$no = 1;
													$query = mysqli_query($conn,'SELECT * from waitingroom');
													while ($pinjamruangan = mysqli_fetch_array($query)) {
												?>
												<tr>
												<input type="hidden" name="id_waiting" value="<?php echo $pinjamruangan['id_waiting']; ?>">
													<td><?php echo $no++ ?></td>
													<td><?php echo $pinjamruangan['namabarang'] ?></td>
													<td><?php echo $pinjamruangan['jenisbarang'] ?></td>
													<td><?php echo $pinjamruangan['sku'] ?></td>
													<td><?php echo $pinjamruangan['namasupplier'] ?></td>
													<td><?php echo $pinjamruangan['harga'] ?></td>
													<td>
                                                        <?php if ($pinjamruangan['status'] == 'menunggu') { ?>
                                                            <div class="badge badge-warning"><?php echo $pinjamruangan['status'] ?></div>
                                                        <?php } elseif ($pinjamruangan['status'] == 'disetujui') { ?>
                                                            <div class="badge badge-success"><?php echo $pinjamruangan['status'] ?></div>
                                                        <?php } else { ?>
                                                            <div class="badge badge-danger"><?php echo $pinjamruangan['status'] ?></div>
                                                        <?php } ?>
                                                    </td>
													<td>
														<form method="POST" action="">
														<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Accept </button>
            											</form>
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
if (isset($_POST['accept'])) {
    $id_waiting = $_POST['id_waiting'];
    $nama_barang = $_POST['namabarang'];
    $jenis_barang = $_POST['jenisbarang'];
    $sku = $_POST['sku'];
    $namasupplier = $_POST['namasupplier'];
    $harga = $_POST['harga'];

    // Masukkan data ke tabel 'barang'
    mysqli_query($conn, "INSERT INTO barang (namaBarang, jenisBarang, sku, harga) VALUES ('$nama_barang', '$jenis_barang', '$sku', '$harga')");

    // Masukkan data ke tabel 'supplier'
    mysqli_query($conn, "INSERT INTO supplier (namaSupplier) VALUES ('$namasupplier')");

    // Hapus data dari 'waitingroom' berdasarkan ID Waiting
    mysqli_query($conn, "DELETE FROM waitingroom WHERE id_waiting = $id_waiting");

    echo "<script>alert ('Data Berhasil Disimpan') </script>";
    echo "<meta http-equiv='refresh' content=0; URL=?view=databarang>";
}
?>