<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout | AyamGeprek.id</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Poppins', Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
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

    <div class="container mt-4 mb-5">
        <h2 class="m-0">Pesanan</h2>
    </div>

    <div class="container row row-cols-1 row-cols-md-2 g-3 p-0 mx-auto">

        <div class="container col">
            <div class="card d-flex flex-row justify-content-between align-items-center mb-3 p-3 rounded-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        <p class="mb-0 ms-2">Pilih Semua (2)</p>
                    </label>
                </div>
                <i class="bi bi-trash-fill text-danger fs-5"></i>
            </div>

            <div class="list-produk card d-flex flex-column justify-content-between align-items-center p-3 rounded-4 gap-4">
                <div class="container form-check d-flex justify-content-between align-items-center pe-0">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <div class="w-100 ps-2">
                        <div class="w-100" style="height: 125px !important;">
                            <img src="{{ asset('img/ayam-geprek.jpg') }}" class="w-100 h-100 rounded-4" style="object-fit: cover;">
                        </div>
                        <div class="info">
                            <p class="lh-base my-2 fw-semibold">(PAHE 1) Nasi + Ayam Geprek + Air Mineral</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="checkout d-flex align-items-center gap-2">
                                    <button type="button" class="add-to-cart btn btn-outline-warning" style="border-color: #F59E0B !important;">–</button>
                                    <p class="m-0 text-center border rounded-2" style="padding:6px 18px !important;">1</p>
                                    <button type="button" class="remove-from-cart btn btn-outline-warning" style="border-color: #F59E0B !important;">+</button>
                                </div>
                                <p class="lh-base m-0 fw-semibold text-end ms-auto">Rp18,000</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container form-check d-flex justify-content-between align-items-center pe-0">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <div class="w-100 ps-2">
                        <div class="w-100" style="height: 125px !important;">
                            <img src="{{ asset('img/ayam-geprek.jpg') }}" class="w-100 h-100 rounded-4" style="object-fit: cover;">
                        </div>
                        <div class="info">
                            <p class="lh-base my-2 fw-semibold">(PAHE 2) Nasi + Ayam Geprek + Es Teh</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="checkout d-flex align-items-center gap-2">
                                    <button type="button" class="add-to-cart btn btn-outline-warning" style="border-color: #F59E0B !important;">–</button>
                                    <p class="m-0 text-center border rounded-2" style="padding:6px 18px !important;">1</p>
                                    <button type="button" class="remove-from-cart btn btn-outline-warning" style="border-color: #F59E0B !important;">+</button>
                                </div>
                                <p class="lh-base m-0 fw-semibold text-end ms-auto">Rp18,000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container col mt-3 mt-md-0 mb-5">
            <div class="card p-3 rounded-4">
                <h5 class="mb-3">Ringkasan Belanja</h5>
                <p class="fw-semibold mb-1">Total Belanja</p>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">Total Barang (2)</p>
                    <p class="m-0">Rp36,000</p>
                </div>
                <p class="fw-semibold mt-3 mb-1">Biaya Transaksi</p>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-1">Biaya Layanan</p>
                    <p class="m-0">Rp0</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">Biaya Jasa Aplikasi</p>
                    <p class="m-0">Rp0</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0 fw-semibold">Total</p>
                    <p class="m-0 fw-semibold">Rp36,000</p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
