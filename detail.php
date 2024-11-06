<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musa secondhand apparel stock</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
<?php include('navbar.php') ?>
<div class="topbar-view">
    <h3>Apparel Stock</h3>
    <div class="srchDiv">
        <input type="search" placeholder="Search for item here ..">
        <button>Search</button>
    </div>
</div>
<section>
        <div class="main-item-box">
        <?php  
                        if (isset($_POST['btnCard'])) {
                            $product=$_POST['product'];
                            $quantity=$_POST['quantity'];
                            $new_price=$_POST['new_price'];
                            $old_price=$_POST['old_price'];
                            $description=$_POST['description'];
                            $id=$_POST['id'];
                            $image=$_POST['image'];
                        }
                    ?>
           <div class="detail-main">
                <div class="det-img">
                <img src="uploads/<?php echo $image ?>" alt="" class="img">
                </div>
                <div class="det-det">
                    <p><strong><?php echo $product ?></strong><br> <?php echo $description ?></p>
                    <br><br>
                    <div>
                    <div><strong class="txtPrice">Ksh. <?php echo $new_price ?></strong></div>
                        <div><strike><small>Ksh. <?php echo $old_price ?></small></strike></div>
                        <div class="avaiDiv av1">
                            <?php echo $quantity ?> Available
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <form action="detail.php" method="post" class="formBuy">
                        <input type="hidden" name="product" value="<?php echo $product  ?>">
                        <input type="hidden" name="quantity" value="<?php echo $quantity ?>">
                        <input type="hidden" name="description" value="<?php echo $description ?>">
                        <input type="hidden" name="price" value="<?php echo $new_price ?>">
                        <div><strong>Name</strong></div>
                        <div>
                            <input type="text" name="name" placeholder="Enter your Name">
                        </div>
                        <br>
                        <div><strong>Quantity</strong></div>
                        <div><input type="text" placeholder="Enter quantity" name="quantity"></div>
                        <br>
                        <div><strong>Date</strong></div>
                        <div><input type="date" name="date"></div>
                        <input type="submit" value="add" name="btnBuy" class="btnBuy">
                    </form>
                </div>
           </div>
        </div>
    </section>
    <?php
    if (isset($_POST['btnBuy'])) {
        # code...
        $conn=mysqli_connect("localhost","root","","musadb");
        $name=$_POST['name'];
        $product=$_POST['product'];
        $quantity=$_POST['quantity'];
        $date=date('d-m-y');
        $description=$_POST['description'];
        $price=$_POST['price'];

        $sql="INSERT INTO `reports`(`id`, `product`, `description`, `quantity`, `price`, `name`, `date`) VALUES (null,'$product','$description','$quantity','$price','$name','$date')";
        $exec=mysqli_query($conn,$sql);
        if ($exec) {
            # code...
            echo '
                 <section class="blackCOntainer">
                            <div class="popup">
                                <center>
                                    <div><strong>Success !</strong></div>
                                    <div><p>Added successfully</p></div>
                                    <a href="account.php"><button>Done</button></a>
                                    <div></div>
                                </center>
                            </div>
                        </section> 
            ';
        }else{
            echo "sql erro";
        }
    }

    ?>
</body>
</html>