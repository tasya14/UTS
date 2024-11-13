<?php

session_start();

$username = @$_SESSION['username'];
$password = @$_SESSION['password'];

$akses = @$_SESSION["akses"];

require "./config.php";

?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Halaman Dosen</title>
    <script language="JavaScript" type="text/javascript">
        function Hapus() {
            return confirm('Apakah anda yakin ingin menghapus?');
        }
    </script>
    <style>
        body {
            margin-top: 3vh;
            background-color: #4e4ab6;
        }

        .container {
            overflow-y: auto;
            height: 63vh;
        }

        a {
            text-decoration: none;
        }
        
       
    </style>
</head>

<body>
    <div class="text-center text-white" style="font-family:fantasy;">
        <h4>REKAPITULASI NILAI KULIAH</h4><br>
        <h5>SELAMAT DATANG DI HALAMAN DOSEN</h5>
    </div>
    <div class="card card-body m-4 bg-secondary" style="border-radius: 20px;">
        <div class="input-group w-25">
            <a href="halaman_tambah_mhs.php" style="text-decoration: none; margin-left: 1500px; border-radius: 7px;"
                class="btn btn-warning">Tambah Mahasiswa</a>
        </div>
        <?php
        $sql = "select * from user";
        $query = mysqli_query($sambung, $sql);
        ?> 
        <div>
            <div class="container mt-3">
                <table class="table text-center table-hover table-striped" style="font-size: 15px;">
                    <thead class="table-dark">
                        <tr>
                            <th scope="row">Nomer</th>
                            <th scope="row">Mahasiswa</th>
                            <th scope="row">Diskusi (14%)</th>
                            <th scope="row">Praktikum (26%)</th>
                            <th scope="row">Responsi (15%)</th>
                            <th scope="row">UTS (20%)</th>
                            <th scope="row">UAS (25%)</th>
                            <th scope="row">Nilai</th>
                            <th scope="row">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($sambung, "SELECT * FROM user WHERE level = 'mahasiswa'");
                        $i = 1;
                        while ($db_uts_5008 = mysqli_fetch_array($query)) {
                            $total_nilai =
                                ($db_uts_5008['diskusi'] * 0.14) +
                                ($db_uts_5008['praktikum'] * 0.26) +
                                ($db_uts_5008['responsi'] * 0.15) +
                                ($db_uts_5008['uts'] * 0.20) +
                                ($db_uts_5008['uas'] * 0.25);

                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $db_uts_5008["username"] . "</td>";
                            echo "<td>" . $db_uts_5008["diskusi"] . "</td>";
                            echo "<td>" . $db_uts_5008["praktikum"] . "</td>";
                            echo "<td>" . $db_uts_5008["responsi"] . "</td>";
                            echo "<td>" . $db_uts_5008["uts"] . "</td>";
                            echo "<td>" . $db_uts_5008["uas"] . "</td>";
                            echo "<td>" . number_format($total_nilai, 2) . "</td>";
                            echo "<td><a href=./update.php?username=$db_uts_5008[username] >Edit</a>";
                            echo "<a href=./delete.php?username=$db_uts_5008[username] ' onclick='return Hapus()' >Hapus</a></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <a href="logout.php style="text-decoration: none; margin-left: 1000px; border-radius: 7px;" class="btn btn-primary form-control ">Log Out</a>
            </div>
        </div>

    </div>
</body>

</html>