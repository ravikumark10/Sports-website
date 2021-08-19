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
            #upt{
                margin: auto;
                position: relative;
                right: 30px;
            }
            #upt1{
                border: 5px solid gray;
                border-radius: 10px;
            }
            #upt2{
                position: relative;
                left: 250px;
                bottom: 63px;
            }
        </style>
        <header>
            <a class="back" href="staff.php">Go back</a>
            <h1>Sports Academic</h1>
            <br>
            <p>Aspire to inspire, before we expire!</p>
        </header>
        <section id="methodstaff">
            <h2>Delete Staff Details</h2>
            <form id="upt" action="" method="POST">
                <input id="upt1" type="text" placeholder="Enter Id for search" name="id" required>
                <input id="upt2" type="submit" value="Search" name="Search">
            </form>
            <?php
               $conn= new mysqli('localhost','root','','sports');
               $flag=0;
               if(isset($_POST['Search'])){
                   $id=$_POST['id'];
                   $query="select * from staff where id='$id'";
                   $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_array($result)){
                            $flag=1;
                            ?>
                            <form class="staff1"  action="" method="POST">
                                <label>Id</label>
                                <input type="number" name="id" value="<?php echo $row['id']?>">
                                    <label>Name</label>
                                    <input type="text" name="name" value="<?php echo $row['name']?>">
                                    <label>Age</label>
                                    <input  type="number" name="age" value="<?php echo $row['age']?>">
                                    <label>Email</label>
                                    <input type="email"  name="email" value="<?php echo $row['email']?>">
                                    <label>Qualification</label>
                                    <input  type="text"  name="qualify" value="<?php echo $row['qualify']?>">
                                    <label>Specialization</label>
                                    <input  type="text"  name="special" value="<?php echo $row['special']?>">
                                    <label>Address</label>
                                    <input  type="text"  name="address" value="<?php echo $row['address']?>">
                                    <label>Contact</label>
                                    <input  type="number" name="contact" value="<?php echo $row['contact']?>">
                                    <input type="submit" value="Delete" name="Delete">
                                </form>
                                <?php
                        }
                        if($flag==0){
                            ?>
                            <h2>No records found</h2>
                            <?php
                        }
               }
            ?>
             </section>
        <footer>
            <h4>Developed for sports students</h4>
            <h4>To make opportunities and guidelines</h4>
            <p>All rights reserved &copy; 2021</p>
        </footer>
    </body>
</html>
<?php
    $conn= new mysqli('localhost','root','','sports');
    if(isset($_POST['Delete'])){
        $query="delete from staff where id='$_POST[id]' ";
        $result=mysqli_query($conn,$query);

        if($result){
            header('Location:staff.php');
        }
        else{
            echo '<script> alert("No") </script>';
        }

    }
?>