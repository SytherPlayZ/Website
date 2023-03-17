<?php
        $host = "localhost";  
        $user = "root";  
        $pass = '';  
        $dbname = "signup";  
          
        $conn = mysqli_connect($host, $user, $pass, $dbname);  
        if(!$conn){
            die("<h3> Something went Wrong! </h3>");
        }
?>