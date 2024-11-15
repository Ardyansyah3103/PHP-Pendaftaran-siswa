<?php
include("config.php");

// Jika tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

// Ambil id dari query string
$id = $_GET['id'];

// Buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// Jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Edit Siswa | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <header class="mb-4">
            <h3 class="text-center">Formulir Edit Siswa</h3>
        </header>

        <form action="proses-edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap" value="<?php echo $siswa['nama'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap" required><?php echo $siswa['alamat'] ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <?php $jk = $siswa['jenis_kelamin']; ?>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : ""; ?> required>
                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <?php $agama = $siswa['agama']; ?>
                <select class="form-select" id="agama" name="agama" required>
                    <option disabled>Pilih Agama</option>
                    <option <?php echo ($agama == 'Islam') ? "selected" : ""; ?>>Islam</option>
                    <option <?php echo ($agama == 'Kristen') ? "selected" : ""; ?>>Kristen</option>
                    <option <?php echo ($agama == 'Hindu') ? "selected" : ""; ?>>Hindu</option>
                    <option <?php echo ($agama == 'Budha') ? "selected" : ""; ?>>Budha</option>
                    <option <?php echo ($agama == 'Atheis') ? "selected" : ""; ?>>Atheis</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="sekolah_asal" class="form-label">Sekolah Asal</label>
                <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" placeholder="Nama sekolah asal" value="<?php echo $siswa['sekolah_asal'] ?>" required>
            </div>

            <nav class="mb-3">
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            <a href="list-siswa.php" class="btn btn-secondary ml-2">Kembali</a>
            </nav>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
