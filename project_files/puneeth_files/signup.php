<?php
session_start();
include "config/config.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $response = array();
    if (isset($_POST['register'])) {
        if(isset($_POST['adminlog'])){
$email = $_POST['Email'];
        $password = $_POST['Password'];
        $Lastname = $_POST['Lastname'];
        $Firstname = $_POST['Firstname'];

        $sql = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $sql->store_result();

        if ($sql->num_rows > 0) {
            echo '<script>alert("User is already Registered")</script>';
        } else {
            if (!isset($errMSG)) {
                $stmt = $conn->prepare("INSERT INTO user (first_name,last_name,email,password,role) VALUES( '$Firstname', '$Lastname', '$email', '$password', 'Admin')");
                if ($stmt->execute()) {
                    $query = "SELECT * FROM user WHERE email=" . $email;
                    mysqli_query($db, $query);
                    $logged_in_user_id = mysqli_insert_id($db);
                    $_SESSION['user'] = getUserById($logged_in_user_id);
                    header("location: Dashboard.php");
                    echo '<script>alert("User Registered Successfully")</script>';
                } else {
                    echo '<script>alert("Cannot complete User registration")</script>';
                }
            }
        }
        }else{
$email = $_POST['Email'];
        $password = $_POST['Password'];
        $Lastname = $_POST['Lastname'];
        $Firstname = $_POST['Firstname'];

        $sql = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $sql->store_result();

        if ($sql->num_rows > 0) {
            echo '<script>alert("User is already Registered")</script>';
        } else {
            if (!isset($errMSG)) {
                $stmt = $conn->prepare("INSERT INTO user (first_name,last_name,email,password,role) VALUES( '$Firstname', '$Lastname', '$email', '$password', 'Employee')");
                if ($stmt->execute()) {
                    $query = "SELECT * FROM user WHERE email=" . $email;
                    mysqli_query($db, $query);
                    $logged_in_user_id = mysqli_insert_id($db);
                    $_SESSION['user'] = getUserById($logged_in_user_id);
                    header("location: Dashboard.php");
                    echo '<script>alert("User Registered Successfully")</script>';
                } else {
                    echo '<script>alert("Cannot complete User registration")</script>';
                }
            }
        }
        }
    } else if (isset($_POST['login'])) {

        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $logged_in_user = mysqli_fetch_assoc($results);
            $_SESSION['user'] = $logged_in_user;

            header("location: Dashboard.php");
            echo '<script>alert("User login Successfully")</script>';
        } else {
            echo '<script>alert("Cannot complete User login")</script>';
        }
    }
}

function getUserById($id)
{
    global $db;
    $query = "SELECT * FROM user WHERE email=" . $id;
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>ShiftMate | Login & Registration</title>
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <p>SHIFTMATE</p>
            </div>
            <div class="nav-menu" id="navMenu">

            </div>
            <div class="nav-button">
                <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
                <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <!----------------------------- Form box ----------------------------------->
        <div class="form-box">

            <!------------------- login form -------------------------->
            <div class="login-container" id="login">
                <form action="signup.php" method="post" id="member" name="mform" onsubmit="return validate()">
                    <div class="top">
                        <header>Login</header>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder=" Email" name="Email">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Password" name="Password">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" id="login" class="submit" name="login" value="Sign In">
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="login-check">
                            <label for="login-check"> Remember Me</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Forgot password?</a></label>
                        </div>
                    </div>
                    <!-- 
                    <div class="bottom" style="text-align: center;">
                        <span style="color:white;font-weight:bold;text-align: center;">Not An Employee? <a
                                href="../../Admin/Sign Up/Adminsignup.php" onclick="">Sign In</a> For Admin!</span>

                    </div> -->
                </form>
            </div>

            <!------------------- registration form -------------------------->
            <div class="register-container" id="register">
                <form action="signup.php" method="post" id="member" name="mform" onsubmit="return validate()">
                    <div class="top">
                        <header>Sign Up</header>
                    </div>
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Firstname" name="Firstname">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Lastname" name="Lastname">
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Email" name="Email">
                        <i class="bx bx-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Password" name="Password">
                        <i class="bx bx-lock-alt"></i>
                    </div>


                    <div class="input-box" style="color:white;font-weight:bold;text-align: center; margin-bottom:10px;">
                        <span style="color:white;font-weight:bold;text-align: center;">Register As Admin ? <label
                                class="switch">
                                <input type="checkbox" checked name="adminlog">
                                <span class="slider round"></span>
                            </label></span>
                    </div>

                    <div class="input-box">
                        <input type="submit" id="signup" class="submit" name="register" value="Register">
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="register-check">
                            <label for="register-check"> Remember Me</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Terms & conditions</a></label>
                        </div>
                    </div>
                    <!-- <div class="bottom" style="text-align: center;">
                        <span style="color:white;font-weight:bold;text-align: center;">Not An Employee? <a
                                href="../../Admin/Sign Up/Adminsignup.php" onclick="">Sign In</a> For Admin!</span>
                    </div> -->
                </form>
            </div>
        </div>
    </div>


    <script>

        function myMenuFunction() {
            var i = document.getElementById("navMenu");

            if (i.className === "nav-menu") {
                i.className += " responsive";
            } else {
                i.className = "nav-menu";
            }
        }

    </script>

    <script>

        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        var x = document.getElementById("login");
        var y = document.getElementById("register");

        function login() {
            x.style.left = "4px";
            y.style.right = "-520px";
            a.className += " white-btn";
            b.className = "btn";
            x.style.opacity = 1;
            y.style.opacity = 0;
        }

        function register() {
            x.style.left = "-510px";
            y.style.right = "5px";
            a.className = "btn";
            b.className += " white-btn";
            x.style.opacity = 0;
            y.style.opacity = 1;
        }

    </script>

</body>

</html>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 26px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>