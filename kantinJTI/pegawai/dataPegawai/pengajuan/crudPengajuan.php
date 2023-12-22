<html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1ZqjKw0BOyL8GfZ2mPAmUw/A763lSNtFqIo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    function berhasilTambah() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Pengajuan Barang Berhasil Ditambahkan',
            icon: 'success',
            confirmButtonColor: '#2e8aff'
        }).then(function() {
            window.location.replace('?view=datapengajuan');
        });
    }

    function berhasilEdit() {
        Swal.fire({
            title: "Berhasil!",
            text: "Data Pengajuan Barang Berhasil Diubah",
            icon: "success",
            confirmButtonColor: "#2e8aff"
        }).then(function() {
            window.location.replace('?view=datapengajuan');
        });
    }

    function gagal() {
        Swal.fire({
            title: "Gagal!",
            text: "Data Pengajuan Barang Gagal Ditambahkan",
            icon: "error",
            confirmButtonColor: "#f4656d"
        });
    }

    function gagalWaiting() {
        Swal.fire({
            title: "Gagal!",
            text: "SKU Telah Tersedia di WaitingRoom",
            icon: "error",
            confirmButtonColor: "#f4656d"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?view=datapengajuan';
            }
        });
    }

    function gagalBarang() {
        Swal.fire({
            title: "Gagal!",
            text: "Data PSKU Telah Tersedia di Barang",
            icon: "error",
            confirmButtonColor: "#f4656d"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?view=datapengajuan';
            }
        });
    }
</script>

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

        // Ganti query SELECT sesuai dengan tabel waitingroom


        if ($this->isSkuWaitingAvailable($sku)) {
            echo "<script>gagalWaiting();</script>";
        } else {
            if ($this->isSkuAvailable($sku)) {
                echo "<script>gagalBarang();</script>";
            } else {

                // Ganti query INSERT menjadi sesuai dengan tabel waitingroom
                $query_insert = "INSERT INTO waitingroom (namabarang, jenisbarang, sku, namasupplier, harga, gambar, status) VALUES ('$nama_barang', '$jenis_barang', '$sku', '$namasupplier', '$harga','$foto', '$status')";
                $result = $this->connection->query($query_insert);

                if ($result) {
                    echo "<script>berhasilTambah();</script>";
                } else {
                    echo "<script>gagal();</script>";
                }
            }
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

        echo "<script>berhasilEdit();</script>";
    }

    public function Delete($data)
    {
    }

    private function isSkuAvailable($sku)
    {
        // Ganti query SELECT sesuai dengan tabel waitingroom
        $resultCheckSku = mysqli_query($this->connection, "SELECT sku FROM barang WHERE sku = '$sku'");
        $rowCheckJenis = mysqli_fetch_assoc($resultCheckSku);

        return $rowCheckJenis ? true : false;
    }
    private function isSkuWaitingAvailable($sku)
    {
        // Ganti query SELECT sesuai dengan tabel waitingroom
        $resultCheckSku = mysqli_query($this->connection, "SELECT sku FROM waitingroom WHERE sku = '$sku'");
        $rowCheckJenis = mysqli_fetch_assoc($resultCheckSku);

        return $rowCheckJenis ? true : false;
    }
}
