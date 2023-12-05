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

					<!-- TAMBAH DAFTAR BARANG -->
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Pengajuan Barang</div>
								</div>
								<form method="POST" action="" enctype="multipart/form-data">
								<div class="form-group">
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
<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control" required="">
        <option value="menunggu">menunggu</option>
        <option value="disetujui">disetujui</option>
        <option value="ditolak">ditolak</option>
    </select>
</div>

									

								</div>
								<div class="card-action">
									<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
									<a href="?view=datapinjamruangan" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
								</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			<?php 
				echo $nama_barang;
				echo $deskripsi;
			?>
			function change(id_ruangan){
				document.getElementById('nama_ruangan').value = nama_ruangan[id_ruangan].nama_ruangan;
				document.getElementById('deskripsi').value = deskripsi[id_ruangan].deskripsi;
			};
		</script>

		<?php
		    if (isset($_POST['simpan'])) {
				$nama_barang = $_POST['nama_barang'];
				$jenis_barang = $_POST['jenis_barang'];
				$sku = $_POST['sku'];
				$namasupplier = $_POST['namasupplier'];
				$harga = $_POST['harga'];
				$status = $_POST['status'];
			
				// Ganti query INSERT menjadi sesuai dengan tabel waitingroom
				$query_insert = "INSERT INTO waitingroom (namabarang, jenisbarang, sku, namasupplier, harga, status) VALUES ('$nama_barang', '$jenis_barang', '$sku', '$namasupplier', '$harga', '$status')";
				
				// Eksekusi query INSERT
				$result = mysqli_query($conn, $query_insert);
			
				if ($result) {
					echo "<script>alert('Data Berhasil Disimpan')</script>";
					echo "<script>window.location.replace('?view=datapinjamruangan');</script>";
				} else {
					echo "<script>alert('Gagal menyimpan data')</script>";
				}
			}
			
		    ?>