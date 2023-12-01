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
										<label>Stok</label>
										<input type="number" name="stok" class="form-control" placeholder="Stok ..." required="">
									</div>
									<div class="form-group">
									<label>Harga</label>
										<input type="number" name="harga" class="form-control" placeholder="Harga ..." required="">
									</div>
									<div class="form-group">
										<label>Foto</label>
										<input type="file" name="foto" class="form-control" placeholder required="">
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
				echo $nama_ruangan;
				echo $deskripsi;
			?>
			function change(id_ruangan){
				document.getElementById('nama_ruangan').value = nama_ruangan[id_ruangan].nama_ruangan;
				document.getElementById('deskripsi').value = deskripsi[id_ruangan].deskripsi;
			};
		</script>

		<?php
		    if (isset($_POST['simpan'])) {
			
		        $id_ruangan = $_POST['id_ruangan'];
		        $tgl_mulai = $_POST['tgl_mulai'];
		        $tgl_selesai = $_POST['tgl_selesai'];
		        $id_user = $_POST['id_user'];
		        $status = $_POST['status'];
		        
		        $nama_ruangan = $_POST['nama_ruangan'];

		        $selSto =mysqli_query($conn, "SELECT * FROM ruangan WHERE id='$id_ruangan'");
			    $sto    =mysqli_fetch_array($selSto);
			    $stok    =$sto['status'];
			    //menghitung sisa stok
			    $sisa    = 'dipinjam';

				 mysqli_query($conn,"INSERT into pinjamruangan values ('','$id_ruangan', '$id_user','$tgl_mulai','$tgl_selesai','$status')");
		         mysqli_query($conn, "UPDATE ruangan SET status='$sisa' WHERE id='$id_ruangan'");

		         echo "<script>alert ('Data Berhasil Disimpan') </script>";
                echo "<script>window.location.replace('?view=datapinjamruangan');</script>";

		    }
		    ?>