<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
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
        <h1>Manage Orders</h1>

        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Pickup Date</th>
                    <th>Pickup Time</th>
                    <th>Items</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->pickup_date }}</td>
                    <td>{{ $order->pickup_time }}</td>
                    <td>
                        @foreach(json_decode($order->items) as $item)
                            {{ $item->name }} ({{ $item->price }})<br>
                        @endforeach
                    </td>
                    <td>
                        @if($order->status == 'pending')
                            <button class="accept-order" data-order-id="{{ $order->id }}">Pesanan Diterima</button>
                        @else
                            <button class="completed" disabled>Pesanan Selesai</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.querySelectorAll('.accept-order').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.getAttribute('data-order-id');
                
                // Send request to update the order
                fetch(`/admin/orders/${orderId}/accept`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        orderId: orderId,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Change button to "Pesanan Selesai"
                        this.textContent = 'Pesanan Selesai';
                        this.classList.add('completed');
                        this.disabled = true;
                    }
                });
            });
        });
    </script>
</body>
</html>
