<html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1ZqjKw0BOyL8GfZ2mPAmUw/A763lSNtFqIo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    function berhasilTambah() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Barang Berhasil Ditambahkan',
            icon: 'success',
            confirmButtonColor: '#2e8aff'
        }).then(function() {
            window.location.replace('?view=databarang');
        });
    }

    function berhasilEdit() {
        Swal.fire({
            title: "Berhasil!",
            text: "Data Barang Berhasil Diubah",
            icon: "success",
            confirmButtonColor: "#2e8aff"
        }).then(function() {
            window.location.replace('?view=databarang');
        });
    }

    function berhasilHapus() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Barang Berhasil Dihapus',
            icon: 'success',
            confirmButtonColor: '#2e8aff'
        }).then(function() {
            window.location.replace('?view=databarang');
        });
    }

    function gagal() {
        Swal.fire({
            title: "Gagal!",
            text: "Data Barang Gagal Ditambahkan",
            icon: "error",
            confirmButtonColor: "#f4656d"
        });
    }
</script>

<?php
require_once '../crud.php';
$connection = $conn;
class crudDataBarang implements Crud
{
    private $connection;
    public function __construct($conn)
    {
        $this->connection = $conn;
    }


    public function Create($data)
    {
        $nama_barang = $_POST['namaBarang'];
        $jenis_barang = $_POST['jenisBarang'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $sku = $_POST['sku'];
        $nama_supplier = $_POST['namaSupplier'];
        $foto = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $upload_path = '../img/';

        move_uploaded_file($file_tmp, $upload_path . $foto);


        if($foto == null){
            $fotosekarang = $foto == null ? 'pp.jpeg' : $foto;
            $query_insert = "INSERT into barang values ('','$nama_barang','$jenis_barang','$stok','$harga','$sku', '$nama_supplier','$fotosekarang')";            
        } else {
            move_uploaded_file($file_tmp, $upload_path . $foto);
            $query_insert = "INSERT into barang values ('','$nama_barang','$jenis_barang','$stok','$harga','$sku', '$nama_supplier','$foto')";
        }

        $result = $this->connection->query($query_insert);

        if ($result) {
            echo "<script>berhasilTambah();</script>";
        } else {
            echo "<script>gagal();</script>";
        }
    }


    public function Update($data)
    {
        $idBarang = $_POST['id'];
        $nama_barang = $_POST['namaBarang'];
        $jenis_barang = $_POST['jenisBarang'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $sku = $_POST['sku'];

        // Ambil nilai asli gambar dari input tersembunyi
        $gambarLama = $_POST['gambarLama'];

        // Ambil informasi file
        $foto = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $upload_path = '../img/';

        // Jika ada file baru diunggah, pindahkan file
        if (!empty($foto)) {
            move_uploaded_file($file_tmp, $upload_path . $foto);
        } else {
            // Jika tidak ada file baru, gunakan nilai asli gambar
            $foto = $gambarLama;
        }

        // Update data barang
        $query_insert = "UPDATE barang SET namaBarang='$nama_barang', jenisBarang='$jenis_barang', stok='$stok', harga='$harga', sku='$sku', gambar='$foto' WHERE idBarang='$idBarang'";
        $result = $this->connection->query($query_insert);
        echo "<script>berhasilEdit();</script>";
    }

    public function Delete($data)
    {

        $id = $_POST['id'];
        $query_insert = "DELETE from barang where idBarang='$id'";
        $result = $this->connection->query($query_insert);
        echo "<script>berhasilHapus();</script>";
    }
}
?>