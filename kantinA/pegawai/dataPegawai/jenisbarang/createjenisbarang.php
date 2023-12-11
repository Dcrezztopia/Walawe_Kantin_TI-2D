		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Tambah</h4>
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
								<a href="#">Tambah Jenis Barang</a>
							</li>
						</ul>
					</div>

					<!-- TAMBAH JENIS BARANG -->

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
										<label>Jenis Barang</label>
										<input type="text" id="jenis_barang" name="jenis_barang" class="form-control" placeholder="Roti" required>
									</div>

									<div class="form-group col-md-4 ml-3 mb-3">											
										<label>Deskripsi</label>
										<textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Roti" rows="8" required></textarea>
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
					echo "<script>window.location.replace('?view=datapengajuan');</script>";
				} else {
					echo "<script>alert('Gagal menyimpan data')</script>";
				}
			}
			
		    ?>