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
            <h3>REPORTS</h3> <br>
           <a href="pdf.php"> <button>Generate Report</button></a>
            <hr>
            <br>
            <div>
                <table class="table1">
                    <thead>
                        <th>NAME</th>
                        <th>PRODUCT</th>
                        <th>QUANTITY</th>
                        <th>PRICE</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                            $conn=mysqli_connect("localhost","root","","musadb");
                            $sql="SELECT * FROM `reports` WHERE 1";
                            $exec=mysqli_query($conn,$sql);
                            
                            $sql1="SELECT *,SUM(price) AS tot FROM `reports` WHERE 1";
                            $exec1=mysqli_query($conn,$sql1);
                            $fetch=mysqli_fetch_array($exec1);
                            
                            $total= $fetch['tot'];

                            $count=mysqli_num_rows($exec);

                            if ($count==0) {
                                echo '';
                            }else{
                                while ($row=mysqli_fetch_array($exec)) {
                                    $id=$row['id'];
                                    $product=$row['product'];
                                    $new_price=$row['price'];
                                    $description=$row['description'];
                                    $quantity=$row['quantity'];
                                    $date=$row['date'];
                                    $name=$row['name'];
                        ?>
                        <tr>
                            <td><?php echo $name ?></td>
                            <td><?php echo $product ?></td>
                            <td><?php echo $quantity ?></td>
                            <td>Ksh. <?php echo $new_price  ?></td>
                            <td>
                                <form action="editreport.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <input type="hidden" name="product" value="<?php echo $product ?>">
                                    <input type="hidden" name="price" value="<?php echo $new_price ?>">
                                    <input type="hidden" name="quantity" value="<?php echo $quantity ?>">
                                    <input type="hidden" name="date" value="<?php echo $date ?>">
                                    <input type="hidden" name="name" value="<?php echo $name ?>">
                                    <button name="btnEdit">Edit</button>
                                </form>
                            </td>
                            <td><button>Delete</button></td>
                        </tr>
                        <?php }}?>
                      
                        <tr>
                            <td></td>
                            <td></td>
                            <td><strong>TOTAL</strong></td>
                            <td><strong>KSh.<?php echo $total ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
       </div>
    </div>
</body>
</html>