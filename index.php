<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pendaftaran Institut Coding</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  /* Set the background image */
  body {
    background-image: url('https://img2.storyblok.com//f/64062/992x657/de15b07cbe/yale-university.jpg');
    background-size: cover;
    background-position: center;
    height: 100vh; /* Full height */
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
  }

  /* Transparent overlay for blur effect */
  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.2); /* Slight white transparency */
    backdrop-filter: blur(8px); /* Blur the background */
    z-index: 0;
  }

  /* Card styling */
  .card {
    z-index: 1; /* Ensure it appears above the blurred background */
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

  /* Toast styling */
  .toast {
    position: fixed;
    bottom: 20px;
    left: 50%; /* Position the toast in the horizontal center */
    transform: translateX(-50%); /* Center the toast horizontally */
    z-index: 1050;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.5s ease-in-out, visibility 0s 0.5s; /*transisi*/
  }

  .toast.show {
    opacity: 1;
    visibility: visible;
  }
</style>
</head>

<body>
  <div class="overlay"></div>
  <div class="card text-center" style="width: 35rem;">
    <img class="card-img-top" src="https://img2.storyblok.com//f/64062/992x657/de15b07cbe/yale-university.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Institut CODING</h5>
      <p class="card-text">Pendaftaran Mahasiswa Baru, Cepatkan bayar</p>
      <a href="form-daftar.php" class="btn btn-primary">Daftar Baru</a>
      <a href="list-siswa.php" class="btn btn-primary">List Pendaftar</a>
      <a href="list-pegawai.php" class="btn btn-primary">Pegawai</a>
    </div>
  </div>


  <!--toast notif-->
  <script>
    // Simulating the registration status
    let status = "sukses"; 

    if (status === "sukses") {
      // Show toast when registration is successful
      const toast = document.getElementById('toast');
      toast.classList.add('show');

      // Hide the toast after 3 seconds
      setTimeout(function() {
        toast.classList.remove('show');
      }, 3000);
    }
  </script>

</body>
</html>
