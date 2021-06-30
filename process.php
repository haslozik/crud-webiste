<?php
    //add
    $conn = mysqli_connect('localhost','root','','crud-website') or die($conn);

    if(isset($_POST['submit'])) {
        $area = $_POST['area'];
        $date = $_POST['date'];
        $needDate = $_POST['needDate'];
        $price = $_POST['price'];
        $total = $_POST['total'];
        $materials = $_POST['materials'];

        $conn->query("INSERT INTO todo (area, date, needDate, price, total, materials) VALUES ('".$area."', '".$date."', '".$needDate."', '".$price."', '".$total."', '".$materials."')") 
        or die($conn->error);
    }

    //delete
    if(isset($_GET['delete'])) {
        $requestNo = $_GET['delete'];
        $conn->query("DELETE FROM todo WHERE requestNo=$requestNo") 
        or die($conn->error);
    }

?>