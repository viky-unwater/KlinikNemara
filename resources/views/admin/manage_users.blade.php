<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .dashboard-container {
            display: flex;
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

        .alert {
            margin: 20px 0;
            padding: 15px;
            background-color: #d18f80;
            color: white;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
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
            <h1>Manage Users</h1>
            @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->birth_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
