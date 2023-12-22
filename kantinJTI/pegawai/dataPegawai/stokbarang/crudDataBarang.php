<html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1ZqjKw0BOyL8GfZ2mPAmUw/A763lSNtFqIo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    function berhasilEdit() {
        Swal.fire({
            title: "Berhasil!",
            text: "Data Stok Barang Berhasil Diubah",
            icon: "success",
            confirmButtonColor: "#2e8aff"
        }).then(function() {
            window.location.replace('?view=datastokbarang');
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
    }


    public function Update($data)
    {
        $idBarang = $_POST['id'];
        $stok = $_POST['stok'];
        $query_insert = "UPDATE barang SET stok='$stok' WHERE idBarang='$idBarang'";
        $result = $this->connection->query($query_insert);
        echo "<script>berhasilEdit();</script>";
    }

    public function Delete($data)
    {
    }
}
?>