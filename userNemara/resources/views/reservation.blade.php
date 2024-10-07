<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation - Nemara Beauty</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Centered Heading and Form */
        h1 {
            text-align: center;
            margin-top: 5px;
            margin-bottom: 5px;
            font-size: 30px;
            font-weight: bold;
        }

        /* Kontainer Form Berada di Bawah Heading */
        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            gap: 10px;
        }

        /* Penyesuaian pada Form Box */
        .form-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin-top: 20px;
        }
        .form-group textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .alert {
            padding: 10px;
            background-color: #d18f80; /* Green */
            color: white;
            margin-bottom: 15px;
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Nemara Beauty Logo">
            </div>
            <ul class="nav-menu">
                <li><a href="/">Home</a></li>
                <li><a href="/treatments">Treatments</a></li>
                <li><a href="/reservation">Reservation</a></li>
                <li><a href="/products">Products</a></li>
            </ul>
        </nav>
    </header>

    <main class="container form-container">
        <h1 class="fade-in">Reservation</h1>
        
        <!-- Success Notification -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Step 1: Option to select New or Returning -->
        <div class="form-box fade-in">
            <h2>Hi! Nemara Friends</h2>
            <p>Silakan pilih apakah Anda klien baru atau sudah pernah berkunjung:</p>
            <button class="btn btn-pink" id="new-client-btn">Saya Klien Baru</button>
            <button class="btn btn-pink" id="returning-client-btn">Saya Klien Lama</button>
        </div>

        <!-- Step 2: New Consultation Form -->
        <div class="form-box fade-in hidden" id="new-client-form">
            <h2>Konsultasi Dokter</h2>
            <form action="{{ route('booking.consultation') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">No. HP:</label>
                    <input type="tel" name="phone" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin:</label>
                    <select name="gender" required class="form-control">
                        <option value="male">Laki-Laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birth_date">Tanggal Lahir:</label>
                    <input type="date" name="birth_date" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="complaint">Keluhan (Hal yang ingin dikonsultasikan):</label>
                    <textarea name="complaint" required class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="appointment_date">Tanggal Konsultasi:</label>
                    <input type="date" name="appointment_date" required class="form-control" min="{{ date('Y-m-d') }}">
                </div>
                <div class="form-group">
                    <label for="appointment_time">Jam Konsultasi:</label>
                    <select name="appointment_time" required class="form-control">
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-pink">Book Consultation</button>
            </form>
        </div>

        <!-- Step 2: Returning Client - Treatment Form -->
        <div class="form-box fade-in hidden" id="returning-client-form">
            <h2>Reservasi Treatment</h2>
            <form action="{{ route('booking.treatment') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">No. HP:</label>
                    <input type="tel" name="phone" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin:</label>
                    <select name="gender" required class="form-control">
                        <option value="male">Laki-Laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birth_date">Tanggal Lahir:</label>
                    <input type="date" name="birth_date" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="last_facial">Kapan terakhir treatment?:</label>
                    <input type="date" name="last_facial" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="treatment_type">Treatment:</label>
                    <a href="list-treatment.html" target="_blank" class="btn btn-info btn-sm">View List of Treatments</a>
                    <select name="treatment_type" required class="form-control" style="margin-top: 10px;">
                        <option value="" disabled selected>Select a Treatment</option>
                        <option value="Acne Clear">Acne Clear</option>
                        <option value="Acne Glow">Acne Glow</option>
                        <option value="Clear Bright">Clear Bright</option>
                        <option value="Breakout Free">Breakout Free</option>
                        <option value="Korean Light">Korean Light</option>
                        <option value="Korean Glass Skin Bright">Korean Glass Skin Bright</option>
                        <option value="Glow DNA Salmon">Glow DNA Salmon</option>
                        <option value="Fresh Rehydrate">Fresh Rehydrate</option>
                        <option value="Skin Barrier Healer">Skin Barrier Healer</option>
                        <option value="Translucent Booster">Translucent Booster</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="needs_consultation">Apakah Anda ingin berkonsultasi terlebih dahulu?</label>
                    <select name="needs_consultation" required class="form-control" id="needs-consultation">
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>

                <div class="form-group hidden" id="complaint-section">
                    <label for="complaint">Keluhan (Hal yang ingin dikonsultasikan):</label>
                    <textarea name="complaint" class="form-control" id="complaint-field"></textarea>
                </div>

                <div class="form-group">
                    <label for="appointment_date">Tanggal Reservasi:</label>
                    <input type="date" name="appointment_date" required class="form-control" min="{{ date('Y-m-d') }}">
                </div>

                <div class="form-group">
                    <label for="appointment_time">Jam Konsultasi:</label>
                    <select name="appointment_time" required class="form-control">
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-pink">Book Treatment</button>
            </form>
        </div>
    </main>

    <script>
        // Toggle between new client and returning client forms
        document.getElementById('new-client-btn').addEventListener('click', function() {
            document.getElementById('new-client-form').classList.remove('hidden');
            document.getElementById('returning-client-form').classList.add('hidden');
        });

        document.getElementById('returning-client-btn').addEventListener('click', function() {
            document.getElementById('returning-client-form').classList.remove('hidden');
            document.getElementById('new-client-form').classList.add('hidden');
        });

        // Show/hide complaint section if consultation is needed
        document.getElementById('needs-consultation').addEventListener('change', function() {
            if (this.value == '1') {
                document.getElementById('complaint-section').classList.remove('hidden');
            } else {
                document.getElementById('complaint-section').classList.add('hidden');
                document.getElementById('complaint-field').value = '';
            }
        });
        
    </script>
</body>
</html>
