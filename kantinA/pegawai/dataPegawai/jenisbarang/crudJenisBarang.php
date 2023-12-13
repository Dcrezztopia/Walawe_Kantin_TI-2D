<?php

require_once '../crud.php';
$connection = $conn;
class CrudJenisBarang implements Crud
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


        // Ganti query INSERT menjadi sesuai dengan tabel waitingroom
        $query_insert = "INSERT INTO waitingroom VALUES ('$jenis_barang','$deskripsi')";
        $result = $this->connection->query($query_insert);

        if ($result) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script>window.location.replace('?view=datajenisbarang');</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data')</script>";
        }
    }

    public function Read()
    {

    }

    public function Update($data)
    {
        // echo "<script>alert ('pe') </script>";
        $jenis_barang = $data['jenisBarang'];
        $deskripsi = $data['deskripsi'];


        mysqli_query($this->connection, "UPDATE waitingroom set jenisBarang = '$jenis_barang', deskripsi = '$deskripsi'");

        echo "<script>alert ('Data Berhasil Diubah') </script>";
        echo "<script>window.location.replace('?view=datajenisbarang');</script>";
    }

    public function Delete($data)
    {

    }
}
?>