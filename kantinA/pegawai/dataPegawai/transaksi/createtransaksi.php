

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
										<div class="col-md-6">
											<div style="display: grid; grid-template-columns:1fr 1fr;">
												<div class="form-group" id="skuFormGroup">
													<label class="fw-bold">SKU</label>
													<input type="text" name="sku" id="skuInput" class="form-control" placeholder="RT001-001-STRW" required="">
													<span>Sisa Barang: XX</span>
												</div>

												<div class="d-flex" style="align-items: center; overflow: auto;">
													<span>Roti Strawberry</span>
												</div>
											</div>
											<div style="display: grid; grid-template-columns:1fr 1fr;">
												<div class="form-group" id="jumlahFormGroup">
													<label class="fw-bold">Jumlah</label>
													<input type="number" name="harga" id="jumlahInput" class="form-control" placeholder="0" required="">
												</div>
											</div>
											<div style="display: grid; grid-template-columns:1fr 1fr;">
												<div class="form-group" id="idTransaksiFormGroup">
													<label class="fw-bold">Nominal</label>
													<input type="number" name="nominal" id="nominalinput" class="form-control" placeholder="Rp" required="">
												</div>
											</div>

										</div>
										<div class="col-md-6">
											<div style="display: grid; grid-template-columns:1fr 1fr;">
												<div class="form-group" id="idTransaksiFormGroup">
													<label class="fw-bold">ID Transaksi</label>
													<input type="text" id="idTransaksi" class="form-control" value="12345" readonly>
												</div>
											</div>
											
											

											<div class="d-flex">
												<div class="form-group" id="totalNominal" style="width: 70px; padding-right: 0;">
													<label class="fw-bold">Total</label>
												</div>
												<div class="form-group w-100" id="angkaNominal" style="padding-left: 0;">
													<span id="total" style="color: red; font-size: 40px">1000</span>
												</div>
											</div>
										</div>

										<div class="card-action w-100">
											<a href="">
												<button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
											</a>
											<a href="">
												<button type="submit" name="bayar" class="btn btn-success"><i class="fa fa-usd" aria-hidden="true"></i> Bayar</button>
											</a>
										</div>
									</div>
								</form>
								

								<div class="card-body">
								<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												
												<tr>
													<th>No</th>
													<th>Foto</th>
													<th>SKU</th>
													<th>Nama Barang</th>													
													<th>Harga</th>
													<th>Jumlah</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>	
													<a href="" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
												</td>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>

					<div class="modal fade"></div>

		<script type="text/javascript">
			<?php 
				echo $stok;
				echo $deskripsi;
				echo $nama_barang;
			?>
			function changeValue(id){
				document.getElementById('stok').value = stok[id].stok;
				document.getElementById('deskripsi').value = deskripsi[id].deskripsi;
				document.getElementById('nama_barang').value = nama_barang[id].nama_barang;
			};
		</script>


		<?php
		    if (isset($_POST['simpan'])) {
			
		        $id_barang = $_POST['id_barang'];
		        $qty = $_POST['qty'];
		        $tgl_mulai = $_POST['tgl_mulai'];
		        $tgl_selesai = $_POST['tgl_selesai'];
		        $lokasi_barang = $_POST['lokasi_barang'];
		        $id_user = $_POST['id_user'];
		        $status = $_POST['status'];
		        
		        $email_user = $_POST['email_user'];
		        $email_admin = $_POST['email_admin'];
		        $password_user = $_POST['password_user'];
		        $nama_barang = $_POST['nama_barang'];

		        $selSto =mysqli_query($conn, "SELECT * FROM barang WHERE id='$id_barang'");
			    $sto    =mysqli_fetch_array($selSto);
			    $stok    =$sto['stok'];
			    //menghitung sisa stok
			    $sisa    =$stok-$qty;

			    if($stok < $qty){
			    	echo "<script>alert ('Stok Kurang Dari Jumlah Pinjam') </script>";

			    }else{
				    mysqli_query($conn,"INSERT into pinjambarang values ('','$id_barang', '$id_user','$qty','$tgl_mulai','$tgl_selesai','$lokasi_barang','$status')");
		            mysqli_query($conn, "UPDATE barang SET stok='$sisa' WHERE id='$id_barang'");

		            echo "<script>alert ('Data Berhasil Disimpan') </script>";
                	echo "<script>window.location.replace('?view=datapinjambarang');</script>";
				}

		    }
		    ?>