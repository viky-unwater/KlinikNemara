<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .sidebar {
            width: 250px; /* Fixed width for the sidebar */
            height: 650px;
            background-color: #d18f80; /* Sidebar background color */
            color: white; /* Text color */
            padding: 15px; /* Padding inside the sidebar */
            position: fixed; /* Fix the sidebar to the screen */
            left: 0; /* Stick to the left side of the screen */
            top: 0; /* Align to the top of the screen */
            bottom: 0; /* Stretch the sidebar height to the bottom of the screen */
        }

        /* Reuse the style from the products table for the orders */
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
            <li><a href="{{ route('admin.manage_treatments') }}"><i class="fas fa-spa"></i>Manage Treatments</a></li>
            <li><a href="{{ route('admin.manage_reservations') }}"><i class="fas fa-calendar-alt"></i>Manage Reservations</a></li>
            <li><a href="{{ route('admin.manage_consultations') }}"><i class="fas fa-stethoscope"></i>Manage Consultations</a></li>
            <li><a href="{{ route('admin.manage_products') }}"><i class="fas fa-box"></i>Manage Products</a></li>
            <li><a href="{{ route('admin.manage_orders') }}"><i class="fas fa-shopping-cart"></i>Manage Orders</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Manage Reservations</h1>

        <table>
            <thead>
                <tr>
                    <th>Treatment ID</th>
                    <th>Name</th>
                    <th>Last Facial</th>
                    <th>Treatment Type</th>
                    <th>Needs Consultation</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Status</th> <!-- Added Status Column -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->last_facial }}</td>
                    <td>{{ $reservation->treatment_type }}</td>
                    <td>{{ $reservation->needs_consultation ? 'Yes' : 'No' }}</td>
                    <td>{{ $reservation->appointment_date }}</td>
                    <td>{{ $reservation->appointment_time }}</td>
                    <td>{{ $reservation->status }}</td> <!-- Show Status -->
                    <td>
                        @if($reservation->status == 'pending')
                            <button class="complete-reservation" data-reservation-id="{{ $reservation->id }}">Selesaikan Reservasi</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.querySelectorAll('.complete-reservation').forEach(button => {
            button.addEventListener('click', function() {
                const reservationId = this.getAttribute('data-reservation-id');

                fetch(`/admin/reservations/${reservationId}/complete`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Menambahkan token CSRF
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Reservasi telah diselesaikan.');
                        location.reload(); // Reload untuk memperbarui status
                    } else {
                        alert(data.message); // Tampilkan pesan error
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>
</html>
