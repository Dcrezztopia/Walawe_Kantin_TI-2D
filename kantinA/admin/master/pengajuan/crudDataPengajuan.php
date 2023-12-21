<html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1ZqjKw0BOyL8GfZ2mPAmUw/A763lSNtFqIo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    function berhasilTerima() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Pengajuan Barang Berhasil Diajukan',
            icon: 'success',
            confirmButtonColor: '#2e8aff'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?view=datapengajuan';
            }
        });
    }

    function berhasilTolak() {
        Swal.fire({
            title: "Berhasil!",
            text: "Data Pengajuan Barang Berhasil Ditolak",
            icon: "error",
            confirmButtonColor: "#2e8aff"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?view=datapengajuan';
            }
        });
    }

    function berhasilHapus() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Pengajuan Barang Berhasil Dihapus',
            icon: 'success',
            confirmButtonColor: '#2e8aff'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?view=datapengajuan';
            }
        });
    }

    function gagalHapus() {
        Swal.fire({
            title: 'Gagal!',
            text: 'Data Pengajuan Barang Gagal Dihapus',
            icon: 'error',
            confirmButtonColor: '#2e8aff'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?view=datajenisbarang';
            }
        });
    }
</script>

<?php


$connection = $conn;
class crudDataPengajuan
{
    private $connection;
    public function __construct($conn)
    {
        $this->connection = $conn;
    }

    public function Create($data)
    {
        $id_waiting = $data['id_waiting'];
        $nama_barang = $data['namaBarang'];
        $jenis_barang = $data['jenisBarang'];
        $sku = $data['sku'];
        $namasupplier = $data['namaSupplier'];
        $harga = $data['harga'];
        $gambar = $data['gambar'];

        $status = $this->getStatusFromWaitingRoom($id_waiting);

        if ($status === 'disetujui') {
            $this->tampilkanPesanDanRedirect('<script>berhasilTerima();</script>', '?view=databarang');
        } else {
            $jenis_barang_query = $this->getJenisBarangQuery($jenis_barang);

            $this->updateStatusWaitingRoom($id_waiting);

            $this->insertIntoTabelBarang($nama_barang, $jenis_barang_query, $sku, $harga, $namasupplier, $gambar);

            $this->tampilkanPesanSukses($jenis_barang_query);
        }
    }

    private function getStatusFromWaitingRoom($id_waiting)
    {
        $result = mysqli_query($this->connection, "SELECT status FROM waitingroom WHERE id_waiting='$id_waiting'");
        $row = mysqli_fetch_assoc($result);

        return $row['status'];
    }

    private function getJenisBarangQuery($jenis_barang)
    {
        $resultCheckJenis = mysqli_query($this->connection, "SELECT * FROM jenisbarang WHERE jenisBarang = '$jenis_barang'");
        $rowCheckJenis = mysqli_fetch_assoc($resultCheckJenis);

        if ($rowCheckJenis) {
            return $jenis_barang;
        } else {
            mysqli_query($this->connection, "INSERT INTO jenisbarang (jenisBarang, deskripsi) VALUES ('$jenis_barang', 'belum tersedia')");
            return $jenis_barang;
        }
    }

    private function updateStatusWaitingRoom($id_waiting)
    {
        mysqli_query($this->connection, "UPDATE waitingroom SET status='disetujui' WHERE id_waiting='$id_waiting'");
    }

    private function insertIntoTabelBarang($nama_barang, $jenis_barang_query, $sku, $harga, $namasupplier, $gambar)
    {
        mysqli_query($this->connection, "INSERT INTO barang (namaBarang, jenisBarang, sku, harga, namaSupplier, gambar) VALUES ('$nama_barang', '$jenis_barang_query', '$sku', '$harga', '$namasupplier', '$gambar')");
    }

    private function tampilkanPesanSukses($jenis_barang_query = 'default')
    {
        echo "<script>berhasilTerima();</script>";
    }

    private function tampilkanPesanDanRedirect($pesan, $redirectUrl)
    {
        echo "<script>alert('$pesan')</script>";
        echo "<meta http-equiv='refresh' content=0; URL=$redirectUrl>";
    }

    public function Delete($data)
    {
        $id_waiting = $_POST['id_waiting'];
        $query_delete = "DELETE FROM waitingroom WHERE id_waiting = $id_waiting";
        $result = $this->connection->query($query_delete);

        if ($result) {
            echo "<script>berhasilHapus();</script>";
        } else {
            echo "<script>gagalHapus();</script>";
        }
    }

    public function Decline($data)
    {
        $id_waiting = $_POST['id_waiting'];
        $query_update = "UPDATE waitingroom SET status = 'ditolak' where id_waiting = $id_waiting";
        $result = $this->connection->query($query_update);
        echo "<script>berhasilTolak();</script>";
    }
}
?>