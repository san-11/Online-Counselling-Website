<!DOCTYPE html>
<html>

<?php
    session_start();

    if (isset($_SESSION['AccType'])) {
        $type = $_SESSION['AccType'];
        if ($type == "member") {
            header("Location: http://localhost/onlinecounselling/Member/getService.php");
        }
        else {
            header("Location: http://localhost/onlinecounselling/admin/Admin.php");
        }
    }
?>

<head>

     <script>
        function validateForm() {
            var x = document.forms["myForm"]["user"].value;
            if (x == "") {
                alert("Email must be filled out");
                return false;
            }
            var a = document.forms["myForm"]["password"].value;
            if (a == "") {
                alert("Password must be filled out");
                return false;
            }
        }
    </script>

    <title>1-2-1 TALKS</title>
    <link href="My_account_style.css" rel="stylesheet">
</head>

<body>
    <!--Header-->
    <div id="header">
        <!--logo & name-->
        <img id="logo" src="images/logo.png" alt="1-2-1 TALKS">
        <h1>1-2-1 TALKS</h1>
        <!--search-->
        <div id="search-bar">
            <img src=images/search.png width="30">
            <input type="text" placeholder=" Search...">
        </div>
    </div>
    <!--Navigation-->
    <ul id="navi-bar">
        <li><a class="nav-item" href="index.php">Home</a></li>
        <li><a class="nav-item" href="Service.php">Service</a></li>
        <li><a class="nav-item" href="Counsellors.php">Counsellors</a></li>
        <li><a class="nav-item" href="Invite.php">Invite</a></li>
        <li><a id="cho-item" href="My_account.php">My account</a></li>
        <li><a class="nav-item" href="Registation.php">Register</a></li>
        <li><a class="nav-item" href="About.php">About us</a></li>
    </ul>

    <!--Body-->

    <!--<div style="width:200px; position: absolute; height: 500px; display: block; background-color: lightgray;">
        <a href="#">Hello World!</a>
    </div> -->
    <!--login form-->
    <div id="back-img">
        <div id="login-form">
            <h2>LOG IN</h2>
            <form action="#" name="myForm" onsubmit="return validateForm()" method="post">
                <input class="form-input" placeholder="Email" type="text" name="user"><br>
                <input class="form-input" placeholder="Password" type="password" name="password"><br>
                <button id="login-button" type="submit" name="btnSubmit">Login</button>
            </form>

<!-- php part *************************************************************************************** -->
        <?php
            require 'config.php';
            

            if(isset($_POST['btnSubmit']))
            {
                $email = $_POST['user'];
                $password = $_POST['password'] ;

                $sql = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";
                $sql2 = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
                $result = $conn->query($sql);
                $result2 = $conn->query($sql2);
                if ($result-> num_rows == 1)
                {
                    while($row = $result-> fetch_assoc())
                    {
                        $_SESSION['AccType'] = "member";
                        $_SESSION['memberId'] = $row['id'];
                        $_SESSION['userName'] = $row['user_name'];
                        header("Location: http://localhost/onlinecounselling/Member/getService.php");
                        exit();
                    }
                }
                else if ($result2-> num_rows == 1)
                {
                    while($row = $result2-> fetch_assoc())
                    {
                        $_SESSION['AccType'] = "admin";
                        $_SESSION['memberId'] = $row['id'];
                        $_SESSION['userName'] = $row['user_name'];
                        header("Location: http://localhost/onlinecounselling/admin/Admin.php");
                        exit();
                    }
                }
                else{
                    ?> <p style="color:red;">Invaild email or password </p><br> <?php
                }
            
            }  
            $conn-> close(); 
        ?>
<!-- end of php part ******************************************************************************************** -->

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
            <h3>Follow us:</h3>
            <P>
                <a href=" "><img src="images/fac.png" width="100 "></a>
                <a href=" "><img src="images/ins.png" width="100 "></a>
                <a href=" "><img src="images/twi.png" width="100 "></a>
            </P>
        </div>
    </div>

</body>

</html>