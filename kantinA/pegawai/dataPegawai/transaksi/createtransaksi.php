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
								<a href="#">Barang</a>
							</li>
						</ul>
					</div>

					<!-- TAMBAH TRANSAKSI -->
					<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Data Transaksi</div>
            </div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <table id="transaksiTable">
                        <tr>
                            <th>Id Barang</th>
                            <th>Nama Barang</th>
                            <th>Tanggal</th>
                            <th>Stok</th>
                            <th>Qty</th>
                            <th>Harga</th>
                        </tr>
                        <tr class="input-row">
                            <td><input type="text" name="id_barang[]" style="width: 200px"></td>
                            <td><input type="text" name="nama_barang[]" style="width: 200px"></td>
                            <td><input type="text" readonly="" name="tanggal[]" class="form-control" value="<?php echo date('Y-m-d') ?>"></td>
                            <td><input type="text" name="stok[]" style="width: 100px"></td>
                            <td><input type="text" name="qty[]" style="width: 100px"></td>
                            <td><input type="text" name="harga[]" style="width: 200px"></td>
                        </tr>
                    </table>
                </div>
                <div class="card-action">
                    <button type="button" id="tambahRow" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                    <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
                    <a href="?view=datapinjambarang" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Add a new row when the "Tambah" button is clicked
        $("#tambahRow").on("click", function () {
            var newRow = $(".input-row:first").clone();
            $("#transaksiTable").append(newRow);
        });
    });
</script>
				</div>
			</div>
		</div>

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