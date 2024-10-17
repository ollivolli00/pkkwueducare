<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            height: 100vh;
            position: fixed;
            border-right: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar .profile {
            text-align: center;
            padding: 20px;
        }
        .sidebar .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
        .sidebar .profile h5 {
            margin-top: 10px;
            font-size: 16px;
        }
        .sidebar .profile p {
            font-size: 14px;
            color: #6c757d;
        }
        .sidebar .nav-link {
            font-size: 16px;
            color: #000;
            padding: 15px 20px;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
        }
        .sidebar .nav-link.active {
            background-color: #adb5bd;
            color: #fff;
        }
        .content {
            margin-left: 250px;
            padding: 50px;
        }
        .card {
            border-radius: 15px;
            padding: 20px;
            margin: 10px;
        }
        .card img {
            height: auto;
        }
        .card h4 {
            font-size: 20px;
            font-weight: bold;
            margin: 0; /* Removed margin to align text properly */
        }
        .card p {
            font-size: 14px;
            color: #6c757d;
        }
        .card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card a {
            background-color: #bebebea4;
            border: none;
            padding: 6px 40px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none; /* Menghilangkan garis bawah */
            color: black; /* Warna teks */
            align-self: flex-start; /* Align button to the left */
        }
        .card a:hover {
            background-color: #adb5bd; /* Warna latar belakang saat hover */
            color: white; /* Warna teks saat hover */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div>
            <div class="profile">
                <img src="https://storage.googleapis.com/a1aa/image/TsPTHHQA9PLmIZY2P9D0HASO0e0SXKHpfutawnKUyYyYKRnTA.jpg" alt="Profile Picture" width="80" height="80"/>
                <h5>Nama Perusahaan</h5>
                <p>perusahaan@gmail.com</p>
            </div>
            <a class="nav-link" href="#"><i class="fas fa-upload"></i> Upload</a>
            <a class="nav-link active" href="#"><i class="fas fa-list"></i> Uploaded List</a>
            <a class="nav-link" href="#"><i class="fas fa-users"></i> Applicants List</a>
        </div>
        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="d-flex align-items-center">
                        <img src="bcakcil.png" alt="BCA Logo" width="135" height="135"/>
                        <div class="ms-4 card-body">
                            <h4>Beasiswa S1</h4>
                            <p>by Bank BCA</p>
                            <a href="">VIEW</a> <!-- Tautan ditambahkan di sini -->
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="d-flex align-items-center">
                        <img src="bcakcil.png" alt="BCA Logo" width="135" height="135"/>
                        <div class="ms-4 card-body">
                            <h4>Beasiswa S3</h4>
                            <p>by Bank BCA</p>
                            <a href="">VIEW</a> <!-- Tautan ditambahkan di sini -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="d-flex align-items-center">
                        <img src="bcakcil.png" alt="BCA Logo" width="135" height="135"/>
                        <div class="ms-4 card-body">
                            <h4>Beasiswa S2</h4>
                            <p>by Bank BCA</p>
                            <a href="">VIEW</a> <!-- Tautan ditambahkan di sini -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
