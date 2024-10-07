<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Main content */
        .main-content {
            margin-left: 260px; 
            padding: 20px; /* Padding for the main content */
            flex-grow: 1; /* Allow the main content to grow */
            margin: 20px auto; /* Center the main content */
        }

        /* Form Styles */
        .product-form {
            margin: 0; /* Reset margins */
            padding: 20px; /* Padding inside the form */
            background-color: white;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Add some shadow for depth */
        }

        /* Input Styles */
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%; /* Full width */
            padding: 10px; /* Padding inside inputs */
            margin-bottom: 20px; /* Space below inputs */
            border: 1px solid #ddd; /* Border color */
            border-radius: 4px; /* Rounded corners */
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
            color: white; /* Button text color */
            border: none; /* Remove border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer on hover */
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
    <div class="main-content">
        <h1>Edit Product</h1>
        <form action="{{ route('admin.update_product', $product->id) }}" method="POST" class="product-form">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" required>

            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required>

            <label for="price">Price:</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}" required step="0.01">

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4">{{ $product->description }}</textarea>

            <label for="skin_type">Skin Type:</label>
            <input type="text" name="skin_type" id="skin_type" value="{{ $product->skin_type }}">

            <div class="button-group">
                <a href="{{ route('admin.manage_products') }}" class="button-back">Back</a>
                <button type="submit" class="button-create">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>
