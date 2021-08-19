<?php
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $dob=$_POST['dob'];
    $fatherName=$_POST['fatherName'];
    $fatheroccupation=$_POST['fatheroccupation'];
    $profession=$_POST['profession'];
    $club=$_POST['club'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $conn= new mysqli('localhost','root','','sports');
    if($conn->connect_error){
        die('connection failed: '.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into sportsreg(firstName,lastName,email,age,dob,fatherName,fatheroccupation,profession,club,state,city,address,contact)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssissssssssi",$firstName,$lastName,$email,$age,$dob,$fatherName,$fatheroccupation,$profession,$club,$state,$city,$address,$contact);
        $stmt->execute();
        ?>
        <link rel="stylesheet" href="style.css">
        <body id="reg2">
            <a class="back" href="sportsreg.html">Go back</a>
            <br><br><br><br>
            <h1>You are Successfully joined in <?php echo $club ?> club </h1>
        </body>
        <?php
        $stmt->close();
        $conn->close();
        
    }
?>
