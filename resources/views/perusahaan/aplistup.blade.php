<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educare</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background-color: #f8f9fa;
            height: 100vh;
            padding: 20px;
            border-right: 1px solid #ddd;
        }

        .sidebar .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .sidebar .profile h5 {
            margin: 10px 0 5px;
        }

        .sidebar .profile p {
            margin: 0;
            color: #6c757d;
        }

        .sidebar .nav-link {
            color: #000;
            font-weight: bold;
            margin: 10px 0;
        }

        .sidebar .nav-link.active {
            background-color: #6c757d;
            color: #fff;
            border-radius: 5px;
        }

        .content {
            padding: 50px; 
            flex-grow: 1;
        }

        .file-item {
            text-align: center;
            margin-bottom: 20px;
        }

        .file-item img {
            width: 100px;
            height: 170px;
        }

        .file-item p {
            margin: 10px 0 0;
        }

        .btn-back {
            background-color: #bebebea4;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 30px;
        }

        /* Mengatur posisi tombol back */
        .btn-container {
            text-align: right; /* Mengatur posisi tombol ke kanan tapi tidak terlalu mepet */
        }
       
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile">
                <img src="https://placehold.co/50x50" alt="Profile Picture">
                <h5>Nama Perusahaan</h5>
                <p>perusahaan@gmail.com</p>
            </div>
            <nav class="nav flex-column">
                <a class="nav-link" href="#">
                    <i class="fas fa-upload"></i> Upload
                </a>
                <a class="nav-link" href="#">
                    <i class="fas fa-list"></i> Uploaded List
                </a>
                <a class="nav-link active" href="#">
                    <i class="fas fa-users"></i> Applicants List
                </a>
                <a class="nav-link" href="#">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </a>
            </nav>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="row">
                <div class="col-md-3 file-item">
                    <img src="gmbr.png" alt="PNG file icon">
                    <p>KK.png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="gmbr.png" alt="PNG file icon">
                    <p>KTP.png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="gmbr.png" alt="PNG file icon">
                    <p>rapor.png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="gmbr.png" alt="PNG file icon">
                    <p>rapor(2).png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="gmbr.png" alt="PNG file icon">
                    <p>rapor(3).png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="gmbr.png" alt="PNG file icon">
                    <p>pasfoto.png</p>
                </div>
                <div class="col-md-3 file-item">
                    <img src="gmbr.png" alt="PNG file icon">
                    <p>akte.png</p>
                </div>
            </div>
            
            <!-- Wrapper untuk tombol Back -->
            <div class="btn-container">
                <button class="btn-back">Back</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pZg1SIos8VTfR4HZTF0FbTfneFnIz0RoU09NcCd43jkhKexiWrnS1KuD+Jz1QoRp" crossorigin="anonymous"></script>
</body>
</html>
