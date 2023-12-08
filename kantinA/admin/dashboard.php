<?php 
$query = mysqli_query($conn,'SELECT count(*) as barang from barang');
$row = mysqli_fetch_array($query);
?>

<?php 
$p = mysqli_query($conn,'SELECT count(*) as waitingroom from waitingroom');
$q = mysqli_fetch_array($p);
?>

<?php 
$key = mysqli_query($conn,'SELECT count(*) as user from user');
$b = mysqli_fetch_array($key);
?>

<div class="main-panel">
			<div class="content">
				<div class="my-3" style="margin: 0 2rem;">
					<h1 class="fw-bold">Dashboard Admin</h1>
					<hr>
				</div>
				<div class="page-inner">
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Data Barang</p>
												<h4 class="card-title"><?php echo $row['barang'] ?></h4>
												<a href="?view=databarang" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Kelola</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fa fa-upload"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Pengajuan (Waiting List)</p>
												<h4 class="card-title"><?php echo $q['waitingroom'] ?></h4>
												<a href="?view=datapengajuan" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Kelola</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fa fa-suitcase"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Data Jenis Barang</p>
												<h4 class="card-title"><?php echo $q['waitingroom'] ?></h4>
												<a href="?view=datapengajuan" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Kelola</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fa fa-tasks"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Data Laporan <br>
												<br></p>
												<a href="?view=datapengajuan" class="btn btn-primary"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Kelola</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Barang Paling Laku</h4>
										
									</div>
									
								</div>
								<div class="card-body">
								<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												
												<tr>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Jenis Barang</th>
													<th>Stok</th>
													<th>Harga</th>
							
												</tr>
											</thead>
											
											<tbody>
												<?php
													$no = 1;
													$query = mysqli_query($conn,'SELECT * from barang');
													while ($barang = mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $barang['namaBarang'] ?></td>
													<td><?php echo $barang['jenisBarang'] ?></td>
													<td><?php echo $barang['stok'] ?></td>
													<td><?php echo $barang['harga'] ?></td>

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
	</div>
</div>		