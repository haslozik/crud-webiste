<?php

    $id = 0;

    $area = '';
    $date = '';
    $needDate = '';
    $price = '';
    $total = '';
    $materials = '';
    
    $update = false;

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

        header('location: index.php');
    }

    //delete
    if(isset($_GET['delete'])) {
        $requestNo = $_GET['delete'];
        $conn->query("DELETE FROM todo WHERE requestNo=$requestNo") 
        or die($conn->error);

        header('location: index.php');
    }

    //edit
    if(isset($_GET['edit'])) {
        $requestNo = $_GET['edit'];
        $update = true;

        $result = $conn->query("SELECT requestNo,area,date,needDate,price,total,materials FROM toDO WHERE requestNo = $requestNo")
        or die($conn->error);
        if(count(array($result))==1) {
            $row = $result->fetch_array();
            $area = $row['area'];
            $date = $row['date'];
            $needDate = $row['needDate'];
            $price = $row['price'];
            $total = $row['total'];
            $materials = $row['materials'];
        }
    }

    if(isset($_POST['update'])) {
        $requestNo = $_POST['id'];
        $area = $_POST['area'];
        $date = $_POST['date'];
        $needDate = $_POST['needDate'];
        $price = $_POST['price'];
        $total = $_POST['total'];
        $materials = $_POST['materials'];

        $conn->query("UPDATE todo SET area='$area', date='$date', needDate='$needDate',
        price='$price', total='$total', materials='$materials' WHERE requestNo='$requestNo'") 
        or die($conn->error);

        header('location: index.php');
    }

?>
