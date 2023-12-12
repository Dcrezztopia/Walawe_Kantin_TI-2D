<?php
include 'crudPengajuan.php';

$crudPengajuan = new CrudPengajuan($conn);
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Edit</h4>
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


<?php

$p = mysqli_query($conn, 'SELECT * from waitingroom');
while ($pengajuan = mysqli_fetch_array($p)) {
    ?>

					<!-- TAMBAH EDIT BARANG -->
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit Pengajuan Barang</div>
								</div>

                                <form method="POST" enctype="multipart/form-data" action="">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?php echo $pengajuan['id_waiting'] ?>">
                                        <div class="form-group col-md-4 ml-3 mt-2">
                                            <label>Nama Barang</label>
                                            <input value="<?php echo $pengajuan['namabarang'] ?>" type="text" name="namabarang"
                                                class="form-control" placeholder="Nama Barang ..." required="">
                                        </div>
                                        <div class="form-group col-md-4 ml-3">
                                            <?php
                                            $query = mysqli_query($conn, 'SELECT * FROM jenisbarang');
                                            ?>
                                            <label>Jenis Barang</label>
                                            <select name="jenisbarang" class="form-control" required="">
                                                <?php
                                                while ($jenis_barang = mysqli_fetch_assoc($query)) {
                                                    echo '<option value="' . $jenis_barang['jenisBarang'] . '">' . $jenis_barang['jenisBarang'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 ml-3">
                                            <label>SKU</label>
                                            <input value="<?php echo $pengajuan['sku'] ?>" type="text" name="sku" class="form-control"
                                                placeholder="SKU ..." required="">
                                        </div>
                                        <div class="form-group col-md-4 ml-3">
                                            <label>Nama Supplier</label>
                                            <input value="<?php echo $pengajuan['namasupplier'] ?>" type="text" name="namasupplier"
                                                class="form-control" placeholder="Nama Supplier ..." required="">
                                        </div>
                                        <div class="form-group col-md-4 ml-3">
                                            <label>Harga</label>
                                            <input value="<?php echo $pengajuan['harga'] ?>" type="number" name="harga" class="form-control"
                                                placeholder="Harga ..." required="">
                                        </div>

                                    </div>
                                    <div class="card-action">
                                        <button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-save"></i> Save
                                            Changes</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                                            Cancel</button>
                                    </div>
                                </form>

							</div>
						</div>
					</div>
                    <?php } ?>
				</div>
			</div>
		</div>

        
<?php

if (isset($_POST['ubah'])) {
    $data = array(
        'id_waiting' => $_POST['id'],
        'nama_barang' => $_POST['namabarang'],
        'jenis_barang' => $_POST['jenisbarang'],
        'sku' => $_POST['sku'],
        'namasupplier' => $_POST['namasupplier'],
        'harga' => $_POST['harga']
    );
    // echo "<script>alert ('pe') </script>";
    $crudPengajuan->Update($data);
}
?>

        