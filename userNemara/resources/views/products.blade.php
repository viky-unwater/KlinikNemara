<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products - Nemara Beauty</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

    <main class="container my-5">
        <h1 class="text-center mb-5">Daftar Produk</h1>

        <!-- Grid Produk -->
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <!-- Gambar Produk -->
                    <img src="{{ asset('images/' . str_replace(' ', '_', $product->name) . '.png') }}" class="card-img-top" alt="{{ $product->name }}">

                    <!-- Informasi Produk -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            <strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}<br>
                            <strong>Stok:</strong> {{ $product->stock }}<br>
                            <strong>Deskripsi:</strong> {{ $product->description }}<br>
                            <strong>Tipe Kulit:</strong> {{ $product->skin_type }}
                        </p>
                    </div>

                    <!-- Tombol Tindakan -->
                    <div class="card-footer text-center">
                        <!-- Tombol Shop on Shopee -->
                        <a href="https://shopee.co.id/" class="btn btn-pink mb-2">Shop on Shopee</a>
                        <!-- Tombol Add to Cart -->
                        <button class="btn btn-pink add-to-cart" data-price="{{ $product->price }}" data-name="{{ $product->name }}" data-id="{{ $product->id }}">Add to Cart</button>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

        <!-- Ringkasan Pembelian -->
        <div class="cart-summary mt-5">
            <h3>Total Harga: <span id="total-price">Rp0</span></h3>
            <ul id="cart-list" class="list-unstyled"></ul>
            <button class="btn btn-warning" id="checkout-btn">Pesan Sekarang</button>

            <!-- Form Pemesanan -->
            <form id="order-form" method="POST" action="{{ route('orders.store') }}" class="mt-4 hidden">
                @csrf
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Nomor HP:</label>
                    <input type="tel" id="phone" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pickup-date">Tanggal Pengambilan:</label>
                    <input type="date" id="pickup-date" name="pickup_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pickup-time">Jam Pengambilan (09.00-17.00 WIB):</label>
                    <input type="time" id="pickup-time" name="pickup_time" class="form-control" required min="09:00" max="17:00">
                </div>
                <button type="submit" class="btn btn-pink">Simpan Pesanan</button>
            </form>

            <!-- Notifikasi Pemesanan -->
            <div id="order-notification" class="hidden mt-4 alert alert-success"></div>
        </div>
    </main>

    <footer>
        <div class="footer-info">
            <p>Address: Jl. Kecantikan No. 1, Surabaya</p>
            <p>Hours: Mon - Sun: 09.00 - 17.00</p>
        </div>
        <p class="copyright">© 2024 | Nemara Beauty</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        let cart = [];
        let totalPrice = 0;

        // Set the minimum date to today
        document.addEventListener('DOMContentLoaded', function() {
            const pickupDateInput = document.getElementById('pickup-date');
            const today = new Date().toISOString().split('T')[0];
            pickupDateInput.setAttribute('min', today);
        });

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productName = this.dataset.name;
                const productPrice = parseInt(this.dataset.price);
                const productId = this.dataset.id;

                // Add product to cart array
                const cartItem = { name: productName, price: productPrice, id: productId };
                cart.push(cartItem);

                // Update total price
                totalPrice += productPrice;
                document.getElementById('total-price').textContent = 'Rp' + totalPrice.toLocaleString();

                // Add item to cart list with remove button
                const cartList = document.getElementById('cart-list');
                const listItem = document.createElement('li');
                listItem.innerHTML = productName + ' - Rp' + productPrice.toLocaleString() + 
                                     ' <button class="btn btn-danger btn-sm remove-from-cart" data-price="' + productPrice + '" data-id="' + productId + '">Remove</button>';
                cartList.appendChild(listItem);

                // Remove product from cart when 'Remove' button is clicked
                listItem.querySelector('.remove-from-cart').addEventListener('click', function() {
                    const productPrice = parseInt(this.dataset.price);
                    const productId = this.dataset.id;

                    // Remove the product from cart array
                    cart = cart.filter(item => item.id != productId);

                    // Update total price
                    totalPrice -= productPrice;
                    document.getElementById('total-price').textContent = 'Rp' + totalPrice.toLocaleString();

                    // Remove item from UI
                    listItem.remove();
                });
            });
        });

        document.getElementById('checkout-btn').addEventListener('click', function() {
            document.getElementById('order-form').classList.remove('hidden');
        });

        document.getElementById('order-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const name = document.getElementById('name').value;
            const phone = document.getElementById('phone').value;
            const pickupDate = document.getElementById('pickup-date').value;
            const pickupTime = document.getElementById('pickup-time').value;

            console.log('Mengirim data: ', { name, phone, pickup_date: pickupDate, pickup_time: pickupTime, items: cart });

            fetch('{{ route("orders.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    name: name,
                    phone: phone,
                    pickup_date: pickupDate,
                    pickup_time: pickupTime,
                    items: cart // Kirim keranjang belanja
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log('Response dari server: ', data);
                // Tampilkan notifikasi pemesanan
                const notification = document.getElementById('order-notification');
                notification.textContent = `Terima kasih ${name}, pesanan Anda sudah kami terima! Silahkan ambil barang Anda pada ${pickupDate} pukul ${pickupTime}. Total yang harus dibayar adalah Rp${totalPrice.toLocaleString()}.`;
                notification.classList.remove('hidden');

                // Kosongkan keranjang dan reset total harga
                cart = [];
                totalPrice = 0;
                document.getElementById('total-price').textContent = 'Rp0';
                document.getElementById('cart-list').innerHTML = '';
                document.getElementById('order-form').classList.add('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
