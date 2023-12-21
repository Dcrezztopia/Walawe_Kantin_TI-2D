<html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1ZqjKw0BOyL8GfZ2mPAmUw/A763lSNtFqIo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    function berhasilTambah() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Jenis Barang Berhasil Ditambahkan',
            icon: 'success',
            confirmButtonColor: '#2e8aff'
        }).then(function() {
            window.location.replace('?view=datajenisbarang');
        });
    }

    function berhasilEdit() {
        Swal.fire({
            title: "Berhasil!",
            text: "Data Jenis Barang Berhasil Diubah",
            icon: "success",
            confirmButtonColor: "#2e8aff"
        }).then(function() {
            window.location.replace('?view=datajenisbarang');
        });
    }

    function berhasilHapus() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Jenis Barang Berhasil Dihapus',
            icon: 'success',
            confirmButtonColor: '#2e8aff'
        }).then(function() {
            window.location.replace('?view=datajenisbarang');
        });
    }

    function gagalTambah() {
        Swal.fire({
            title: "Gagal!",
            text: "Data Jenis Barang Gagal Ditambahkan",
            icon: "error",
            confirmButtonColor: "#f4656d"
        });
    }

    function gagalEditUsed() {
        Swal.fire({
            title: "Gagal!",
            text: "Tidak Bisa Mengubah Data Jenis Barang Karena Masih Digunakan Dalam Tabel Barang",
            icon: "error",
            confirmButtonColor: "#f4656d"
        }).then(function() {
            window.location.replace('?view=datajenisbarang');
        });

    }

    function gagalEdit() {
        Swal.fire({
            title: "Gagal!",
            text: "Gagal Mengubah Data Jenis Barang",
            icon: "error",
            confirmButtonColor: "#f4656d"
        });
    }

    function gagalHapus() {
        Swal.fire({
            title: 'Gagal!',
            text: 'Data Jenis Barang Gagal Dihapus',
            icon: 'success',
            confirmButtonColor: '#2e8aff'
        }).then(function() {
            window.location.replace('?view=datajenisbarang');
        });
    }

    function gagalHapusUsed() {
        Swal.fire({
            title: 'Gagal!',
            text: 'Data Jenis Barang Gagal Dihapus',
            icon: 'success',
            confirmButtonColor: '#2e8aff'
        }).then(function() {
            window.location.replace('?view=datajenisbarang');
        });
    }
</script>

<?php

require_once '../crud.php';
$connection = $conn;
class crudDataJenisBarang implements Crud
{
    private $connection;
    public function __construct($conn)
    {
        $this->connection = $conn;
    }


    public function Create($data)
    {
        $jenis_barang = $data['jenisBarang'];
        $deskripsi = $data['deskripsi'];

        $query_insert = "INSERT INTO jenisbarang VALUES ('$jenis_barang', '$deskripsi')";
        $result = $this->connection->query($query_insert);

        if ($result) {
            echo "<script>berhasilTambah();</script>";
        } else {
            echo "<script>gagalTambah();</script>";
        }
    }




    public function Update($data)
    {
        $jenis_barang = $data['id'];
        $deskripsi = $data['deskripsi'];
        $jenis_barang_baru = $data['jenisBarangBaru'];

        // Cek apakah jenisBarang masih digunakan dalam tabel barang
        $query_check_barang = "SELECT COUNT(*) as count_barang FROM barang WHERE jenisBarang='$jenis_barang'";
        $result_check_barang = $this->connection->query($query_check_barang);
        $count_barang = $result_check_barang->fetch_assoc()['count_barang'];

        if ($count_barang > 0) {
            echo "<script>gagalEditUsed();</script>";
        }

        // Eksekusi kueri update jika jenisBarang tidak digunakan dalam tabel barang
        $query_update = "UPDATE jenisbarang SET jenisBarang='$jenis_barang_baru', deskripsi='$deskripsi' WHERE jenisBarang='$jenis_barang'";
        $result = $this->connection->query($query_update);

        if ($result) {
            echo "<script>berhasilEdit();</script>";
        } else {
            echo "<script>gagalEdit();</script>";
        }
    }


    public function Delete($data)
    {
        $jenis_barang = $data['jenisBarang'];

        $query_check_barang = "SELECT COUNT(*) as count_barang FROM barang WHERE jenisBarang='$jenis_barang'";
        $result_check_barang = $this->connection->query($query_check_barang);
        $count_barang = $result_check_barang->fetch_assoc()['count_barang'];

        if ($count_barang > 0) {
            echo "<script>gagalHapusUsed();</script>";
        }

        $query_delete = "DELETE FROM jenisbarang WHERE jenisBarang='$jenis_barang'";
        $result = $this->connection->query($query_delete);

        if ($result) {
            echo "<script>berhasilHapus();</script>";
        } else {
            echo "<script>gagalHapus();</script>";
        }
    }
}
?>