<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .main-content {
            margin-left: 320px; 
            padding: 20px; /* Padding for the main content */
            flex-grow: 1; /* Allow the main content to grow */
            margin: 20px auto; /* Center the main content */
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Main Content -->
        <div class="main-content">
            <h1>Product Detail</h1>
            <div>
                <strong>Name:</strong> {{ $product->name }}<br>
                <strong>Stock:</strong> {{ $product->stock }}<br>
                <strong>Price:</strong> {{ $product->price }}<br>
                <strong>Description:</strong> {{ $product->description }}<br>
                <strong>Skin Type:</strong> {{ $product->skin_type }}<br>
            </div>
            <a href="{{ route('admin.manage_products') }}" style="margin-top: 20px;" class="button-create">Back to Products</a>
        </div>
    </div>
</body>
</html>
