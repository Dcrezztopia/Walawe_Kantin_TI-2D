<!DOCTYPE html>
<html lang="en">

<head>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <title>Laporan Transaksi</title>
</head>

<div class="container">
    <h2>Laporan Transaksi</h2>
    <div class="data-tables datatable-dark">
        <table id="add-row" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Jumlah Item</th>
                    <th>Total Pembayaran</th>
                    <th>NIP Pegawai</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $query_omset_date = mysqli_query($conn, "SELECT tanggalMulai, tanggalSelesai FROM omset WHERE id = 1");
                $omset_date = mysqli_fetch_assoc($query_omset_date);
                $tanggal_mulai_omset = $omset_date['tanggalMulai'];
                $tanggal_selesai_omset = $omset_date['tanggalSelesai'];
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE tanggal BETWEEN '$tanggal_mulai_omset' AND '$tanggal_selesai_omset'");
                while ($transaksi = mysqli_fetch_array($query)) {
                ?>

                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $transaksi['kodeTransaksi'] ?></td>
                        <td><?php echo date('d/m/Y', strtotime($transaksi['tanggal'])) ?></td>
                        <td><?php echo $transaksi['jumlahitem'] ?></td>
                        <td><?php echo $transaksi['totalPembayaran'] ?></td>
                        <td><?php echo $transaksi['nip'] ?></td>
                        <td>
                            <a href="#modalDetailBarang<?php echo $transaksi['kodeTransaksi'] ?>" data-toggle="modal" title="Detail" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#add-row').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>