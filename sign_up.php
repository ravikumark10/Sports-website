<?php
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];
    $conn= new mysqli('localhost','root','','sports');
    if($conn->connect_error){
        die('connection failed: '.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into signup(firstName,lastName,email,password,confirmPassword)
        values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$firstName,$lastName,$email,$password,$confirmPassword);
        $stmt->execute();
        echo "registration successfully.....";
        header('Location:login.html');
        $stmt->close();
        $conn->close();
    }
?>
