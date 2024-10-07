<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
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

        .dashboard-container {
            display: fixed;
        }
        /* Main Content */
        .main-content {
            padding: 20px;
            margin-left: 320px; /* Add some margin to the left */
            margin-right: 10px; /* Add some margin to the right */
            border-radius: 8px; /* Rounded corners */
        }

        /* Table Styles */
        table {
            width: 900px;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #d18f80; /* Border color for table and cells */
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #d18f80; /* Header background color */
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Form Styles */
        form {
            margin: 20px 0;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            background-color: #d18f80; /* Button background color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
        }

        button:hover {
            background-color: #deb0a5; /* Button hover color */
        }

        /* Alert Styles */
        .alert {
            margin: 20px 0;
            padding: 15px;
            background-color: #d18f80; /* Alert background color */
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
                <li><a href="{{ route('admin.manage_treatments') }}"><i class="fas fa-spa"></i>Manage Treatments</a></li>
                <li><a href="{{ route('admin.manage_reservations') }}"><i class="fas fa-calendar-alt"></i>Manage Reservations</a></li>
                <li><a href="{{ route('admin.manage_consultations') }}"><i class="fas fa-stethoscope"></i>Manage Consultations</a></li>
                <li><a href="{{ route('admin.manage_products') }}"><i class="fas fa-box"></i>Manage Products</a></li>
                <li><a href="{{ route('admin.manage_orders') }}"><i class="fas fa-shopping-cart"></i>Manage Orders</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Manage Products</h1>
            @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif
            <a href="{{ route('admin.create_product') }}" class="button-create">Add New Product</a>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('admin.show_product', $product->id) }}" class="button-detail">
                                    <i class="fa fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('admin.edit_product', $product->id) }}" class="button-edit">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.delete_product', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button-delete">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </body>
</html>