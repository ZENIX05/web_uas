<?php
session_start();
include "koneksi.php"; // Pastikan file ini terhubung ke database 'web_uas'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Point Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS DARI TEMPLATE ANDA */
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }
        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
</head>
<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://pointcoffee.id/wp-content/uploads/2023/04/cropped-cropped-cropped-Logo-Point-Coffee.png"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Point Coffee System</h4>
                </div>

                <?php 
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                            echo "<div class='alert alert-danger'>Login Gagal! Username atau Password salah.</div>";
                        }
                        if($_GET['pesan'] == "logout"){
                            echo "<div class='alert alert-success'>Anda berhasil logout.</div>";
                        }
                        if($_GET['pesan'] == "belum_login"){
                            echo "<div class='alert alert-warning'>Silakan login untuk mengakses halaman admin.</div>";
                    }
                    }
                    ?>
                <form action="proses_login.php" method="POST">
                  <p>Silakan login ke akun Anda</p>

                  <?php if(isset($error)): ?>
                      <div class="alert alert-danger text-center mb-3" role="alert">
                          <?php echo $error; ?>
                      </div>
                  <?php endif; ?>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example11" name="username" class="form-control"
                      placeholder="Masukkan Username" required />
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" name="password" class="form-control" required />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100" type="button" onclick="this.form.submit();" name="login">Log
                      in</button>
                    <a class="text-muted" href="#!">Lupa password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Belum punya akun?</p>
                    <button type="button" class="btn btn-outline-danger">Hubungi Admin</button>
                  </div>

                  <input type="hidden" name="login" value="1">

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Quality Coffee, To Go.</h4>
                <p class="small mb-0">Selamat datang di Sistem Manajemen Point Coffee. Aplikasi ini dirancang untuk memudahkan pengelolaan menu, transaksi kasir, dan laporan penjualan secara efisien dan akurat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>