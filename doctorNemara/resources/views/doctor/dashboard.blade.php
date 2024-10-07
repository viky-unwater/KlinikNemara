<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Dashboard Dokter</title>
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
        <h1 class="fade-in">Daftar Pasien Konsultasi</h1>
        <table class="table zoom-in">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>Tanggal Janji</th>
                    <th>Jam Janji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultations as $consultation)
                    <tr>
                        <td>{{ $consultation->name }}</td>
                        <td>{{ $consultation->phone }}</td>
                        <td>{{ $consultation->appointment_date }}</td>
                        <td>{{ $consultation->appointment_time }}</td>
                        <td><a href="/patient/{{ $consultation->id }}" class="btn-sm">Lihat Detail</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>
