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
                        <a href="#">Pengajuan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Barang</h4>
                                <a href="?view=createpengajuan" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                           
                                            <th>ID Waiting</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>                                    
                                            <th>Harga</th>
                                            <th>SKU</th>
                                            <th>Nama Supplier</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
													$no = 1;
													$query = mysqli_query($conn,'SELECT * FROM waitingroom');
													while ($pengajuan = mysqli_fetch_array($query)) {
												?>
                                        
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $pengajuan['namabarang'] ?></td>
                                            <td><?php echo $pengajuan['jenisbarang'] ?></td>
                                            <td><?php echo $pengajuan['sku'] ?></td>
                                            <td><?php echo $pengajuan['namasupplier'] ?></td>
                                            <td><?php echo $pengajuan['harga'] ?></td>
                                            <td>
                                                <?php if($pengajuan['status'] == 'menunggu') { ?>
                                                <div class="badge badge-danger"><?php echo $pengajuan['status'] ?>
                                                </div>
                                                <?php }else { ?>
                                                <div class="badge badge-success"><?php echo $pengajuan['status'] ?>
                                                </div>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="index.php?page=anggota/edit&id=<?= $row['id_waiting'] ?>"
                                                    class="btn btn-warning btn-xs">Edit</a>
                                                <a href="fungsi/hapus.php?anggota=hapus&id=<?= $row['id_waiting'] ?>"
                                                    onclick="javascript:return confirm('Hapus Data Anggota ?');"
                                                    class="btn btn-danger btn-xs">Hapus</a>
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
										$c = mysqli_query($conn,'SELECT * FROM waitingroom');
										while ($row = mysqli_fetch_array($c)) {
									?>

<div class="modal fade" id="modalHapusPinjamRuangan<?php echo $row['id'] ?>" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Batalkan</span>
                    <span class="fw-light">
                        Pinjaman
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <input type="hidden" name="id_ruangan" value="<?php echo $row['id_ruangan'] ?>">
                    <h4>Apakah Anda Ingin Membatalkan Pinjamanan Ini ?</h4>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Batal
                        Pinjam</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i>
                        Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php } ?>


<?php 
										$f = mysqli_query($conn,'SELECT * FROM waitingroom');
										while ($row = mysqli_fetch_array($f)) {
									?>

<div class="modal fade" id="modalKembalikanPinjamRuangan<?php echo $row['id'] ?>" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Kembalikan</span>
                    <span class="fw-light">
                        Pinjaman
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <input type="hidden" name="id_ruangan" value="<?php echo $row['id_ruangan'] ?>">
                    <h4>Apakah Anda Ingin Mengembalikan Pinjamanan Ini ?</h4>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="ubah" class="btn btn-danger"><i class="fa fa-trash"></i> Kembalikan
                        Pinjaman</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i>
                        Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php } ?>

<?php 
			if(isset($_POST['hapus']))
			{
				$id = $_POST['id'];
				$id_ruangan = $_POST['id_ruangan'];

				$selSto = mysqli_query($conn, "SELECT * FROM ruangan WHERE id='$id_ruangan'");
			    $sto    = mysqli_fetch_array($selSto);
			    $sisa    = 'free';

		        mysqli_query($conn, "UPDATE ruangan SET status='$sisa' WHERE id='$id_ruangan'");
		        mysqli_query($conn,"DELETE from pinjamruangan where id='$id'");
		        echo "<script>alert ('Data Berhasil Dihapus') </script>";
                echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjamruangan>";
			
			}elseif (isset($_POST['ubah'])) {
				$id = $_POST['id'];
				$id_ruangan = $_POST['id_ruangan'];

				$selSto = mysqli_query($conn, "SELECT * FROM ruangan WHERE id='$id_ruangan'");
			    $sto    = mysqli_fetch_array($selSto);
			    $sisa   = 'free';
			    $status = 'selesai';

		        mysqli_query($conn, "UPDATE ruangan SET status='$sisa' WHERE id='$id_ruangan'");
		        mysqli_query($conn,"UPDATE pinjamruangan SET status='$status' where id='$id'");
		        echo "<script>alert ('Data Berhasil Dihapus') </script>";
                echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjamruangan>";
			}
		?>