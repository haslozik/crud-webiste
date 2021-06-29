<?php
    
    if(isset($_POST['submit'])) {
        $area = $_POST['area'];
        $date = $_POST['date'];
        $needDate = $_POST['needDate'];
        $price = $_POST['price'];
        $total = $_POST['total'];
        $materials = $_POST['materials'];

        $sql = "INSERT INTO filmy (area, date, needDate, price, total, materials) 
        VALUES ('".$area."', '".$date."', '".$needDate."', '".$price."', '".$total."', '".$materials."')";
    
        $result = mysqli_query($conn,$sql);

        if($result) {
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "Error";
        }
    }

    mysqli_close($conn);

?>