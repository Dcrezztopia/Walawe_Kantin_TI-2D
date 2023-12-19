<?php


$connection = $conn;
class crudDataPengajuan 
{
    private $connection;
    public function __construct($conn)
    {
        $this->connection = $conn;
    }

    public function Create($data) {
        $id_waiting = $data['id_waiting'];
        $nama_barang = $data['namaBarang'];
        $jenis_barang = $data['jenisBarang'];
        $sku = $data['sku'];
        $namasupplier = $data['namaSupplier'];
        $harga = $data['harga'];
        $gambar = $data['gambar'];

        $status = $this->getStatusFromWaitingRoom($id_waiting);

        if ($status === 'disetujui') {
            $this->tampilkanPesanDanRedirect('Barang telah disetujui', '?view=databarang');
        } else {
            $jenis_barang_query = $this->getJenisBarangQuery($jenis_barang);

            $this->updateStatusWaitingRoom($id_waiting);

            $this->insertIntoTabelBarang($nama_barang, $jenis_barang_query, $sku, $harga, $namasupplier, $gambar);

            $this->tampilkanPesanSukses($jenis_barang_query);
        }
    }

    private function getStatusFromWaitingRoom($id_waiting) {
        $result = mysqli_query($this->connection, "SELECT status FROM waitingroom WHERE id_waiting='$id_waiting'");
        $row = mysqli_fetch_assoc($result);

        return $row['status'];
    }

    private function getJenisBarangQuery($jenis_barang) {
        $resultCheckJenis = mysqli_query($this->connection, "SELECT * FROM jenisbarang WHERE jenisBarang = '$jenis_barang'");
        $rowCheckJenis = mysqli_fetch_assoc($resultCheckJenis);

        if ($rowCheckJenis) {
            return $jenis_barang;
        } else {
            mysqli_query($this->connection, "INSERT INTO jenisbarang (jenisBarang, deskripsi) VALUES ('$jenis_barang', 'belum tersedia')");
            return $jenis_barang;
        }
    }

    private function updateStatusWaitingRoom($id_waiting) {
        mysqli_query($this->connection, "UPDATE waitingroom SET status='disetujui' WHERE id_waiting='$id_waiting'");
    }

    private function insertIntoTabelBarang($nama_barang, $jenis_barang_query, $sku, $harga, $namasupplier, $gambar) {
        mysqli_query($this->connection, "INSERT INTO barang (namaBarang, jenisBarang, sku, harga, namaSupplier, gambar) VALUES ('$nama_barang', '$jenis_barang_query', '$sku', '$harga', '$namasupplier', '$gambar')");
    }

    private function tampilkanPesanSukses($jenis_barang_query) {
        echo "<script>alert('Data berhasil disimpan" . ($jenis_barang_query ? "" : " (jenis barang baru)") . "')</script>";
        echo "<script>window.location.replace('?view=datapengajuan');</script>";
    }

    private function tampilkanPesanDanRedirect($pesan, $redirectUrl) {
        echo "<script>alert('$pesan')</script>";
        echo "<meta http-equiv='refresh' content=0; URL=$redirectUrl>";
    }
    
    // public function Create($data) {
    //     $id_waiting = $_POST['id_waiting'];
    //     $nama_barang =$_POST['namaBarang'];
    //     $jenis_barang = $_POST['jenisBarang'];
    //     $sku = $_POST['sku'];
    //     $namasupplier = $_POST['namaSupplier'];
    //     $harga = $_POST['harga'];
	
	// 	// Check if the status is 'disetujui'
	// 	$result = mysqli_query($this->connection, "SELECT status FROM waitingroom WHERE id_waiting='$id_waiting'");
	// 	$row = mysqli_fetch_assoc($result);
	// 	$status = $row['status'];
	
	// 	if ($status === 'disetujui') {
	// 		echo "<script>alert('Barang telah disetujui')</script>";
	// 		echo "<meta http-equiv='refresh' content=0; URL=?view=databarang>";
	// 	} else {
	// 		// Cek apakah jenis barang sudah ada di tabel jenisbarang
	// 		$resultCheckJenis = mysqli_query($this->connection, "SELECT * FROM jenisbarang WHERE jenisBarang = '$jenis_barang'");
	// 		$rowCheckJenis = mysqli_fetch_assoc($resultCheckJenis);
	
	// 		if ($rowCheckJenis) {
	// 			// Jenis barang sudah ada, gunakan jenisBarang langsung
	// 			$jenis_barang_query = $jenis_barang;
	// 		} else {
	// 			// Jenis barang belum ada, tambahkan ke tabel jenisbarang
	// 			mysqli_query($this->connection, "INSERT INTO jenisbarang (jenisBarang, deskripsi) VALUES ('$jenis_barang', 'belum tersedia')");
	// 			$jenis_barang_query = $jenis_barang;
	// 		}
	
	// 		// Update status ke 'disetujui' di tabel waitingroom
	// 		mysqli_query($this->connection, "UPDATE waitingroom SET status='disetujui' WHERE id_waiting='$id_waiting'");
	
	// 		// Insert ke tabel barang
	// 		mysqli_query($this->connection, "INSERT INTO barang (namaBarang, jenisBarang, sku, harga, namaSupplier) VALUES ('$nama_barang', '$jenis_barang_query', '$sku', '$harga', '$namasupplier')");
			
	// 		if ($rowCheckJenis) {
	// 			echo "<script>alert('Data berhasil disimpan')</script>";
	// 			echo "<script>window.location.replace('?view=datapengajuan');</script>";
	// 		} else {
	// 			echo "<script>alert('Data berhasil disimpan (jenis barang baru)')</script>";
	// 			echo "<script>window.location.replace('?view=datapengajuan');</script>";
	// 		}
	// 	}
    // }

    public function Delete($data)
    {
    $id_waiting = $_POST['id_waiting'];
    $query_delete = "DELETE FROM waitingroom WHERE id_waiting = $id_waiting";
    $result = $this->connection->query($query_delete);
    
    if ($result) {
        echo "<script>alert ('Data Pengajuan  Berhasil Dihapus') </script>";
        echo "<meta http-equiv='refresh' content=0; URL=?view=datajenisbarang>";
    } else {
        echo "<script>alert ('Gagal menghapus data Pengajuan Barang') </script>";
        echo "<meta http-equiv='refresh' content=0; URL=?view=datajenisbarang>";
    }
    }
}
?>