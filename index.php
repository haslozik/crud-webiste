<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Website</title>

    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/a821291b86.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <div class="menu">
        <div class="menu__top">
            <div class="menu__blocksIcon">
                <i class="fas fa-th"></i>
            </div>
            <div class="menu__middleTop">
                <h1>CRUD Website UI</h1>
            </div>
            <div class="menu__rightPanel">
                <div class="menu__name">
                    <h4>Wojciech Perliński</h4>
                </div>
                <div class="menu__panelIcons">
                    <div class="menu__icon"><i class="fas fa-bell"></i></div>
                    <div class="menu__icon"><i class="fas fa-envelope"></i></div>
                    <div class="menu__icon"><i class="fas fa-cog"></i></div>
                </div>
            </div>
        </div>
        <div class="menu__bottom">
            <img src="img/search.png"><input type="text" class="menu__searchInput" placeholder="Search">
        </div>
    </div>

    <div id="content">
       
        <?php
            $conn = mysqli_connect('localhost','root','','crud-website');
            $sql = "SELECT requestNo,area,date,needDate,price,total,materials FROM toDO";
            $result = mysqli_query($conn,$sql);
            $queryResults = mysqli_num_rows($result);
            
                if($queryResults > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>

                            <div class="content__container">
                                <div class="content__checkbox">
                                    <div class="content__checkElement"></div>
                                </div>
                                <div class="content__info"><?php $row['requestNo']; ?></div>
                                <div class="content__info"><?php $row['area']; ?></div>
                                <div class="content__info"><?php $row['date']; ?></div>
                                <div class="content__info"><?php $row['needDate']; ?></div>
                                <div class="content__info"><?php $row['price']; ?></div>
                                <div class="content__info"><?php $row['total']; ?></div>
                                <div class="content__info"><?php $row['materials']; ?></div>
                            </div>

                        <?php
                    }
                }
        ?>
    </div>

</body>
</html>