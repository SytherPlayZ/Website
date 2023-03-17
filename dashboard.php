<?php
session_set_cookie_params(3600,"/");
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <script src="script.js"></script>
    <div class="box">
        <div class="elements bg">
        </div>
        <div class="elements imgBx">
            <img src="src/img1.jpg">
        </div>
        <div class="elements name">
            <h2><b>Someone Famous</b></h2>
        </div>
        <div class="elements content">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum earum voluptas quos assumenda ipsam ea molestiae veritatis reiciendis eligendi similique. <a href="logout.php" style="text-decoration: none;color: #644651;">Logout</a></p>
        </div>
        <div class="card">

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js" integrity="sha512-RX/OFugt/bkgwRQg4B22KYE79dQhwaPp2IZaA/YyU3GMo/qY7GrXkiG6Dvvwnds6/DefCfwPTgCXnaC6nAgVYw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        VanillaTilt.init(document.querySelector(".box"), {
		max: 25,
		speed: 200,
        glare: true
	});
    </script>
</body>
</html>