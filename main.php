<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="main">
        <h2>Daftar Buku</h2>
        <a href="/pro/add.php" class="btn btn-primary" role="button">Add Book</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Harga</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "project";

                $connection = new mysqli($servername, $username, $password, $database);

                if($connection->connect_error){
                    die("connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM buku ";
                $result = $connection->query($sql);

                if(!$result){
                    die("invalid query: " . $connection->error);
                }

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[ISBN]</td>
                        <td>$row[judul]</td>
                        <td>$row[harga]</td>
                        <td>$row[penulis]</td>
                        <td>$row[tahun]</td>
                        <td>
                            <a href='/pro/edit.php?ISBN=$row[ISBN]' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='/pro/delete.php?ISBN=$row[ISBN]' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>      
            </tbody>
        </table>
    </div>
</body>
</html>
