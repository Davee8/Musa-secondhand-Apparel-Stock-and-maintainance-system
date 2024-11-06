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
            <h3>Users</h3> <br>
            <hr>
            <br>
            <div>
                <table class="table1">
                    <thead>
                        <th>Fullname</th>
                        <th>PHONE</th>
                        <th>EMAIL</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                            $conn=mysqli_connect("localhost","root","","musadb");
                            $sql="SELECT * FROM `users` WHERE 1";
                            $exec=mysqli_query($conn,$sql);

                            $count=mysqli_num_rows($exec);

                            if ($count==0) {
                                echo '';
                            }else{
                                while ($row=mysqli_fetch_array($exec)) {
                                    $id=$row['id'];
                                    $name=$row['name'];
                                    $phone=$row['phone'];
                                    $email=$row['email'];
                             
                        ?>
                        <tr>
                            <td><?php echo $name ?></td>
                            <td><?php echo $phone ?></td>
                            <td><?php echo $email ?></td>
                            <td><button>Edit</button></td>
                            <td><button>Delete</button></td>
                        </tr>
                        <?php }}?>
                    </tbody>
                </table>
            </div>
            </div>
       </div>
    </div>
</body>
</html>