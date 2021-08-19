<?php
   session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="login1" class="login">
            <form action="login.php" method="POST">
                <p style="color:red;">Invalid username or password</p>
                <label>Email</label>
                <input id="email" type="email" placeholder="" name="email" required>
                <label>Password</label>
                <input id="pass" type="password" placeholder="" name="password" required>
                <input id="s1" type="submit" value="Login" name="Login">
            </form>
            <p>Not have an account?<a href="sign_up.php">Sign up</a></p>
            <a id="a1" href="adminlogin.html">Login as admin</a>
        </div>
    </body>
    
    <script type="text/javascript">
    </script>               
</html>
<?php
    $email=$_POST['email'];
    $password=$_POST['password'];
    $conn= new mysqli('localhost','root','','sports');
    $_SESSION['user']=$email;
    if($conn->connect_error){
        die('connection failed: '.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("select * from signup where email= ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows>0){
            $data=$stmt_result->fetch_assoc();
            if($data['password']===$password){
                echo " logined successfully...";
                header('Location:home.php');
            }
            else{
                echo "Invalid username or password";
                ?>
                <script>
                    email.style.border="3px solid red";
                    pass.style.border="3px solid red";
                </script>
                <?php
            }
        }
        else{
            echo "Ivalid username or password";
            ?>
                <script>
                    email.style.border="3px solid red";
                    pass.style.border="3px solid red";
                </script>
                <?php
        }
        $stmt->close();
        $conn->close();
    }
?>
