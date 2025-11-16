<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poin Coffeee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="container-fluid bg-dark">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark container">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="https://pointcoffee.id/wp-content/uploads/2023/04/cropped-cropped-cropped-Logo-Point-Coffee.png"
                        alt="Poin Coffeee" height="70" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">About us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Promosi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Artikel</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="container my-4 flex-grow-1">
        <div class="row">
            <section class="col-12">
                <div class="row g-3">

                    <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner rounded">
                            
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/seed/coffeebean/1200/500" alt="Poin Coffeee Welcome" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h1>Welcome to Poin Coffeee</h1>
                                    <p>Situs ini adalah portal untuk mengelola menu, transaksi, dan promosi kedai kami.</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="https://picsum.photos/seed/coffeecup/1200/500" alt="Promo Kopi" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Promo Spesial Minggu Ini</h5>
                                    <p>Beli 1 Dapat 1 untuk semua varian Kopi Susu Gula Aren.</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="https://picsum.photos/seed/croissant/1200/500" alt="Menu Baru" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Coba Menu Baru Kami</h5>
                                    <p>Nikmati Pastry hangat yang baru dipanggang setiap pagi.</p>
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Widget A</h5>
                                <p class="card-text">Contoh isi widget atau statistik.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Widget B</h5>
                                <p class="card-text">Contoh isi lain.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer class="container-fluid bg-dark text-white mt-auto">
        <div class="row">
            <div class="col container py-3 d-flex justify-content-between">
                <div>© 2025 Poin Coffeee</div>
                <div>
                    <a href="#" class="text-white me-2">Privacy</a>
                    <a href="#" class="text-white">Terms</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
            crossorigin="anonymous"></script>
</body>
</html>