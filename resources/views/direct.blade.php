<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to Admin</title>
    <!-- Mengarahkan otomatis setelah 3 detik -->
    <script>
        setTimeout(function() {
            window.location.href = "{{ url('/admin') }}";
        }, 3000); // 3000 milidetik = 3 detik
    </script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }
        .redirect-container {
            text-align: center;
        }
        .redirect-container h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .redirect-container p {
            color: #555;
        }
        .redirect-container a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #F59E0B;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .redirect-container a:hover {
            background-color: #F59E0B;
        }
    </style>
</head>
<body>
    <div class="redirect-container">
        <h1>Anda akan diarahkan ke halaman Admin</h1>
        <p>Jika Anda tidak dialihkan secara otomatis, klik tombol di bawah ini:</p>
        <a href="{{ url('/admin') }}">Pergi ke Admin Sekarang</a>
    </div>
</body>
</html>
