<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/global.css">
    <style>
        body{
            color:gray;
        }
    </style>
</head>
<body>
    <div class="admin-main">
        <div class="container-admin">
           <?php include('admin-nav.php')  ?>
       </div>
       <div class="container-box">
            <div>
            <h3>PRODUCTS</h3> <br>
            <hr>
            <br>
            <div>
                <form action="products.php" method='POST' class="addForm" enctype="multipart/form-data">
                    <div class="addDiv">
                        <div>
                            <strong>Product :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter product" name='product'>
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <strong>Quantity :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter quantity" name='quantity'>
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <strong>Description :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter description" name='description'>
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <strong>Old Price :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter price" name='old_price'>
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <strong>New Price :</strong>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter price" name='new_price'>
                        </div>
                    </div>
                    <div class="addDiv">
                        <div>
                            <strong>Image :</strong>
                        </div>
                        <div>
                            <input type="file" name='image'>
                        </div>
                    </div>
                    <div class="addDi">
                        <div>
                            <button name='btnsubmit' class="btnAdd">Add New</button>
                        </div>
                    </div>
                </form>
                <table class="table1">
                    <thead>
                        <th>PRODUCT</th>
                        <th>QUANTITY</th>
                        <th>PRICE</th>
                        <th>DESCRIPTION</th>
                        <th>IMAGE</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </thead>
                    <tbody>
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
                                    $description=$row['description'];
                                    $quantity=$row['quantity'];
                                    $image=$row['image'];
                        ?>
                        <tr>
                            <td><?php echo $product ?></td>
                            <td><?php echo $quantity ?></td>
                            <td>Ksh.<?php echo $new_price ?></td>
                            <td><?php echo $description ?></td>
                            <td><div class="imgDivTable"><img src="uploads/<?php echo  $image?>" alt="" class="img"></div></td>
                            <td>
                                <form action="editproduct.php" method="post">
                                    <input type="hidden" name="product" value="<?php echo $product ?>">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <input type="hidden" name="quantity" value="<?php echo $quantity ?>">
                                    <input type="hidden" name="price" value="<?php echo $new_price ?>">
                                    <input type="hidden" name="description" value="<?php echo $description ?>">
                                    <button name="btnEdit" class="btnAdd">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="del.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <button name="btnDelete" class="btnAdd btnDel">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            </div>
       </div>
 
    </div>
    <?php
    if (isset($_POST['btnsubmit'])) {
        $conn=mysqli_connect("localhost","root","","musadb");
        $product=$_POST['product'];
        $quantity=$_POST['quantity'];
        $old_price=$_POST['old_price'];
        $new_price=$_POST['new_price'];
        $description=$_POST['description'];
        
        $img_name=$_FILES['image']['name'];
    $img_size=$_FILES['image']['size'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $error=$_FILES['image']['error'];

    if ($error===0) {
        if ($img_size > 125000) {
            $em="too large file size";
        }else{
            $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc=strtolower($img_ex);

            $allowed_ext=array("jpg","jpeg","png");

            if (in_array($img_ex_lc,$allowed_ext)) {
                $my_new_img_name=uniqid("IMG",true).'.'.$img_ex;
                $img_upload_path='uploads/'.$my_new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);
                
                $sql_insert="INSERT INTO `products`(`id`, `product`, `quantity`, `description`, `new price`, `old price`,`image`) VALUES (null,'$product','$quantity','$description','$new_price','$old_price','$my_new_img_name')";


                $exec=mysqli_query($conn,$sql_insert);
            
                if ($exec) {
                    echo '
                          <section class="blackCOntainer">
                            <div class="popup">
                                <center>
                                    <div><strong>Success !</strong></div>
                                    <div><p>Added successfully</p></div>
                                    <a href="products.php"><button>Done</button></a>
                                    <div></div>
                                </center>
                            </div>
                        </section>
                    ';
                }else{
                    echo "failed";
                }
            }else{
                $em="file type not allowed";
            }
        }


    }
     
       
    }

    ?>
</body>
</html>