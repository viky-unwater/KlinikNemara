<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .sidebar {
            width: 250px; /* Fixed width for the sidebar */
            background-color: #d18f80; /* Sidebar background color */
            color: white; /* Text color */
            padding: 15px; /* Padding inside the sidebar */
            position: flex; /* Keep the sidebar fixed */
            margin-right: 1000px;
        }
        /* Form Styles */
        .product-form {
            margin-left: 50px;
            margin-right: 10px;
            max-width: 800px; /* Limit the width of the form */
            margin: 0 auto; /* Center the form */
            background-color: #fff; /* Background color for the form */
            padding: 20px;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Add some shadow for depth */
        }

        /* Input Styles */
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Button Group */
        .button-group {
            display: flex;
            justify-content: space-between; /* Space out the buttons */
        }

        /* Button Styles */
        .button-create, .button-back {
            padding: 10px 15px;
            background-color: #d18f80; /* Button background color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none; /* No underline for back button */
            transition: background-color 0.3s; /* Smooth transition */
        }

        .button-create:hover,
        .button-back:hover {
            background-color: #deb0a5; /* Button hover color */
        }

    </style>
</head>
<body>
    <!-- Sidebar -->
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
        <h1>Add Product</h1>
        <form action="{{ route('admin.store_product') }}" method="POST" class="product-form">
            @csrf

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" required>

            <label for="price">Price:</label>
            <input type="number" name="price" id="price" required step="0.01">

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4"></textarea>

            <label for="skin_type">Skin Type:</label>
            <input type="text" name="skin_type" id="skin_type">

            <div class="button-group">
                <a href="{{ route('admin.manage_products') }}" class="button-back">Back</a>
                <button type="submit" class="button-create">Add Product</button>
            </div>
        </form>
    </div>
</body>
</html>
