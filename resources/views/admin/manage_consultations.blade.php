<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Consultations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .sidebar {
            margin-top: 230px;
            width: 250px; /* Fixed width for the sidebar */
            height: 650px;
            background-color: #d18f80; /* Sidebar background color */
            color: white; /* Text color */
            padding: 15px; /* Padding inside the sidebar */
            position: flex; /* Keep the sidebar fixed */
            margin-right: 1025px;
            margin-bottom:20px;
        }
        .main-content {
            padding: 20px;
            margin-left: 320px;
            margin-right: 10px;
            border-radius: 8px;
        }
        table {
            width: 900px;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #d18f80;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #d18f80;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        button {
            padding: 10px 15px;
            background-color: #d18f80;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #deb0a5;
        }
        .completed {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="{{ route('admin.manage_users') }}"><i class="fas fa-users"></i>Manage Users</a></li>
            <li><a href="{{ route('admin.manage_staff') }}"><i class="fas fa-user-md"></i>Manage Staff</a></li>
            <li><a href="{{ route('admin.manage_treatments') }}"><i class="fas fa-spa"></i>Treatments</a></li>
            <li><a href="{{ route('admin.manage_reservations') }}"><i class="fas fa-calendar-alt"></i>Manage Reservations</a></li>
            <li><a href="{{ route('admin.manage_consultations') }}"><i class="fas fa-stethoscope"></i>Manage Consultations</a></li>
            <li><a href="{{ route('admin.manage_products') }}"><i class="fas fa-box"></i>Manage Products</a></li>
            <li><a href="{{ route('admin.manage_orders') }}"><i class="fas fa-shopping-cart"></i>Manage Orders</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Consultation List</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Tanggal Lahir</th>
                    <th>Keluhan</th>
                    <th>Tanggal Konsultasi</th>
                    <th>Jam Konsultasi</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultations as $consultation)
                <tr>
                    <td>{{ $consultation->id }}</td>
                    <td>{{ $consultation->name }}</td>
                    <td>{{ $consultation->gender }}</td>
                    <td>{{ $consultation->birth_date }}</td>
                    <td>{{ $consultation->complaint }}</td>
                    <td>{{ $consultation->appointment_date }}</td>
                    <td>{{ $consultation->appointment_time }}</td>
                    <td id="status-{{ $consultation->id }}">{{ $consultation->status === 'completed' ? 'Selesai' : 'Belum Selesai' }}</td>
                    <td>
                        <button onclick="updateStatus({{ $consultation->id }})">
                            {{ $consultation->status === 'completed' ? 'Berhasil' : 'Set Selesai' }}
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function updateStatus(id) {
            fetch(`/consultations/${id}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Pastikan CSRF token dikirimkan
                }
            })
            .then(response => {
                // Cek apakah response dalam format JSON
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parsing JSON
            })
            .then(data => {
                if (data.success) {
                    const statusElement = document.getElementById(`status-${id}`);
                    statusElement.innerText = data.new_status === 'completed' ? 'Selesai' : 'Belum Selesai';

                    const buttonElement = statusElement.nextElementSibling.querySelector('button');
                    buttonElement.innerText = data.new_status === 'completed' ? 'Set Belum Selesai' : 'Set Selesai';
                } else {
                    alert('Gagal memperbarui status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

    </script>
</body>
</html>
