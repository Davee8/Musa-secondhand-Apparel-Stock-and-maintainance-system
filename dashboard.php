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
                            $conn=mysqli_connect("localhost","root","","musadb");
                            $sql="SELECT * FROM `products` WHERE 1";
                            $exec=mysqli_query($conn,$sql);

                            $count=mysqli_num_rows($exec);

                            if ($count==0) {
                                echo '';
                            }else{
                                while ($row=mysqli_fetch_array($exec)) {
                                    $id=$row['id'];
                                    $product=$row['product'];
                                    $new_price=$row['new price'];
                                    $old_price=$row['old price'];
                                    $description=$row['description'];
                                    $quantity=$row['quantity'];
                                    $image=$row['image'];
                        ?>
            <form action="detail.php" method="post">
                                    <input type="hidden" name="product" value="<?php echo $product ?>">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <input type="hidden" name="quantity" value="<?php echo $quantity ?>">
                                    <input type="hidden" name="new_price" value="<?php echo $new_price ?>">
                                    <input type="hidden" name="old_price" value="<?php echo $old_price ?>">
                                    <input type="hidden" name="description" value="<?php echo $description ?>">
                                    <input type="hidden" name="image" value="<?php echo $image ?>">
                <button class="card-item" name="btnCard">
                    <div class="imgDiv">
                    <img src="uploads/<?php echo $image ?>" alt="" class="img">
                    </div>
                    <div class="pdd">
                        <small><strong><?php echo $product ?></strong> <?php echo $description ?></small>
                        <br>
                        <div><strong class="txtPrice">Ksh. <?php echo $new_price ?></strong></div>
                        <div><strike><small>Ksh. <?php echo $old_price ?></small></strike></div>
                        <div class="avaiDiv">
                            <?php echo $quantity  ?> Available
                        </div>
                    </div>
                </button>
            </form>
            <?php }} ?>
        </div>
    </section>
</body>
</html>