<?php
if(isset($_GET["ISBN"])){
    $ISBN = $_GET["ISBN"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM buku WHERE `buku`.`ISBN` = '$ISBN'";
    $connection->query($sql);
}

header("location: /pro/main.php");
exit;
?>