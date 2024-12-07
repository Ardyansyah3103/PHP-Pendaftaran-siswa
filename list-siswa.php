<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Mahasiswa Baru | Institut Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="my-4">
            <h3>Siswa Terdaftar</h3>
        </header>

        <nav class="mb-3">
            <a href="form-daftar.php" class="btn btn-primary">[+] Tambah Baru</a>
            <a href="index.php" class="btn btn-secondary ml-2">Kembali</a>
            <a href="pdf.php" class="btn btn-secondary ml-2" style="float: right;">Download PDF</a>
        </nav>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Sekolah Asal</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM calon_siswa";
                $query = mysqli_query($db, $sql);

                // Variabel untuk nomor urut
                $nomor = 1;

                while ($siswa = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$nomor++."</td>"; // Penomoran manual
                    echo "<td>";
                    if (file_exists("uploads/".$siswa['foto'])) {
                        echo "<img src='uploads/".$siswa['foto']."' width='100' height='100'>";
                    } else {
                        echo "File tidak ditemukan: uploads/".$siswa['foto'];
                    }
                    echo "</td>";

                    echo "<td>".$siswa['nama']."</td>";
                    echo "<td>".$siswa['alamat']."</td>";
                    echo "<td>".$siswa['jenis_kelamin']."</td>";
                    echo "<td>".$siswa['agama']."</td>";
                    echo "<td>".$siswa['sekolah_asal']."</td>";
                    echo "<td>";
                    echo "<a href='form-edit.php?id=".$siswa['id']."' class='btn btn-warning btn-sm'>Edit</a> ";
                    echo "<a href='hapus.php?id=".$siswa['id']."' class='btn btn-danger btn-sm'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>

        <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    </div>
</body>
</html>
