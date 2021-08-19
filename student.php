<?php
    $conn= new mysqli('localhost','root','','sports');
    $query="select * from sportsreg";
    $result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Student details</title>
        <link rel="stylesheet" href="homestyle.css">
    </head>
    <body>
        <style>
            table{
                margin-left: auto; 
                margin-right: auto;
                border-collapse: collapse;
                position: relative;
                top:200px;
                font-size:20px;
            }
            table th,td{
                text-align: center;
                border: 3px solid orange;
                padding: 10px 15px;
            }
            table th{
                color:yellow;
            }
            h2{
                position: relative;
                top:100px;
            }
        </style>
        <header>
        <a class="back" href="adminhome.php">Go back</a>
            <h1>Sports Academic</h1>
            <br>
            <p>Aspire to inspire, before we expire!</p>
        </header>
        <section id="student">
            <h2>Sports Club Student Details</h2>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Profession</th>
                    <th>Father's Name</th>
                    <th>Club</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Contact</th>
                </tr>
                    <?php
                    while($rows=mysqli_fetch_assoc($result)){
                        ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['firstName']." ".$rows['lastName'] ?></td>
                        <td><?php echo $rows['age'] ?></td>
                        <td><?php echo $rows['profession'] ?></td>
                        <td><?php echo $rows['fatherName'] ?></td>
                        <td><?php echo $rows['club'] ?></td>
                        <td><?php echo $rows['city'] ?></td>
                        <td><?php echo $rows['state'] ?></td>
                        <td><?php echo $rows['address'] ?></td>
                        <td><?php echo $rows['contact'] ?></td>
                    </tr>
                        <?php
                    }
                    ?>    
            </table>

        </section>
        <footer>
            <h4>Developed for sports students</h4>
            <h4>To make opportunities and guidelines</h4>
            <p>All rights reserved &copy; 2021</p>
        </footer>
    </body>
</html>