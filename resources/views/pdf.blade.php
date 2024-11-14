<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants List</title>
    <style>
        body { font-family: 'Cairo', sans-serif; font-size: 12px; }
        .table { width: 100%; border-collapse: collapse; }
        .table, .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        .table th { background-color: #f2f2f2; }
        .header, .footer { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Applicants List - Educare</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Nama Beasiswa</th>
                <th>Waktu Pendaftaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftars as $index => $daftar)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $daftar->namalengkap }}</td>
                    <td>{{ $daftar->tanggal_lahir }}</td>
                    <td>{{ $daftar->jenis_kelamin }}</td>
                    <td>{{ $daftar->email }}</td>
                    <td>{{ $daftar->no_telp }}</td>
                    <td>{{ $daftar->beasiswa ? $daftar->beasiswa->namabeasiswa : 'Tidak Ada' }}</td>
                    <td>{{ \Carbon\Carbon::parse($daftar->created_at)->format('d M Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Educare. All rights reserved.</p>
    </div>
</body>
</html>
