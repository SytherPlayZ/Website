<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if(isset($_POST["submit"])){
        $username1 = $_POST["username"];
        $pass1 = $_POST["password"];
        $email1 = $_POST["email"];

        $passwordHash = password_hash($passwordHash, PASSWORD_DEFAULT);
        require_once "database.php";
        $sql = "SELECT * FROM register WHERE email='$email1'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        $sql = "INSERT INTO register (username, password, email) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        if($prepareStmt){
            if($rowCount>0){
                echo "<script>alert('Email already exists')</script>";
            }else{
                mysqli_stmt_bind_param($stmt, "sss", $username1, $passwordHash, $email1);
                mysqli_stmt_execute($stmt);
                echo "<script>alert('Successfully registered!')</script>";
            }
        }else{
            echo "<script>alert('Something went wrong')</script>";
        };
    };
    ?>
        <div class="section">
            <div class="container">
                <div class="scene" id="scene">
                    <div class="layer" data-depth-x="-0.2" data-depth-y="0.5"><img src="src/moon.png"></div>
                    <div class="layer" data-depth-x="0.15"><img src="src/mountains02.png"></div>
                    <div class="layer" data-depth-x="0.15"><img src="src/mountains01.png"></div>
                    <div class="layer"><img src="src/road.png"></div>
                </div>
            </div>
        <form id="frm" action="signup.php" onsubmit="return submit1()" method="POST">
            <div class="login1">
                <h2>Sign Up</h2>
                <div class="inputBox">
                    <input type="text" id="username" name="username" placeholder="Username">
                </div>
                <div class="inputBox">
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>
                <div class="inputBox">
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
                <div class="inputBox">
                    <input type="password" id="pswrd2" name="pass2" placeholder="Confirm Password">
                </div>
                <div class="inputBox1">
                    <button class="submit" name="submit">Login</button>
                </div>
                <div class="group">
                    <a class="fp" href="#">Forgot Password?</a>
                    <a class="su" href="signin.php">Signin</a>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"
        integrity="sha512-/6TZODGjYL7M8qb7P6SflJB/nTGE79ed1RfJk3dfm/Ib6JwCT4+tOfrrseEHhxkIhwG8jCl+io6eaiWLS/UX1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let scene = document.getElementById("scene")
        let parallax = new Parallax(scene)
        let form = document.getElementById("frm")
        function submit1(event){
            let username = document.getElementById("username").value;
            let email = document.getElementById("email").value;
            let pswrd = document.getElementById("password").value;
            let pswrd2 = document.getElementById("pswrd2").value;

            if (username == '' || password == '' || email == '' || pswrd2 == '') {
                alert("Please enter all the fields!")
                return false
            } else if(username.length > 12 || username.length < 3){
                alert("Username should be greater than 3 characters and smaller than 12 characters in length")
                return false
            } else if(pswrd.length < 8){
                alert("Password should be greater than or equal to 8 characters in length")
                return false
            } else if(pswrd !== pswrd2){
                alert("Password is not matching to confirmation password")
                return false
            }
            else {
                return true
            }
        }
    </script>
</body>

</html>