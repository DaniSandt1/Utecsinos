<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" type="text/css" href="./css/signup.css"/>
    <script src='main.js'></script>
</head>
<body>

<?php 

session_start();

    include("connection.php");
    include("function.php");

    if(isset($_POST['login'])){

        $query="SELECT * FROM `admin` WHERE name='$_POST[Admin_username]'  AND  password='$_POST[Admin_password]'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){

        // session_start();//
         $_SESSION['username']=$_POST['Admin_username'];
         header("location:adminpanel.php");

        }
        else{
          echo '<script type="text/javascript">alert("incorrect_pass!!!")</script>';
        }
        
        

    }
   
    
?>


<div class="registration_form">
    <div class="title">
     Admin Sign-In
    </div>

    <form action="#" method="POST">
      <div class="form_wrap">
        
        <div class="input_wrap">
          <label for="password">username</label>
          <input type="text" id="uname" name="Admin_username" placeholder="username" required>
        </div>
        <div class="input_wrap">
          <label for="Confirm_password">Password</label>
          <input type="password" id="password" name="Admin_password" placeholder="password" required>
        </div>
       
        <div class="input_wrap">
          <input type="submit" value="Login" class="submit_btn" name="login" >
        </div>
        
      </div>
    </form>
  </div>
</div>
 



    
</body>
</html>