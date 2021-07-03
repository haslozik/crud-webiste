<?php

    $area = '';
    $date = '';
    $needDate = '';
    $price = '';
    $total = '';
    $materials = '';

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

        $_SESSION['message_type'] = "added";
        $_SESSION['message'] = "Record has been added";

        header('Location: index.php');
    }

    //delete
    if(isset($_GET['delete'])) {
        $requestNo = $_GET['delete'];
        $conn->query("DELETE FROM todo WHERE requestNo=$requestNo") 
        or die($conn->error);

        $_SESSION['message_type'] = "deleted";
        $_SESSION['message'] = "Record has been deleted";

        header('Location: index.php');
    }

    //edit
    if(isset($_GET['edit'])) {
        $requestNo = $_GET['edit'];
        $result = $conn->query("SELECT requestNo,area,date,needDate,price,total,materials FROM toDO WHERE requestNo = $id")
        or die($conn->error);

        if(count($result)==1) {
            $row = $result->fetch_array();
            $area = $row['area'];
            $date = $row['date'];
            $needDate = $row['needDate'];
            $price = $row['price'];
            $total = $row['total'];
            $materials = $row['materials'];
        }
    }

?>
