<?php

require_once '../crud.php';
$connection = $conn;
class CrudPengajuan implements Crud
{
    private $connection;
    public function __construct($conn)
    {
        $this->connection = $conn;
    }


    public function Create($data)
    {
        $nama_barang = $data['nama_barang'];
        $jenis_barang = $data['jenis_barang'];
        $sku = $data['sku'];
        $namasupplier = $data['namasupplier'];
        $harga = $data['harga'];
        $foto = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $upload_path = '../img/';
        $status = 'menunggu';

        move_uploaded_file($file_tmp, $upload_path . $foto);

        // Ganti query INSERT menjadi sesuai dengan tabel waitingroom
        $query_insert = "INSERT INTO waitingroom (namabarang, jenisbarang, sku, namasupplier, harga, gambar, status) VALUES ('$nama_barang', '$jenis_barang', '$sku', '$namasupplier', '$harga','$foto', '$status')";
        $result = $this->connection->query($query_insert);

        if ($result) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script>window.location.replace('?view=datapengajuan');</script>";
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
        $id_waiting = $data['id_waiting'];
        $nama_barang = $data['nama_barang'];
        $jenis_barang = $data['jenis_barang'];
        $sku = $data['sku'];
        $namasupplier = $data['namasupplier'];
        $harga = $data['harga'];
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


        mysqli_query($this->connection, "UPDATE waitingroom set namabarang='$nama_barang', jenisbarang='$jenis_barang', sku='$sku', namasupplier='$namasupplier', harga='$harga', gambar ='$foto' where id_waiting='$id_waiting'");

        echo "<script>alert ('Data Berhasil Diubah') </script>";
        echo "<script>window.location.replace('?view=datapengajuan');</script>";
    }

    public function Delete($data)
    {

    }
}
?>