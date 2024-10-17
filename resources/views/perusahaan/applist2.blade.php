<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants List</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Sidebar styling */
        .sidebar {
            background-color: #f0f0f0;
            height: 100vh;
            padding: 20px;
            width: 250px;
            position: fixed;
        }

        .sidebar .nav-link {
            color: black;
            font-size: 18px;
            margin: 10px 0;
        }

        .sidebar .nav-link.active {
            background-color: #d3d3d3;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }

        .profile h5 {
            margin-top: 10px;
            font-size: 18px;
        }

        .profile p {
            font-size: 14px;
            color: gray;
        }

        /* Table container */
        .table-container {
            padding: 50px;
            flex-grow: 1;
            margin-left: 250px;
        }

        /* Table styling */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #e0e0e0;
        }

        .table td img {
            width: 40px;
            height: 40px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: right;
            margin-top: 20px;
        }

        .pagination .btn {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile">
                <img src="https://placehold.co/100x100" alt="Profile Picture">
                <h5>Nama Perusahaan</h5>
                <p>perusahaan@gmail.com</p>
            </div>
            <nav class="nav flex-column">
                <a class="nav-link" href="#"><i class="fas fa-upload"></i> Upload</a>
                <a class="nav-link" href="#"><i class="fas fa-list"></i> Uploaded List</a>
                <a class="nav-link active" href="#"><i class="fas fa-users"></i> Applicants List</a>
                <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </nav>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Uploaded File</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Regina Olivia</td>
                        <td><a href="mailto:reginaa@gmail.com">reginaa@gmail.com</a></td>
                        <td>08119540957</td>
                        <td>
                            <img src="gmbr.png" alt="File Icon">
                            <img src="gmbr.png" alt="File Icon">
                            + 5 more
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Selly Regita</td>
                        <td><a href="mailto:rereee@gmail.com">rereee@gmail.com</a></td>
                        <td>08133359018</td>
                        <td>
                            <img src="gmbr.png" alt="File Icon">
                            <img src="gmbr.png" alt="File Icon">
                            + 5 more
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Jasmine Novandrea</td>
                        <td><a href="mailto:navaa@gmail.com">navaa@gmail.com</a></td>
                        <td>081249590572</td>
                        <td>
                            <img src="gmbr.png" alt="File Icon">
                            <img src="gmbr.png" alt="File Icon">
                            + 5 more
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Lydia Wulan</td>
                        <td><a href="mailto:liddiaa@gmail.com">liddiaa@gmail.com</a></td>
                        <td>083110601563</td>
                        <td>
                            <img src="gmbr.png" alt="File Icon">
                            <img src="gmbr.png" alt="File Icon">
                            + 5 more
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Verda Edgina</td>
                        <td><a href="mailto:daverda@gmail.com">daverda@gmail.com</a></td>
                        <td>085236593477</td>
                        <td>
                            <img src="gmbr.png" alt="File Icon">
                            <img src="gmbr.png" alt="File Icon">
                            + 5 more
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="pagination">
                <button class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i></button>
                <button class="btn btn-outline-secondary disabled"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pZg1SIos8VTfR4HZTF0FbTfneFnIz0RoU09NcCd43jkhKexiWrnS1KuD+Jz1QoRp" crossorigin="anonymous"></script>
</body>
</html>
