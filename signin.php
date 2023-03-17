<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Glassmorphism</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        error_reporting(0);
        if(isset($_POST["login"])){
            $username = $_POST["username"];
            $pass = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT username, password FROM register WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);
            $arr = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $truefalse = isset($arr['password']);
            $hash = $arr['password'];
            if($rows > 0){
                if($truefalse){
                    if(password_verify($pass, $hash)){
                        session_start();
                        $_SESSION["user"] = "yes";
                        header("Location: dashboard.php");
                    }else{
                        echo "<script>alert('Invalid Password!')</script>";
                    }
                }else{
                    echo "<script>alert('Invalid Password1!')</script>";
                }
            }else{
                echo "<script>alert('Username does not exist!')</script>";
            }
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
            <form id="frm" action="signin.php" onsubmit="return sub2()" method="POST">
            <div class="login">
                <h2>Sign In</h2>
                <div class="inputBox">
                    <input type="text" id="username" placeholder="Username" name="username">
                </div>
                <div class="inputBox">
                    <input type="password" id="pswrd" placeholder="Password" name="password">
                </div>
                <div class="inputBox1">
                    <button class="submit" name="login" type="submit">Login</button>
                </div>
                <div class="group">
                    <a class="fp" href="#">Forgot Password?</a>
                    <a class="su" href="signup.php">Signup</a>
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
        function sub2(){
            let username = document.getElementById("username").value
            let pswrd = document.getElementById("pswrd").value
            if (pswrd == '' || username == '') {
                alert("Please enter all the fields!")
                return false;
            } else {
                return true
            }
        }
    </script>
</body>

</html>