<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Staff details</title>
        <link rel="stylesheet" href="homestyle.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <style>
            table{
                margin-left: auto; 
                margin-right: auto;
                border-collapse: collapse;
            }
            table th,td{
                text-align: center;
                border: 3px solid orange;
                padding: 10px 15px;
            }
        </style>
        <header>
            <a class="back" href="staff.php">Go back</a>
            <h1>Sports Academic</h1>
            <br>
            <p>Aspire to inspire, before we expire!</p>
        </header>
        <section id="methodstaff">
            <h2>Add Staff</h2>
            <form class="staff1"  action="" method="POST">
                <label>Name</label>
                <input type="text" placeholder="" name="name" required>
                <label>Age</label>
                <input  type="number" placeholder="" name="age" required>
                <label>Email</label>
                <input type="email" placeholder="" name="email" required>
                <label>Qualification</label>
                <input  type="text" placeholder="" name="qualify" required>
                <label>Specialization</label>
                <input  type="text" placeholder="" name="special" required>
                <label>Address</label>
                <input  type="text" placeholder="" name="address" required>
                <label>Contact</label>
                <input  type="number" placeholder="" name="contact" required>
                <input type="submit" value="Add" name="Add">
            </form>
        </section>
        <footer>
            <h4>Developed for sports students</h4>
            <h4>To make opportunities and guidelines</h4>
            <p>All rights reserved &copy; 2021</p>
        </footer>
    </body>
</html>

<?php
if(isset($_POST['Add'])){
        $name=$_POST['name'];
        $age=$_POST['age'];
        $email=$_POST['email'];
        $qualify=$_POST['qualify'];
        $special=$_POST['special'];
        $address=$_POST['address'];
        $contact=$_POST['contact'];


        $conn= new mysqli('localhost','root','','sports');
        if($conn->connect_error){
            die('connection failed: '.$conn->connect_error);
        }
        else{
            $stmt=$conn->prepare("insert into staff(name,age,email,qualify,special,address,contact)
            values(?,?,?,?,?,?,?)");
            $stmt->bind_param("sissssi",$name,$age,$email,$qualify,$special,$address,$contact);
            $stmt->execute();
            echo "registration successfully.....";
            header('Location:staff.php');
            $stmt->close();
            $conn->close();
        }
    }
?>
