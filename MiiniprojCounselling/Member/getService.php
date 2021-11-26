<!DOCTYPE html>
<html>

<?php
    session_start();
?>

<head>
    <title>1-2-1 TALKS</title>
    <link href="Accounts_style.css" rel="stylesheet" type="text/css">

     <style>

        #form-back{
            text-align:center;
        }

        #form-back h2{
            color:green;
        }
                
        #first-name {
        width: 30%;
        height: 30px;
        margin: 10px;
        padding: 0 5px;
        margin-left: 78px;
        border-color: black;
        }



        #email {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 73px;
            border-color: black;
        }

        #age {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 89px;
            border-color: black;
        }

        #cont {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            border-color: black;
        }

        #skype {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 55px;
            border-color: black;
        }




        /*form buttons*/

        #signup {
            height: 30px;
            margin-top: 15px;
            background-color: green;
            border-color: black;
            color: white;
            border-radius: 4px;
        }

        #signup:hover {
            color: green;
            background-color: white;
            border: 2px solid green;
        }

        #main-body {
            margin: 0;
            padding-bottom: 10%;
            background-image: url("images/registerback.jpg");
            width: 100%;
            background-size: cover;
            background-position: center;
        }


    </style>

</head>

<body>
    <!--Navigation-->
    <div>
        <ul id="navi-bar">
            <img id="logo" src="images/logo.png" alt="1-2-1 TALKS">
            <li><a class="nav-item" href="../index.php">Home</a></li>
            <li><a class="nav-item" href="../Service.php">Service</a></li>
            <li><a class="nav-item" href="../counsellors.php">Counsellors</a></li>
            <li><a class="nav-item" href="../Invite.php">Invite</a></li>
            <li><a id="cho-item" href="../My_account.php">My account</a></li>
            <li><a class="nav-item" href="../Registation.php">Register</a></li>
            <li><a class="nav-item" href="../About.php">About us</a></li>

        </ul>
    </div>
    <!--Body-->
    <div id = "main-body">
        <div id="user">
            <h1>Hello, <?php echo $_SESSION['userName']; ?></h1> 

            <!-- log out button -->
            <form style="display:inline-block; float:right;" method="post"><button id="out" name="out">LOG OUT</button></form>
            <?php
                if(isset($_POST['out']))
                {
                    session_destroy();
                    header("Location: http://localhost/onlinecounselling/My_account.php");
                }
            ?>
        </div>

        <!-- user   Navigation bar  -->
        <div id="user-navi">
            <li><a id="user-navi-choose" href="getService.php">Get Service</a></li>
            
        </div>
        
        <!-- ger service form -->
        <div style="display: block; padding-left: 20px;">
            <div id="form-back">
                <h2>Get Service</h2>
                <form name="myForm" onsubmit="return validateForm()" method="post">
                    Name:
                    <input id="first-name" placeholder="Name" type="text" name="fname"><br>Age: 
                    <input id="age" placeholder="Age" type="number" name="age"><br>E-mail:
                    <input id="email" placeholder="E-mail Address" type="text" name="email"><br> Contact Number:
                    <input id="cont" placeholder="Contact number" type="number" name="contact"><br> Payment ID:
                    <input id="skype" placeholder="ID" type="text" name="skype"><br>
                    <button id="signup" type="submit" name="btnSubmit">Submit</button>
                </form>

            </div>
<!-- php part *************************************************************************************** -->
    <?php 
    require 'config.php';
    error_reporting(E_ALL ^ E_WARNING); 

    if (isset($_POST["btnSubmit"]))
        {
            $firstName = $_POST["fname"];
            $age = $_POST["age"];
            $email = $_POST["email"];
            $tele = $_POST["contact"];
            $pay = $_POST["pay"];
            $now = new DateTime();
            $now->setTimezone(new DateTimeZone('Asia/Colombo')); 
            $now2 = $now->format('Y-m-d H:i:s');
            $id =  $_SESSION['memberId'];


            $sql = "INSERT INTO `service`(`name`, `age`, `email`, `contact`, `pay_id`, `date`) VALUES 
                ('$firstName',$age,'$email',$tele,'$pay_id', '$now2')";


            if($conn->query($sql)) { 
                ?> <h1 style="color:green;">Request Successfull!!<br>We will call you to set an appointment. </h1> <?php
            }else 
            { ?>
                <h1>Delete Fail</h1>
            <?php 
                echo $conn->error;
            }   

            mysqli_close($conn);
        }
    ?>
<!-- end php part *************************************************************************************** -->


        </div>


    </div>
    
    <!--footer-->
    <div id="footer-background">

        <!--address-->
        <div id="foot-addr">
            <h3 class="address">1-2-1 TALKS Co.</h3>
            <h3 class="address">BORIVALI WEST</h3>

            <h3 class="address">MUMBAI -92</h3>

            <h2 class="address">CONTACT US: 9032987156</h3>
        </div>
        <!--social media-->
        <div id="social-media">
            <h3>Follow us :</h3>
            <P>
                <a href=" "><img src="images/fac.png" width="100 "></a>
                <a href=" "><img src="images/ins.png" width="100 "></a>
                <a href=" "><img src="images/twi2.png" width="100 "></a>
            </P>
        </div>
    </div>

</body>

</html>