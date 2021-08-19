<?php
   session_start();
   $conn= new mysqli('localhost','root','','sports');
   $user=$_SESSION['user'];
   $query="select * from signup where email='$user'";
   $result=mysqli_query($conn,$query);
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="homestyle.css">
    </head>
    <body>
        <style>
             #icon img{
                position: relative;
                left: 600px;
            }
            #icon h4{
                position: relative;
                left: 700px;
                bottom: 53px;
            }
        </style>
        <header>
            <a class="back" href="login.html">Go back</a>
            <div id="icon">
                <img width="35px" height="35px" src="icon2.jpg">
                <?php
                    while($row=mysqli_fetch_array($result)){
                        ?>
                        <h4><?php echo $row['firstName'].$row['lastName']; ?></h4>
                        <?php
                    }
                ?>
            </div>
            <h1>Sports Academic</h1>
            <br>
            <p>Aspire to inspire, before we expire!</p>
        </header>
        <nav>
            <ul>
                <li>
                    <a href="#1" class="active">Home</a>
                </li>
                <li>
                    <a href="#2">About us</a>
                </li>
                <li>
                    <a href="#3">Terms and condition</a>
                </li>
                <li>
                    <a href="#4">Contat us</a>
                </li>
                <li class="drop">
                    <a href="#5" >Guidelines</a>
                    <div class="droplist">
                                <a href="#11">Staff details</a>
                                <a href="#22">Events</a>
                                <a href="#33">Achivements</a>
                                <a href="#44">Eqipments and kits</a>
                    </div>

                </li>
            </ul>
        </nav>
        <section>
            <div id="sec1">
                <h2>The only way to prove that</h2><br>
                <h2>You are good at</h2><br>
                <h1><b>Sports</b></h1>
            </div>
            <div id="sec2">
                <h2>Success is where <b>preparation</b> and</h2>
                 <h2><b>opportunity</b> meets up...</h2>
            </div>
            <div id="sec3">
                <h2>Join our sports club to make good career</h2>
                <input id="b1" type="button" value="Join">
            </div>
        </section>
        <footer>
            <h4>Developed for sports students</h4>
            <h4>To make opportunities and guidelines</h4>
            <p>All rights reserved &copy; 2021</p>
        </footer>
    </body>
    <script type="text/javascript">
        document.getElementById("b1").onclick=function(){
            location.href="sportslist.html";
        }
    </script>
</html>