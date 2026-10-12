<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAP Sertifikasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            color: #1e293b;
            min-height: 100vh;
        }

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }

        .navbar-brand {
            letter-spacing: -0.3px;
        }

        .hero {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 3rem 2.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .accent {
            color: #2563eb;
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
            padding: 0.5rem 1.25rem;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .btn-outline-primary {
            border-color: #2563eb;
            color: #2563eb;
        }

        .btn-outline-primary:hover {
            background: #2563eb;
            border-color: #2563eb;
        }

        .info-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            height: 100%;
            transition: border-color 0.15s ease;
        }

        .info-card:hover {
            border-color: #cbd5e1;
        }

        .label {
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: #2563eb;
        }
    </style>
</head>
<body>

<nav class="navbar py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}" class="navbar-brand fw-bold accent mb-0">
            SIAP Sertifikasi
        </a>

        <div class="d-flex gap-2">
            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
        </div>
    </div>
</nav>

<main class="container py-5">
    <div class="hero mb-4">
        <p class="label mb-2">Sistem Informasi</p>
        <h1 class="fw-bold mb-3" style="letter-spacing: -0.5px;">
            Aplikasi Peserta Sertifikasi
        </h1>
        <p class="text-secondary mb-4" style="max-width: 520px; line-height: 1.6;">
            Platform sederhana untuk mengelola data peserta dan skema sertifikasi.
            Dirancang agar proses pendataan lebih cepat, rapi, dan mudah dipantau.
        </p>

        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="info-card">
                <h5 class="fw-semibold mb-2">Data Peserta</h5>
                <p class="text-secondary mb-0 small" style="line-height: 1.55;">
                    Catat dan kelola informasi peserta mulai dari data pribadi,
                    kontak, hingga skema sertifikasi yang diikuti.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card">
                <h5 class="fw-semibold mb-2">Data Skema</h5>
                <p class="text-secondary mb-0 small" style="line-height: 1.55;">
                    Atur daftar skema sertifikasi yang tersedia, lengkap dengan
                    kode dan deskripsi untuk memudahkan pengelompokan peserta.
                </p>
            </div>
        </div>
    </div>
</main>

</body>
</html>