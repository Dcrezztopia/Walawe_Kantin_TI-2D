<?php
include 'crudPengajuan.php';
$crudPengajuan = new CrudPengajuan($conn);
?>

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Tambah</h4>
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
						<a href="#">Tambah Pengajuan Barang</a>
					</li>
				</ul>
			</div>

			<!-- TAMBAH DAFTAR BARANG -->
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Jenis Barang
								<a href="?view=datapengajuan">
									<button	button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</a>
							</div>
						</div>
						
						<form method="POST" action="" enctype="multipart/form-data">
								<div class="form-group col-md-4 ml-3 mt-2">
									<label for="nama_barang">Nama Barang</label>
									<input type="text" id="nama_barang" name="nama_barang" class="form-control"	placeholder="Nama Barang ..." required>
								</div>
								<div class="form-group col-md-4 ml-3">
									<?php
									$query = mysqli_query($conn, 'SELECT * FROM jenisbarang');
									?>
									<label>Jenis Barang</label>
									<select name="jenis_barang" class="form-control" required="">
										<?php
										while ($jenis_barang = mysqli_fetch_assoc($query)) {
											echo '<option value="' . $jenis_barang['jenisBarang'] . '">' . $jenis_barang['jenisBarang'] . '</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group col-md-4 ml-3">
									<label>SKU</label>
									<input type="text" name="sku" class="form-control" placeholder="SKU ..."
										required="">
								</div>
								<div class="form-group col-md-4 ml-3">
									<label>Nama Supplier</label>
									<input type="text" name="namasupplier" class="form-control"
										placeholder="Nama Supplier ..." required="">
								</div>
								<div class="form-group col-md-4 ml-3">
									<label>Harga</label>
									<input type="number" name="harga" class="form-control" placeholder="Harga ..."
										required="">


									
							<label for="nama_barang">Nama Barang</label>
							<input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang..." required>
						</div>
						<div class="form-group">
							<label>Jenis Barang</label>
							<select name="jenis_barang" class="form-control" required="">
								<option value="makanan">Makanan</option>
								<option value="minuman">Minuman</option>
							</select>
						</div>
						<div class="form-group">
							<label>SKU</label>
							<input type="text" name="sku" class="form-control" placeholder="SKU ..." required="">
						</div>
						<div class="form-group">
							<label>Nama Supplier</label>
							<input type="text" name="namasupplier" class="form-control" placeholder="Nama Supplier ..." required="">
						</div>
						<div class="form-group">
							<label>Harga</label>
							<input type="number" name="harga" class="form-control" placeholder="Harga ..." required="">
						</div>

								</div>
								<div class="card-action">
									<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
									<a href="?view=datapengajuan" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
								</div>
						</form>
					</div>							
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$data = array(
		'nama_barang' => $_POST['nama_barang'],
		'jenis_barang' => $_POST['jenis_barang'],
		'sku' => $_POST['sku'],
		'namasupplier' => $_POST['namasupplier'],
		'harga' => $_POST['harga'],
	);

	$crudPengajuan->Create($data);
}
?>