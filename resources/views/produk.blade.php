<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | AyamGeprek.id</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Poppins', Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .checkout-btn {
            color: #FFFFFF !important;
        }

        .add-to-cart,
        .remove-from-cart {
            color: #F59E0B !important;

        }

        .checkout .btn:hover {
            background-color: #F59E0B !important;
            color: #FFFFFF !important;
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

    <div class="container mt-4 pb-5 mb-5 mx-auto row row-cols-1 row-cols-md-2 g-md-4">
        <div class="image mb-4 px-0 pe-md-2 col">
            <img class="w-100 rounded-4" src="{{ asset('img/ayam-geprek.jpg') }}" alt="">
        </div>
        <div class="info pb-5 px-0 ps-md-2 col">
            <div class="p-3 mb-4 rounded-4 border">
                <span class="badge bg-warning text-white px-3 py-2 mb-3" style="background-color: #FFE0AD !important; color: #F59E0B !important;">Ayam Geprek</span>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="lh-base m-0">(PAHE 1) Nasi + Ayam Geprek + Air Mineral</h5>
                    <p class="card-text text-secondary">Std/pcs</p>
                </div>
                <p class="lh-lg text-secondary">Tersisa 9 buah</p>
                <hr>
                <p class="lh-lg text-secondary m-0">Rasakan kelezatan perpaduan sempurna ayam goreng krispi dan sambal pedas khas yang menggugah selera. Cocok dinikmati dengan nasi hangat untuk pengalaman makan yang penuh cita rasa. Pesan sekarang dan nikmati sensasi pedas yang bikin ketagihan!</p>
            </div>
            <div class="p-3 mb-5 rounded-4 border d-flex justify-content-between align-items-center">
                <p class="lh-lg text-secondary m-0">Harga</p>
                <h5 class="text-end m-0">Rp18,000</h5>
            </div>
        </div>
    </div>

    <div class="checkout container fixed-bottom bg-white pb-4 border-top">
        <div class="py-3 rounded-4 d-flex justify-content-between align-items-center">
            <p class="lh-lg text-secondary m-0 text-start">Jumlah Pesanan</p>
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="btn btn-outline-warning add-to-cart" style="border-color: #F59E0B !important;">–</button>
                <p class="m-0">1</p>
                <button type="button" class="btn btn-outline-warning remove-from-cart" style="border-color: #F59E0B !important;">+</button>
            </div>
        </div>
        <button type="button" class="checkout-btn btn btn-warning text-white w-100 rounded-4 py-3 fs-5 fw-semibold" style="background-color: #F59E0B;">Tambahkan Pesanan (Rp18,000)</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
