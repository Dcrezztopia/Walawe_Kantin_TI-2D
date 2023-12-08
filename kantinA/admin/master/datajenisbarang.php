<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Barang</h4>
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
								<a href="#">Data</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Barang</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Barang</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddBarang">
											<i class="fa fa-plus"></i>
											 Tambah Data
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Jenis Barang</th>
													<th>Deskripsi</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>
												<?php
													$no = 1;
													$query = mysqli_query($conn,'SELECT * from jenisbarang');
													while ($barang = mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $barang['jenisBarang'] ?></td>
													<td><?php echo $barang['deskripsi'] ?></td>
													<td>	
														<a href="#modalDetailBarang<?php echo $barang['jenisBarang'] ?>"  data-toggle="modal" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalEditBarang<?php echo $barang['jenisBarang'] ?>"  data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
														<a href="#modalHapusBarang<?php echo $barang['jenisBarang'] ?>"  data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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

		<!-- FORM TAMBAH BARANG-->
		<div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Tambah Barang</span> 
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<div class="form-group">
														<label>Nama Jenis Barang</label>
														<input type="text" name="jenisBarang" class="form-control" placeholder="jenisBarang ..." required="">
													</div>
													<div class="form-group">
														<label>Deskripsi</label>
														<input type="number" name="deskripsi" class="form-control" placeholder="Stok ..." required="">
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php 
										$p = mysqli_query($conn,'SELECT * from jenisbarang');
										while($d = mysqli_fetch_array($p)) {
									?>

									<!-- EDIT -->
									<div class="modal fade" id="modalEditBarang<?php echo $d['jenisBarang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
													<span class="fw-mediumbold">
														Edit Barang</span> 
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?php echo $d['jenisBarang'] ?>">
													<div class="form-group">
														<label>Nama Barang</label>
														<input value="<?php echo $d['namaBarang'] ?>" type="text" name="namaBarang" class="form-control" placeholder="Nama Barang ..." required="">
													</div>
													<div class="form-group">
 													   <label>Jenis Barang</label>
														<select name="jenisBarang" class="form-control" required="">
    													<?php
   													 $resultJenis = mysqli_query($conn, "SELECT jenisBarang FROM jenisbarang");
    													while ($rowJenis = mysqli_fetch_assoc($resultJenis)) {
    													    $jenisBarang = $rowJenis['jenisBarang'];
    													    $selected = ($jenisBarang == $barang['jenisBarang']) ? 'selected' : '';
    													    echo "<option value='$jenisBarang' $selected>$jenisBarang</option>";
    													}
    													?>
													</select>
													</div>
													<div class="form-group">
														<label>Stok</label>
														<input value="<?php echo $d['stok'] ?>" type="number" name="stok" class="form-control" placeholder="Stok ..." required="">
													</div>
													<div class="form-group">
														<label>Harga</label>
														<input value="<?php echo $d['harga'] ?>" type="number" name="harga" class="form-control" placeholder="Harga ..." required="">
													</div>
													
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i>Save Changes</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

									<?php 
										$c = mysqli_query($conn,'SELECT * from barang');
										while($row = mysqli_fetch_array($c)) {
									?>

									<div class="modal fade" id="modalHapusBarang<?php echo $row['jenisBarang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Hapus</span> 
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
													<input type="hidden" name="id" value="<?php echo $row['jenisBarang'] ?>">
													<h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

									<?php 
										$q = mysqli_query($conn, 'SELECT * FROM barang');
									
										while($k = mysqli_fetch_array($q)) {
									?>

									<div class="modal fade" id="modalDetailBarang<?php echo $k['idBarang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
													<input type="hidden" name="id" value="<?php echo $k['idBarang'] ?>">
													<div class="form-group">
														<label>Nama Barang</label>
														<input readonly value="<?php echo $k['namaBarang'] ?>" type="text" name="namaBarang" class="form-control" placeholder="Nama Barang ..." required="">
													</div>
													<div class="form-group">
														<label>Jenis Barang</label>
														<input readonly value="<?php echo $k['jenisBarang'] ?>" type="text" name="jenisBarang" class="form-control" placeholder="Jenis Barang ..." required="">
													</div>
													<div class="form-group">
														<label>Stok</label>
														<input readonly value="<?php echo $k['stok'] ?>" type="number" name="stok" class="form-control" placeholder="Stok ..." required="">
													</div>
													<div class="form-group">
														<label>Harga</label>
														<input readonly value="<?php echo $k['harga'] ?>" type="number" name="harga" class="form-control" placeholder="Harga ..." required="">
													</div>
													<div class="form-group">
														<label>SKU</label>
														<input readonly value="<?php echo $k['sku'] ?>" type="text" name="sku" class="form-control" placeholder="sku ..." required="">
													</div>
													

													<div class="form-group">
														<img src="master/barang/Fotobarang/<?php echo $k['foto'] ?>" width="100%" height="200">
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

		<?php
            if(isset($_POST['simpan']))
                {
                    $nama_barang = $_POST['namaBarang'];
                    $jenis_barang = $_POST['jenisBarang'];
                    $stok = $_POST['stok'];
                    $harga = $_POST['harga'];
                    $sku = $_POST['sku'];
                    $nama_supplier = $_POST['namaSupplier'];
                    
                    
                        move_uploaded_file($file_tmp, 'master/barang/Fotobarang/' . $foto);
						
                        
                    mysqli_query($conn,"INSERT into barang values ('','$nama_barang','$jenis_barang','$stok','$harga','$sku', '$nama_supplier')");
                    echo "<script>alert ('Data Berhasil Disimpan') </script>";
                    echo"<meta http-equiv='refresh' content=0; URL=?view=databarang>";
                }

                elseif(isset($_POST['ubah']))
                {
					$idBarang = $_POST['id'];
                	$nama_barang = $_POST['namaBarang'];
                    $jenis_barang = $_POST['jenisBarang'];
                    $stok = $_POST['stok'];
                    $harga = $_POST['harga'];
                    $sku = $_POST['sku'];
      
                        
                    mysqli_query($conn,"UPDATE barang set namaBarang='$nama_barang', jenisBarang='$jenis_barang', stok='$stok', harga='$harga', sku='$sku' where idBarang='$idBarang'");
                    echo "<script>alert ('Data Berhasil Diubah') </script>";
                    echo"<meta http-equiv='refresh' content=0; URL=?view=databarang>";
                }

                elseif(isset($_POST['hapus']))
                {
                	$id = $_POST['id'];
                	mysqli_query($conn,"DELETE from barang where idBarang='$id'");
                    echo "<script>alert ('Data Berhasil Dihapus') </script>";
                    echo"<meta http-equiv='refresh' content=0; URL=?view=databarang>";
                }
                ?>