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
        $namaBarang = $data['namaBarang'];
        $jenisBarang = $data['jenisBarang'];
        $sku = $data['sku'];
        $namaSupplier = $data['namaSupplier'];
        $harga = $data['harga'];

        // Check if the status is 'disetujui'
        $status = $this->getStatus($id_waiting);

        if ($status === 'disetujui') {
            $this->showAlertAndRedirect('Barang telah disetujui', '?view=databarang');
        } else {
            $jenisBarangQuery = $this->getOrCreateJenisBarang($jenisBarang);

            $this->updateStatus($id_waiting);
            $this->insertBarang($namaBarang, $jenisBarangQuery, $sku, $harga, $namaSupplier);

            $message = $jenisBarangQuery === $jenisBarang ? 'Data berhasil disimpan' : 'Data berhasil disimpan (jenis barang baru)';
            $this->showAlertAndRedirect($message, '?view=datapengajuan');
        }
    }

    private function getStatus($id_waiting) {
        $result = mysqli_query($this->connection, "SELECT status FROM waitingroom WHERE id_waiting='$id_waiting'");
        $row = mysqli_fetch_assoc($result);
        return $row['status'];
    }

    private function getOrCreateJenisBarang($jenisBarang) {
        $resultCheckJenis = mysqli_query($this->connection, "SELECT * FROM jenisbarang WHERE jenisBarang = '$jenisBarang'");
        $rowCheckJenis = mysqli_fetch_assoc($resultCheckJenis);

        if ($rowCheckJenis) {
            return $jenisBarang;
        } else {
            mysqli_query($this->connection, "INSERT INTO jenisbarang (jenisBarang, deskripsi) VALUES ('$jenisBarang', 'belum tersedia')");
            return $jenisBarang;
        }
    }

    private function updateStatus($id_waiting) {
        mysqli_query($this->connection, "UPDATE waitingroom SET status='disetujui' WHERE id_waiting='$id_waiting'");
    }

    private function insertBarang($namaBarang, $jenisBarang, $sku, $harga, $namaSupplier) {
        mysqli_query($this->connection, "INSERT INTO barang (namaBarang, jenisBarang, sku, harga, namaSupplier) VALUES ('$namaBarang', '$jenisBarang', '$sku', '$harga', '$namaSupplier')");
    }

    private function showAlertAndRedirect($message, $redirect_url) {
        echo "<script>alert('$message')</script>";
        echo "<script>window.location.replace('$redirect_url');</script>";
    }

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