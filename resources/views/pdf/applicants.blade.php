<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelamar</title>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            max-width: 50px;
            max-height: 50px;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Daftar Pelamar Beasiswa</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Image</th>
                <th>Nama Beasiswa</th>
                <th>Unduh File</th>
                <th>Waktu Pendaftaran</th>
            </tr>
        </thead>
        <tbody>
            @if($daftars->count())
                @foreach($daftars as $index => $daftar)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $daftar->namalengkap }}</td>
                        <td>{{ $daftar->tanggal_lahir }}</td>
                        <td>{{ $daftar->jenis_kelamin }}</td>
                        <td>{{ $daftar->email }}</td>
                        <td>{{ $daftar->no_telp }}</td>
                        <td>
                            @if($daftar->image)
                                <img src="{{ public_path('storage/images/'.$daftar->image) }}" alt="User Image">
                            @else
                                Tidak Ada
                            @endif
                        </td>
                        <td>{{ $daftar->beasiswa->namabeasiswa ?? 'Tidak Ada' }}</td>
                        <td>
                            @if($daftar->zip_file)
                                <a href="{{ public_path('storage/files/' . $daftar->zip_file) }}" download>
                                    Unduh File ZIP
                                </a>
                            @else
                                Tidak Ada
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($daftar->created_at)->diffForHumans() }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">Tidak ada pelamar yang ditemukan.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
