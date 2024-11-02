<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    $connection = new mysqli($servername, $username, $password, $database);



    $ISBN = "";
    $judul = "";
    $harga = "";
    $penulis = "";
    $tahun = "";
    $errorMessage = "";
    $successMessage = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ISBN = $_POST["ISBN"];
        $judul = $_POST["judul"];
        $harga = $_POST["harga"];
        $penulis = $_POST["penulis"];
        $tahun = $_POST["tahun"];

        do{
            if(empty($ISBN) || empty($judul) || empty($harga) || empty($penulis) || empty($tahun)){
                $errorMessage = "Lengkapi Data Buku";
                break;
            }
            
            $sql =  "INSERT INTO buku (ISBN, judul, harga, penulis, tahun)" . 
                    "VALUES('$ISBN', '$judul','$harga','$penulis','$tahun')";
            $result = $connection->query($sql);

            if(!$result){
                die("invalid query: " . $connection->error);
                break;
            }
        
            $ISBN = "";
            $judul = "";
            $harga = "";
            $penulis = "";
            $tahun = "";

            $successMessage = "Data Berhasil Ditambahkan";

            header("location: /pro/main.php");
            exit;
            
        }while(false);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="main">
        <h1>Tambah Buku</h1>

        <?php
        if(!empty($errorMessage)){
            echo "
            <div class = 'alert alert-warning alert-dismissible fade show' role-'alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>
        <form action="" method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ISBN</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ISBN" value="<?php  echo $ISBN; ?>">
                </div>     
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="judul" value="<?php  echo $judul; ?>">
                </div>     
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Harga</label>
                <div class="col-sm-6">  
                    <input type="text" class="form-control" name="harga" value="<?php  echo $harga; ?>">
                </div>     
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Penulis</label>
                <div class="col-sm-6">  
                    <input type="text" class="form-control" name="penulis" value="<?php  echo $penulis; ?>">
                </div>     
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tahun</label>
                <div class="col-sm-6">  
                    <input type="text" class="form-control" name="tahun" value="<?php  echo $tahun; ?>">
                </div>     
            </div>

            <?php
            if(!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissable fade show' role = 'alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/pro/main.php" class="btn btn-outline-primary" role="button">Batal</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

