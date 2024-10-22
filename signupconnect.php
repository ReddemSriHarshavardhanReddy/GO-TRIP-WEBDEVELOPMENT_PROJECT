<?php

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
    {
        $conn = mysqli_connect('localhost','root','','it') or die("Connection Failed");

        if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['newUsername']) && isset($_POST['newPassword']))
        {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $newUsername = $_POST['newUsername'];
            $newPassword = $_POST['newPassword'];

            $sql = "INSERT INTO `gotrip` (`fullname`, `email`, `phone`,`newUsername`,`newPassword`)  VALUES ('$name','$email','$phone','$newUsername','$newPassword')";
            if(mysqli_query($conn,$sql))
            {
                echo "Entry Successfull";
            }
            else
            {
                echo "Error Occured";
            }

        }
    }



?>