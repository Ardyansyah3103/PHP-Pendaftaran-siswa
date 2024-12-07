<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau belum
if (isset($_POST['daftar'])) {
    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    
    // Cek apakah file foto diunggah
    if (isset($_FILES['foto']['name']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        
        // Rename nama file untuk menghindari konflik
        $fotobaru = date('dmYHis') . "_" . $foto;
        
        // Path untuk menyimpan file
        $path = "uploads/" . $fotobaru;
        
        // Cek apakah folder uploads ada
        if (!is_dir("uploads")) {
            mkdir("uploads", 0777, true);
        }
        
        // Proses upload file
        if (move_uploaded_file($tmp, $path)) {
            // buat query untuk menyimpan ke database
            $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) 
                    VALUES ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$fotobaru')";
            $query = mysqli_query($db, $sql);
            
            // apakah query simpan berhasil?
            if ($query) {
                header('Location: index.php?status=sukses');
            } else {
                echo "Gagal menyimpan data ke database.";
                echo "<br><a href='form_simpan.php'>Kembali ke Form</a>";
            }
        } else {
            echo "Maaf, file foto gagal diunggah.";
            echo "<br><a href='form_simpan.php'>Kembali ke Form</a>";
        }
    } else {
        echo "Tidak ada file foto yang diunggah.";
        echo "<br><a href='form_simpan.php'>Kembali ke Form</a>";
    }
} else {
    die("Akses dilarang...");
}
?>
