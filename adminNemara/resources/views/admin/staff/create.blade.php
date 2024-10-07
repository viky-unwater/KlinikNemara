<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Staff</title>
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
        .main-content {
            padding: 20px;
            margin-left: 320px;
            margin-right: 10px;
            border-radius: 8px;
        }
        form {
            margin: 20px 0;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
            <h1>Create Staff</h1>
            <form action="{{ route('admin.store_staff') }}" method="POST">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
                
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
                
                <label for="role">Role</label>
                <input type="text" name="role" id="role" required>
                
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
                
                <button type="submit">Create Staff</button>
            </form>
        </div>
    </div>
</body>
</html>