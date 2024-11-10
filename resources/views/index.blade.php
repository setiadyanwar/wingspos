<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AyamGeprek.id</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Poppins', Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .hero-banner {
            background-image: url("{{ asset('img/hero-banner.png') }}");
            background-size: cover;
            background-position: center;
            height: 400px;
            position: relative;
        }

        .card-active {
            background-color: #FFEDCF;
            border: 2px solid #F59E0B;
        }

        .scroll-view .card:hover {
            background-color: #FFEDCF;
            border: 2px solid #F59E0B;
            transition: all 0.3s ease 0s;
        }

        .card-img-top {
            border-radius: 1rem 1rem 0px 0px;
        }

        .scroll-view {
            overflow-x: auto;
            display: flex;
            gap: 3rem;
            scroll-snap-type: x mandatory;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scroll-view > .card {
            scroll-snap-align: start;
        }

        .checkout .btn {
            color: #F59E0B !important;
        }

        .checkout .btn:hover {
            background-color: #F59E0B !important;
            color: #FFFFFF !important;
        }

        .checkout p {
            padding: 6px 0;
        }
    </style>
</head>
<body>
    <nav class="navbar bg-white sticky-top shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo-section d-flex align-items-center">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/logo-wingpos.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                </a>
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/logo-ayamgeprek.png') }}" alt="Logo Ayam Geprek" width="30" class="logo-ayamgeprek d-inline-block align-text-top">
                </a>
            </div>
            <div class="search-section d-flex flex-md-grow-1 align-items-center gap-2 justify-content-end">
                <form class="col-md-8 px-md-5 ms-md-auto" role="search">
                    <input class="form-control rounded-pill" type="search" placeholder="Search" aria-label="Search">
                </form>
                <a class="navbar-brand ms-md-auto me-0 d-flex justify-between align-items-center gap-2" href="/" style="color: #454545">
                    <p class="fs-6 m-0 d-none d-md-flex">Masuk Sebagai Tamu</p>
                    <i class="bi bi-person-circle" style="font-size: 1.75rem;"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="hero-banner d-grid">
        <div id="carouselExample" class="carousel carousel slide d-flex justify-center align-items-center" data-bs-ride="carousel">
            <div class="carousel-indicators mb-5">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2500">
                    <div style="min-height: 140px;">
                        <div class="carousel-caption px-4 col-md-6 col-lg-5 col-12 ms-sm-auto text-md-start" style="position: inherit;">
                            <h2 class="pe-4 lh-base">Ayam yang paling enak kalo makanannya di ayamgeprek.id</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2500">
                    <div style="min-height: 140px;">
                        <div class="carousel-caption px-4 col-md-6 col-lg-5 col-12 ms-sm-auto text-md-start" style="position: inherit;">
                            <h2 class="pe-4 lh-base">Ayam yang paling enak kalo makanannya di ayamgeprek.id</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2500">
                    <div style="min-height: 140px;">
                        <div class="carousel-caption px-4 col-md-6 col-lg-5 col-12 ms-sm-auto text-md-start" style="position: inherit;">
                            <h2 class="pe-4 lh-base">Ayam yang paling enak kalo makanannya di ayamgeprek.id</h2>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container d-md-flex justify-content-md-center gap-md-3 pb-5" style="margin-top: -4vh;">
        <div class="card rounded-4 d-flex flex-row p-3 justify-content-between align-items-center col-md-6 mb-2 mb-md-0">
              <h6 class="card-title">AyamGeprek.id</h6>
              <p class="card-text bg-success text-light px-2 rounded">BUKA — 8AM to 8PM</p>
        </div>
        <div class="dropdown rounded-4 bg-white p-3 rounded d-flex justify-content-between col-md-6 align-items-center border">
            <label class="form-label m-0">Tipe pemesanan:</label>
            <button class="ms-md-3 btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Makan ditempat</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Makan ditempat</a></li>
                <li><a class="dropdown-item" href="#">Bawa pulang</a></li>
                <li><a class="dropdown-item" href="#">Delivery</a></li>
            </ul>
        </div>
    </div>

    <div class="container kategori pb-5">
        <h5 class="mb-3">Kategori</h5>
        <div class="container p-0 scroll-view d-flex justify-content-md-between gap-3">

            <div id="all-menu" class="card card-active rounded-4 p-2 col-lg-2 col-md-3 col-4 d-flex justify-content-between">
                <img src="{{ asset('img/all-category.png') }}" class="card-img-top mx-auto mb-3" style="width: 50px;" alt="...">
                <h6 class="card-title text-center text-wrap">All Menu</h6>
                <p class="card-text text-center">20 Item</p>
            </div>
            <div id="ayam-geprek" class="card rounded-4 p-2 col-lg-2 col-md-3 col-4 d-flex justify-content-between">
                <img src="{{ asset('img/all-category.png') }}" class="card-img-top mx-auto  mb-3" style="width: 50px;" alt="...">
                <h6 class="card-title text-center text-wrap">Ayam Geprek</h6>
                <p class="card-text text-center">20 Item</p>
            </div>
            <div id="fried-chicken" class="card rounded-4 p-2 col-lg-2 col-md-3 col-4 d-flex justify-content-between">
                <img src="{{ asset('img/all-category.png') }}" class="card-img-top mx-auto mb-3" style="width: 50px;" alt="...">
                <h6 class="card-title text-center text-wrap">Fried Chicken</h6>
                <p class="card-text text-center">20 Item</p>
            </div>
            <div id="nasi-goreng" class="card rounded-4 p-2 col-lg-2 col-md-3 col-4 d-flex justify-content-between">
                <img src="{{ asset('img/all-category.png') }}" class="card-img-top mx-auto  mb-3" style="width: 50px;" alt="...">
                <h6 class="card-title text-center text-wrap">Nasi Goreng</h6>
                <p class="card-text text-center">20 Item</p>
            </div>
            <div id="pempek-tekwan" class="card rounded-4 p-2 col-lg-2 col-md-3 col-4 d-flex justify-content-between">
                <img src="{{ asset('img/all-category.png') }}" class="card-img-top mx-auto mb-3" style="width: 50px;" alt="...">
                <h6 class="card-title text-center text-wrap">Pempek & Tekwan</h6>
                <p class="card-text text-center">20 Item</p>
            </div>
            <div id="minuman" class="card rounded-4 p-2 col-lg-2 col-md-3 col-4 d-flex justify-content-between">
                <img src="{{ asset('img/all-category.png') }}" class="card-img-top mx-auto  mb-3" style="width: 50px;" alt="...">
                <h6 class="card-title text-center text-wrap">Minuman</h6>
                <p class="card-text text-center">20 Item</p>
            </div>
        </div>
    </div>

    <div class="container produk pt-3 pb-5" style="margin-bottom: 5rem;">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-3">
            <!-- Card 1 -->
            <div class="col">
                <div class="card h-100 rounded-4">
                    <img src="{{ asset('img/ayam-geprek.jpg') }}" class="card-img-top" alt="Fried Chicken">
                    <div class="d-flex flex-column justify-content-between">
                        <div class="card-body d-flex justify-content-between align-items-center pb-3">
                            <span class="badge bg-warning text-white px-3 py-2" style="background-color: #FFE0AD !important; color: #F59E0B !important;">Ayam Geprek</span>
                            <p class="card-text text-secondary">Std/pcs</p>
                        </div>
                        <h5 class="card-title m-0 px-3 lh-base">(PAHE 1) Nasi + Ayam Geprek + Air Mineral</h5>
                        <div class="card-body d-flex justify-content-between align-items-center p-3">
                            <h5 class="m-0 harga">Rp18,000</h5>
                            <div class="checkout d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-outline-warning" style="border-color: #F59E0B !important;">–</button>
                                <p class="m-0 w-100 text-center border rounded-2 px-3">1</p>
                                <button type="button" class="btn btn-outline-warning" style="border-color: #F59E0B !important;">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100 rounded-4">
                    <img src="{{ asset('img/ayam-geprek.jpg') }}" class="card-img-top" alt="Fried Chicken">
                    <div class="d-flex flex-column justify-content-between">
                        <div class="card-body d-flex justify-content-between align-items-center pb-3">
                            <span class="badge bg-warning text-white px-3 py-2" style="background-color: #FFE0AD !important; color: #F59E0B !important;">Ayam Geprek</span>
                            <p class="card-text text-secondary">Std/pcs</p>
                        </div>
                        <h5 class="card-title m-0 px-3 lh-base">(PAHE 2) Nasi + Ayam Geprek + Es Teh</h5>
                        <div class="card-body d-flex justify-content-between align-items-center p-3">
                            <h5 class="m-0 harga">Rp18,000</h5>
                            <div class="checkout d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-outline-warning" style="border-color: #F59E0B !important;">–</button>
                                <p class="m-0 w-100 text-center border rounded-2 px-3">1</p>
                                <button type="button" class="btn btn-outline-warning" style="border-color: #F59E0B !important;">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col">
                <div class="card h-100 rounded-4">
                    <img src="{{ asset('img/ayam-geprek.jpg') }}" class="card-img-top" alt="Fried Chicken">
                    <div class="d-flex flex-column justify-content-between">
                        <div class="card-body d-flex justify-content-between align-items-center pb-3">
                            <span class="badge bg-warning text-white px-3 py-2" style="background-color: #FFE0AD !important; color: #F59E0B !important;">Ayam Geprek</span>
                            <p class="card-text text-secondary">Std/pcs</p>
                        </div>
                        <h5 class="card-title m-0 px-3 lh-base">(PAHE 3) Nasi + Ayam Geprek + Lemon Tea</h5>
                        <div class="card-body d-flex justify-content-between align-items-center p-3">
                            <h5 class="m-0 harga">Rp20,000</h5>
                            <div class="checkout d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-outline-warning" style="border-color: #F59E0B !important;">–</button>
                                <p class="m-0 w-100 text-center border rounded-2 px-3">1</p>
                                <button type="button" class="btn btn-outline-warning" style="border-color: #F59E0B !important;">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col">
                <div class="card h-100 rounded-4">
                    <img src="{{ asset('img/ayam-geprek.jpg') }}" class="card-img-top" alt="Fried Chicken">
                    <div class="d-flex flex-column justify-content-between">
                        <div class="card-body d-flex justify-content-between align-items-center pb-3">
                            <span class="badge bg-warning text-white px-3 py-2" style="background-color: #FFE0AD !important; color: #F59E0B !important;">Ayam Geprek</span>
                            <p class="card-text text-secondary">Std/pcs</p>
                        </div>
                        <h5 class="card-title m-0 px-3 lh-base">(PAHE 4) Nasi + Ayam Geprek + Chocolate Drink</h5>
                        <div class="card-body d-flex justify-content-between align-items-center p-3">
                            <h5 class="m-0 harga">Rp24,000</h5>
                            <div class="checkout d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-outline-warning" style="border-color: #F59E0B !important;">–</button>
                                <p class="m-0 w-100 text-center border rounded-2 px-3">1</p>
                                <button type="button" class="btn btn-outline-warning" style="border-color: #F59E0B !important;">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="checkout-button" href="#">
        <div class="container fixed-bottom">
            <div class="checkout-wrapper d-flex align-items-center p-3 mb-4 rounded-4 text-white" style="background-color: #F59E0B;">
                <div class="position-relative">
                    <div class="button rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; background-color: #FFF4C8;">
                        <i class="bi bi-basket fs-4" style="color: #F59E0B;"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        99+
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </div>
                </div>
                <div class="info ms-4 ps-2">
                    <p class="m-0">Total</p>
                    <h5 class="m-0 fs-5">Rp739,000</h5>
                </div>
                <h5 class="ms-auto mt-2 fs-5">Checkout</h5>
            </div>
        </div>
    </a>

    <script>
        // Mendapatkan semua elemen kartu dengan kelas "card"
        const cards = document.querySelectorAll('.kategori .card');

        // Fungsi untuk menambahkan kelas 'card-active' ke kartu yang diklik
        function activateCard(clickedCard) {
            // Menghapus kelas 'card-active' dari semua kartu
            cards.forEach(card => card.classList.remove('card-active'));

            // Menambahkan kelas 'card-active' ke kartu yang diklik
            clickedCard.classList.add('card-active');
        }

        // Menambahkan event listener untuk setiap kartu
        cards.forEach(card => {
            card.addEventListener('click', () => {
                activateCard(card);
            });
        });

        /*
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            const checkoutButton = document.querySelector('.checkout-button');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    checkoutButton.classList.remove('d-none');
                });
            });
        });
        */
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
