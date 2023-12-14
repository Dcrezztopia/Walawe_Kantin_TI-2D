<!-- cetaklaporan.php -->
<?php
require('library/fpdf.php');
include 'koneksi.php';

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(200, 10, 'DATA TRANSAKSI', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(30, 7, 'ID Transaksi', 1, 0, 'C');
$pdf->Cell(30, 7, 'Tanggal', 1, 0, 'C');
$pdf->Cell(30, 7, 'Jumlah Item', 1, 0, 'C');
$pdf->Cell(40, 7, 'Total Pembayaran', 1, 0, 'C');
$pdf->Cell(40, 7, 'NIP Pegawai', 1, 0, 'C');
$pdf->Cell(20, 7, 'Action', 1, 1, 'C');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$no = 1;
$data = mysqli_query($koneksi, 'SELECT * FROM waitingroom');
while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(30, 6, $d['id_transaksi'], 1, 0);
    $pdf->Cell(30, 6, $d['tanggal'], 1, 0);
    $pdf->Cell(30, 6, $d['jumlah_item'], 1, 0);
    $pdf->Cell(40, 6, $d['total_pembayaran'], 1, 0);
    $pdf->Cell(40, 6, $d['nip_pegawai'], 1, 0);
    $pdf->Cell(20, 6, '', 1, 1); // Adjust as needed
}

$pdf->Output();
