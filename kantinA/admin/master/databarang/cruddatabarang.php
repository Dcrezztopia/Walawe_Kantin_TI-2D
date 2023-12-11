<?php
require_once '../crud.php';
$connection = $conn;
class cruddatabarang implements Crud
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
        $query_insert = "INSERT into barang values ('','$nama_barang','$jenis_barang','$stok','$harga','$sku', '$nama_supplier','$foto')";
        $result = $this->connection->query($query_insert);
        echo "<script>alert ('Data Berhasil Disimpan') </script>";
        echo"<meta http-equiv='refresh' content=0; URL=?view=databarang>";
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
        $query_insert = "UPDATE barang set namaBarang='$nama_barang', jenisBarang='$jenis_barang', stok='$stok', harga='$harga', sku='$sku', gambar='$foto' where idBarang='$idBarang'";
        $result = $this->connection->query($query_insert);
        echo "<script>alert ('Data Berhasil Diubah') </script>";
        echo"<meta http-equiv='refresh' content=0; URL=?view=databarang>";
    }

    public function Delete($data)
    {
        $id = $_POST['id'];
        $query_insert = "DELETE from barang where idBarang='$id'";
        $result = $this->connection->query($query_insert);
        echo "<script>alert ('Data Berhasil Dihapus') </script>";
        echo"<meta http-equiv='refresh' content=0; URL=?view=databarang>";
    }
}
?>