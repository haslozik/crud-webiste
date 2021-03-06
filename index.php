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
    <!--menu-->
    <div class="menu">
        <div class="menu__top">
            <div class="menu__blocksIcon">
                <i class="fas fa-th"></i>
            </div>
            <div class="menu__middleTop">
                <h1>CRUD Simple UI</h1>
            </div>
            <div class="menu__rightPanel">
                <div class="menu__name">
                    <h4>Wojciech Perliński</h4>
                </div>
                <div class="menu__panelIcons">
                    <div class="menu__icon--1"><i class="fas fa-bell"></i></div>
                    <div class="menu__icon--2"><i class="fas fa-envelope"></i></div>
                    <div class="menu__icon--3"><i class="fas fa-cog"></i></div>
                </div>
            </div>
        </div>
        <div class="menu__bottom">
            <a href="#addRecord" id="menu__add"><div><h4>Add +</h4></div></a>
        </div>
    </div>

    <?php require_once 'process.php'; ?>
    <!--conent-->
    <div id="content">
        <div id="content__container" class="content-topEl">
            <div class="content__info">Request No.</div>
            <div class="content__info">Area</div>
            <div class="content__info">Date</div>
            <div class="content__info">Need Date</div>
            <div class="content__info">Price</div>
            <div class="content__info">Total</div>
            <div class="content__info">Materials</div>
            <div class="content__info">Actions</div>
        </div>
        <?php

            $conn = mysqli_connect('localhost','root','','crud-website');
            $sql = "SELECT requestNo,area,date,needDate,price,total,materials FROM toDO";
            $result = mysqli_query($conn,$sql);
            $queryResults = mysqli_num_rows($result);
            
                if($queryResults > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>

                            <div id="content__container">
                                <div class="content__info" id="content__info--id"><?= $row['requestNo']."."; ?></div>
                                <div class="content__info"><?= $row['area']; ?></div>
                                <div class="content__info"><?= $row['date']; ?></div>
                                <div class="content__info"><?= $row['needDate']; ?></div>
                                <div class="content__info"><?= $row['price']."$"; ?></div>
                                <div class="content__info"><?= $row['total']."$"; ?></div>
                                <div class="content__info"><?= $row['materials']."<h6>Material<br>requested</h6>"; ?></div>
                                <div class="content__info">
                                    <ul>
                                        <a href="index.php?edit=<?php echo $row['requestNo']; ?>" onclick="hide()" id="edit">
                                            <li class="content_list--edit">Edit</li>
                                        </a>

                                        <a href="process.php?delete=<?php echo $row['requestNo']; ?>">
                                            <li class="content_list--delete" id="content_list--delete">Delete</li>
                                        </a>
                                    </ul>
                                </div>
                            </div>

                        <?php
                    }
                }
                mysqli_close($conn);
        ?>
    </div>
    <!--addRecord section-->

    <div id="addRecord">
        <div class="addRecord__container">
        <h1>Add to list</h1>
            <form action="process.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="addRecord__inputContainer">
                    <label for="area">Area</label>
                    <input type="text" name="area" value="<?php echo $area; ?>" placeholder="Enter the area">
                </div>
                <div class="addRecord__inputContainer">
                    <label for="date">Date</label>
                    <input type="date" name="date" value="<?php echo $date; ?>" >
                </div>
                <div class="addRecord__inputContainer">
                    <label for="date">Need Date</label>
                    <input type="date" name="needDate" value="<?php echo $needDate; ?>" >
                </div>
                <div class="addRecord__inputContainer">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="<?php echo $price; ?>" placeholder="Enter the price">
                </div>
                <div class="addRecord__inputContainer">
                    <label for="total">Total Price</label>
                    <input type="number" name="total" value="<?php echo $total; ?>" placeholder="Enter the total price">
                </div>
                <div class="addRecord__inputContainer">
                    <label for="materials">Materials</label>
                    <input type="text" name="materials" value="<?php echo $materials; ?>" placeholder="Enter the number of materials">
                </div>

                    <?php if($update == true): ?>
                        <input type="submit" name="update" id="addBtn" value="Update">
                    <?php else: ?>
                    <input type="submit" name="submit" id="addBtn" value="Add">
                    <?php endif; ?>

            </form>
        </div>
    </div>

<script src="app.js"></script>
</body>
</html>