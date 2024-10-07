<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Detail Pasien</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <ul class="nav-menu">
                <h2>Selamat datang Dr. Fina</h2>
                <li>
                    <a href="/logout">
                    <img src="{{ asset('images/profile.png') }}" alt="Logout" class="profile-icon">
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <h1 class="fade-in">Detail Pasien</h1>
        <div class="form-box-detail zoom-in">
            <p><strong>Nama:</strong> {{ $consultation->name }}</p>
            <p><strong>No. Telepon:</strong> {{ $consultation->phone }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $consultation->gender }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $consultation->birth_date }}</p>
            <p><strong>Keluhan:</strong> {{ $consultation->complaint }}</p>
            <p><strong>Tanggal Janji:</strong> {{ $consultation->appointment_date }}</p>
            <p><strong>Jam Janji:</strong> {{ $consultation->appointment_time }}</p>
            <a href="/dashboard" class="btn">Kembali</a> <!-- Pastikan menggunakan kelas 'btn' -->
        </div>
    </main>
</body>
</html>
