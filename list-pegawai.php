<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>List pegawai | Institut Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="my-4">
            <h3>List Pegawai</h3>
        </header>

        <nav class="mb-3">
            <a href="index.php" class="btn btn-secondary ml-2">Kembali</a>
        </nav>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Jenis kelamin</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Departemen</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM daftar_pegawai";
                $query = mysqli_query($db, $sql);

                while($pegawai = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>".$pegawai['id']."</td>";
                    echo "<td>".$pegawai['nama']."</td>";
                    echo "<td>".$pegawai['alamat']."</td>";
                    echo "<td>".$pegawai['email']."</td>";
                    echo "<td>".$pegawai['no_telpon']."</td>";
                    echo "<td>".$pegawai['agama']."</td>";
                    echo "<td>".$pegawai['jenis_kelamin']."</td>";
                    echo "<td>".$pegawai['jabatan']."</td>";
                    echo "<td>".$pegawai['departemen']."</td>";
                    echo "<td>";
                    echo "</td>";

                }
                ?>

            </tbody>
        </table>

        <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    </div>
</body>
</html>
