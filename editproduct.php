<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <div class="admin-main">
        <div class="container-admin">
           <?php include('admin-nav.php')  ?>
       </div>
       <div class="container-box">
            <div>
            <h3>EDIT PRODUCT</h3> <br>
            <hr>
            <br>
            <div>
                <form action="editproduct.php" method="post" class="addForm">
                    <?php  
                        if (isset($_POST['btnEdit'])) {
                            $product=$_POST['product'];
                            $quantity=$_POST['quantity'];
                            $price=$_POST['price'];
                            $description=$_POST['description'];
                            $id=$_POST['id'];
                        }
                    ?>
                    <div class="addDiv">
                        <div>
                            <strong>Product :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter product" value="<?php echo $product ?>" name="product">
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <strong>Quantity :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter quantity" name="quantity" value="<?php echo $quantity ?>">
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <strong>Description :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter description" name="description" value="<?php echo $description ?>">
                            <input type="hidden" placeholder="Enter description" name="id" value="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <strong>Price :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter price" name="price" value="<?php echo $price ?>">
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <button name="btnUpdate">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
       </div>
    </div>
    <?php
      $conn=mysqli_connect("localhost","root","","musadb");
      if (isset($_POST['btnUpdate'])) {
        $product=$_POST['product'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $id=$_POST['id'];
        $description=$_POST['description'];

        $sql="UPDATE `products` SET `product`='$product',`quantity`='$quantity',`description`='$description',`new price`='$price' WHERE id='$id'";
        $exec=mysqli_query($conn,$sql);

        if ($exec) {
            echo '
            
             <section class="blackCOntainer">
                            <div class="popup">
                                <center>
                                    <div><strong>Success !</strong></div>
                                    <div><p>Updated successfully</p></div>
                                    <a href="products.php"><button>Done</button></a>
                                    <div></div>
                                </center>
                            </div>
                        </section>
            ';
        }else{
            echo 'sql error';
        }
    }

    ?>
</body>
</html>