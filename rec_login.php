<?php
$con = mysqli_connect("localhost","root","","practice");


// Signup Process
if (isset($_POST['register_submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $receiverid = $_POST['receiverid'];

    $check_email = mysqli_query($con, "SELECT receiverid FROM receiver where receiverid = '$receiverid' ");
if(mysqli_num_rows($check_email) > 0){
    echo '<script>alert("Rceiver ID Already Exists!!!....Try Againn")</script>';
}
else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insert_sql = "INSERT INTO receiver(name,password,email,receiverid) VALUES('$name','$password','$email','$receiverid')";
    $res = mysqli_query($con,$insert_sql);
    }
}
}

// Login Process
session_start();
if (isset($_POST['login_submit'])) {
    $name = $_POST['name'];
    $receiverid = $_POST['receiverid'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM receiver WHERE name = '$name' && receiverid = '$receiverid' && password = '$password'";
    $result = mysqli_query($con,$sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['name'];
        $_SESSION['receiverid'] = $row['receiverid'];
        $cookie_name = "loggedInUser";
        $cookie_value = $row['receiverid'];;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        header("Location: rec_fetchdata.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe Transfer</title>

    <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
        }
        .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form h1{
            font-family: 'Poppins', sans-serif;
            color: #4CAF50;
        }
        .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
        }
        .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
        background: #43A047;
        }
        .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
        }
        .form .message a {
        color: #4CAF50;
        text-decoration: none;
        }
        .form .register-form {
        display: none;
        }
        .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
        }
        .container:before, .container:after {
        content: "";
        display: block;
        clear: both;
        }
        .container .info {
        margin: 50px auto;
        text-align: center;
        }
        .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
        }
        .container .info span {
        color: #4d4d4d;
        font-size: 12px;
        }
        .container .info span a {
        color: #000000;
        text-decoration: none;
        }
        .container .info span .fa {
        color: #EF3B3A;
        }
        body {
        background: #76b852; /* fallback for old browsers */
        background: -webkit-linear-gradient(right, #76b852, #8DC26F);
        background: -moz-linear-gradient(right, #76b852, #8DC26F);
        background: -o-linear-gradient(right, #76b852, #8DC26F);
        background: linear-gradient(to left, #76b852, #8DC26F);
        font-family: "Roboto", sans-serif;
        background-image: url(skybg.png);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;      
        }
        .form h4{
            font-size: large;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="form">

            <!-- SignUp Form -->
            <form action="" method="post" class="register-form">
                <h1>Register Form</h1>
                <input type="text" name="name" placeholder="Name"/>
                <input type="text" name="email"  placeholder="Email Address"/>
                <input type="password" name="password" placeholder="Password"/>
                <input type="text" name="receiverid" placeholder="Receiver Id "/>
                <button type="submit" name="register_submit"> create</button>
                <h4 class="message">Already registered? <a href="#">Sign In</a></h4>
            </form>
            
            <!-- Login Form -->
            <form action="" method="post" class="login-form">
                <h1>Login Form</h1>
                <input type="text" name="name" placeholder="Name"/>
                <input type="number" name="receiverid" placeholder="Receiver Id "/>
                <input type="password" name="password" placeholder="Password"/>
                <button type="submit" name="login_submit">login</button>
                <h4 class="message">Not registered? <a href="#">Create an account</a></h4>
            </form>
        </div>
    </div>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>   
    <script>
        $('.message a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>
</body>
</html>