<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .cart-container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .cart-table th,
    .cart-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .cart-table th {
        background-color: #f8f8f8;
    }

    .cart-table input[type="number"] {
        width: 50px;
    }

    .remove-btn {
        background-color: #ff4d4d;
        color: #fff;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .remove-btn:hover {
        background-color: #ff1a1a;
    }

    .cart-summary {
        text-align: right;
    }

    .cart-summary h2 {
        margin-bottom: 20px;
    }

    .checkout-btn {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 15px 30px;
        cursor: pointer;
    }

    .checkout-btn:hover {
        background-color: #218838;
    }
    </style>
</head>

<body>
    <div class="cart-container">
        <h1>Keranjang Pembelian</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Kuantitas</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Produk 1</td>
                    <td>Rp 100.000</td>
                    <td>
                        <input type="number" value="1" min="1">
                    </td>
                    <td>Rp 100.000</td>
                    <td><button class="remove-btn">Hapus</button></td>
                </tr>
                <tr>
                    <td>Produk 2</td>
                    <td>Rp 200.000</td>
                    <td>
                        <input type="number" value="1" min="1">
                    </td>
                    <td>Rp 200.000</td>
                    <td><button class="remove-btn">Hapus</button></td>
                </tr>
            </tbody>
        </table>
        <div class="cart-summary">
            <h2>Total: Rp 300.000</h2>
            <button class="checkout-btn">Lanjutkan ke Pembayaran</button>
        </div>
    </div>
</body>