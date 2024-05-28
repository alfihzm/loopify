<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Receipt</h1>
        Telah diterima sebesar XXX pada tanggal XXX pukul XXX dengan XXX dari saldo akun XXX
        Petugas yang menyerahkan saldo sebesar XXX, saldo berkurang sebesar XXX - XXX
        <table>
            <thead>
                <tr>
                    <th>ID Member</th>
                    <th>Username</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Lokasi</th>
                    <th>Tunai</th>
                    <th>Nomor Rekening</th>
                    <th>Koin Sebelum</th>
                    <th>Koin Saat Ini</th>
                    <th>Nominal Yang Ditarik Tunai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123456</td>
                    <td>john_doe</td>
                    <td>2024-05-28</td>
                    <td>10:00</td>
                    <td>Jakarta</td>
                    <td>200000</td>
                    <td>1234567890</td>
                    <td>500</td>
                    <td>300</td>
                    <td>200000</td>
                </tr>
                <tr>
                    <td>654321</td>
                    <td>jane_smith</td>
                    <td>2024-05-28</td>
                    <td>11:30</td>
                    <td>Bandung</td>
                    <td>150000</td>
                    <td>0987654321</td>
                    <td>800</td>
                    <td>700</td>
                    <td>150000</td>
                </tr>
                <!-- Data fiktif lainnya bisa ditambahkan di sini -->
            </tbody>
        </table>
    </div>
</body>
</html>
