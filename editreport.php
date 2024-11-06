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
            <h3>EDIT REPORT</h3> <br>
            <hr>
            <br>
            <div>
                <form action="editreport.php" method="POST" class="addForm">
                    <?php
                        if (isset($_POST['btnEdit'])) {
                            # code...
                                    $id=$_POST['id'];
                                    $product=$_POST['product'];
                                    $new_price=$_POST['price'];
                                    $quantity=$_POST['quantity'];
                                    $date=$_POST['date'];
                                    $name=$_POST['name'];
                        }
                    ?>
                    <div class="addDiv">
                        <div>
                            <strong>Name :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter name" value="<?php echo $name ?>" name="name">
                            <input type="text" placeholder="Enter name" value="<?php echo $id ?>" name="id">
                        </div>
                    </div>
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
                            <input type="text" placeholder="Enter quantity" value="<?php echo $quantity ?>" name="quantity">
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <strong>Price :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter price" value="<?php echo $new_price ?>" name="price">
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <button name="btnUpdate" name="btnUpdate">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
       </div>
    </div>
    <?php
    if (isset($_POST['btnUpdate'])) {
        # code...
        $conn=mysqli_connect("localhost","root","","musadb");
        $id=$_POST['id'];
        $product=$_POST['product'];
        $new_price=$_POST['price'];
        $quantity=$_POST['quantity'];
        $name=$_POST['name'];
        $sql="UPDATE `reports` SET `product`='$product',`quantity`='$quantity',`price`='$new_price',`name`='$name' WHERE id='$id'";
        $exec=mysqli_query($conn,$sql);

        if ($exec) {
            echo '
                         <section class="blackCOntainer">
                            <div class="popup">
                                <center>
                                    <div><strong>Success !</strong></div>
                                    <div><p>Update successfully</p></div>
                                    <a href="admin.php"><button>Done</button></a>
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