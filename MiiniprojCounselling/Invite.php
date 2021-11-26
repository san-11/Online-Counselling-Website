<?php
    require 'config.php';
    session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <script>
        function validateForm() {
            var x = document.forms["myForm"]["fname"].value;
            if (x == "") {
                alert("First Name must be filled out");
                return false;
            }
            var a = document.forms["myForm"]["lname"].value;
            if (a == "") {
                alert("Last Name must be filled out");
                return false;
            }
            var b = document.forms["myForm"]["tnumber"].value;
            if (b == "") {
                alert("Telephone number must be entered");
                return false;
            }
            var c = document.forms["myForm"]["location"].value;
            if (c == "") {
                alert("Location must be filled out");
                return false;
            }
        }
    </script>
    
    

    <title>1-2-1 TALKS</title>
    <link href="Invite_style.css" rel="stylesheet">
</head>

<body>
    <!--Header-->
    <div id="header">
        <!--logo & name-->
        <img id="logo" src="images/logo.png" alt="1-2-1 TALKS">
        <h1>1-2-1 TALKS</h1>
        <!--search-->
        <div id="search-bar">
            <img id="search-icon" src="images/search.png" width="30">
            <input type="text" placeholder=" Search...">
        </div>
    </div>
    <!--Navigation-->
    <ul id="navi-bar">
        <li><a class="nav-item" href="index.php">Home</a></li>
        <li><a class="nav-item" href="Service.php">Service</a></li>
        <li><a class="nav-item" href="Counsellors.php">Counsellors</a></li>
        <li><a id="cho-item" href="Invite.php">Invite</a></li>
        <li><a class="nav-item" href="My_account.php">My account</a></li>
        <li><a class="nav-item" href="Registation.php">Register</a></li>
        <li><a class="nav-item" href="About.php">About us</a></li>
    </ul>

    <!--Body-->

    <div id="back-img">
        <div id="invite">
            <h2>Invite your therapist to you door step</h2>
            <div id="invite-first">
                <h4 class="para">Here things you have to do:</h4><br>
                <ul>
                    <li class="para">Fill it.</li>
                    <li class="para">Submit it.</li>
                </ul>
                <br>
                <p class="para">We will contact you for extra details:</p>
            </div>
            <div id="invite-last">
                <form id="form" action="#" name="myForm" onsubmit="return validateForm()" method="post">
                    <label for="name">First Name :</label>
                    <input type="text" class="name" name="fname" placeholder="First name..">
                    <br>
                    <label for="name">Last Name :</label>
                    <input type="text" class="name" name="lname" placeholder="Last name..">
                    <br>
                    <label for="T.P">Phone Number :</label>
                    <input class="name" type="number" name="tnumber" placeholder="T.P number..">
                    <br>
                    <label for="location">Location:</lable>
                    <input class="name" type="text" name="location" placeholder="Location">
                    <br>
                    <br>
                    <input id="submit" type="submit" name="btnSubmit">
                </form>
<!--  send data form to data base ------------------------------------------------------------------------  -->
                <?php 
                require 'config.php';

                if (isset($_POST["btnSubmit"]))
                {
                    $firstName = $_POST["fname"];
                    $lastName = $_POST["lname"];
                    $tele = $_POST["tnumber"];
                    $loca = $_POST["location"];


                    $sql = "INSERT INTO `invite`(`first_name`, `last_name`, `telephone`, `location`) VALUES 
                    ('$firstName','$lastName',$tele,'$loca')";


                    if($conn->query($sql)) { ?>
                        <h1 style="color:green;">Submit Successful!!<br>We will call you to set an appointment.</h1>
                    <?php }else 
                    { ?>
                        <h3 style="color:red;">Submit Failed</h3>
                    <?php 
                        echo $conn->error;
                    }   
                }
                mysqli_close($conn); 
                ?>
<!-- end of php ----------------------------------------------------------------------------------------------- -->



            </div>


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
                <a href=" "><img src="images/twi.png" width="100 "></a>
            </P>
        </div>
    </div>


</body>

</html>