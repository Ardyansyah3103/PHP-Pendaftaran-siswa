<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    // cek apakah user mengunggah foto baru
    $foto_baru = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $fotobaru_nama = "";

    if (!empty($foto_baru)) { // Jika ada file yang diunggah
        // Rename file dengan menambahkan tanggal dan jam upload
        $fotobaru_nama = date('dmYHis') . $foto_baru;
        $path = "uploads/" . $fotobaru_nama;

        // Ambil nama foto lama untuk dihapus
        $query_foto = mysqli_query($db, "SELECT foto FROM calon_siswa WHERE id=$id");
        $data = mysqli_fetch_assoc($query_foto);
        $foto_lama = $data['foto'];

        // Upload foto baru
        if (move_uploaded_file($tmp, $path)) {
            // Hapus foto lama dari folder jika ada
            if (!empty($foto_lama) && file_exists("uploads/" . $foto_lama)) {
                unlink("uploads/" . $foto_lama);
            }
        } else {
            die("Gagal mengunggah foto baru...");
        }
    }

    // Buat query update
    if (!empty($fotobaru_nama)) {
        // Update semua data termasuk foto jika foto baru diunggah
        $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', foto='$fotobaru_nama' WHERE id=$id";
    } else {
        // Update data tanpa mengubah foto jika foto baru tidak diunggah
        $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
    }

    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-siswa.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }

} else {
    die("Akses dilarang...");
}

?>
