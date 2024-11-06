<link rel="stylesheet" href="../css/global.css">
<?php
if (isset($_POST['btnDelete'])) {
    $conn=mysqli_connect("localhost","root","","musadb");
    $id=$_POST['id'];

    $sql="DELETE FROM `products` WHERE id='$id'";
    $exec=mysqli_query($conn,$sql);

    if ($exec) {
        # code...
        echo '
                <section class="blackCOntainer">
                            <div class="popup">
                                <center>
                                    <div><strong>Success !</strong></div>
                                    <div><p>Deleted successfully</p></div>
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
if (isset($_POST['btnRemove'])) {
    $conn=mysqli_connect("localhost","root","","musadb");
    $id=$_POST['id'];

    $sql="DELETE FROM `reports` WHERE id='$id'";
    $exec=mysqli_query($conn,$sql);

    if ($exec) {
        # code...
        echo '
                <section class="blackCOntainer">
                            <div class="popup">
                                <center>
                                    <div><strong>Success !</strong></div>
                                    <div><p>Deleted successfully</p></div>
                                    <a href="account.php"><button>Done</button></a>
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