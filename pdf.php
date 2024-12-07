<?php
// memanggil library FPDF
require('../fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L', 'mm', 'A4'); // Menggunakan A4 agar lebih luas
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(0, 10, 'INSTITUT CODING', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'LIST PENDAFTAR INSTITUTE CODING', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
// Mengatur font untuk header tabel
$pdf->SetFont('Arial', 'B', 10);

// Menyesuaikan lebar kolom
$pdf->Cell(20, 8, 'NO', 1, 0, 'C');
$pdf->Cell(50, 8, 'NAMA', 1, 0, 'C');
$pdf->Cell(60, 8, 'ALAMAT', 1, 0, 'C');
$pdf->Cell(40, 8, 'JENIS KELAMIN', 1, 0, 'C');
$pdf->Cell(40, 8, 'AGAMA', 1, 0, 'C');
$pdf->Cell(60, 8, 'SEKOLAH ASAL', 1, 1, 'C');

// Mengatur font untuk data
$pdf->SetFont('Arial', '', 10);

// Mengambil data dari database dengan urutan berdasarkan ID
include 'config.php';
$query = mysqli_query($db, "SELECT * FROM calon_siswa ORDER BY id ASC"); // Urutkan berdasarkan ID

$no = 1; // Penomoran manual
while ($row = mysqli_fetch_array($query)) {
    // Menampilkan nomor urut
    $pdf->Cell(20, 8, $no++, 1, 0, 'C'); // Menampilkan nomor urut yang akan bertambah otomatis
    $pdf->Cell(50, 8, $row['nama'], 1, 0);
    $pdf->Cell(60, 8, $row['alamat'], 1, 0);
    $pdf->Cell(40, 8, $row['jenis_kelamin'], 1, 0, 'C');
    $pdf->Cell(40, 8, $row['agama'], 1, 0);
    $pdf->Cell(60, 8, $row['sekolah_asal'], 1, 1);
}

// Output PDF
$pdf->Output();
?>
