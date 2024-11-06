<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beuty Spa Login </title>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    
    <div class="container">
        <form class="form-div" action="admin-login.php" method="POST">
            <div class="input-div">
                <h2>Administrator Account</h2>
            </div>
            <div class="input-div">
                <input type="text" name="username" required="true" placeholder="Enter Username" class="input">
            </div>
            <div class="input-div">
                <input type="password" name="password" id="pwd" required="true"  placeholder="Enter password" class="input">
            </div>
            <div class="input-div">
                <input type="checkbox" id="check" onclick="showPwd()"> <small>Show/Hide</small>
            </div>
            <div class="input-div">
                <button class="btnLogin" name="btnLogin">Login</button>
            </div>
            <div class="input-div">
             <small>You are not admin ? <a href="index.php">Login User</a></small>
               
            </div>

</form>
    </div>
</body>
</html>
<?php
if (isset($_POST['btnLogin'])) {
    // $conn=mysqli_connect("localhost","root","","beauty");
 
    $username=$_POST['username'];
    $passowrd=$_POST['password'];
 
 
    if($username == 'admin' && $passowrd=='admin123'){
       
       $_SESSION["username"]=$username;
         header('location:admin.php');
    }else{
     echo '
     <section>
     <div class="darkJacket"></div>
     <div class="pop-container">
         <div class="pop-up">
             <center>
                 <div><strong>Failed</strong></div>
                 <br>
                 <div>
                     <small>Incorect username or password !</small>
                 </div>
                 <div><a href="admin-login.php"><button class="btnOK">Ok</button></a></div>
             </center>
         </div>
     </div>
 </section>
     ';
    }
 
 
 }



?>

<script src="../js/app.js"></script>