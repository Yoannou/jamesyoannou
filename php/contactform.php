<?php

if (!isset($_POST['submit'])) {
    die("Error: Submission HTTP request failed.");
} 
else {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];

    $mailTo = "jamesyoannou@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt = "You have received an email from ".$name."\n\n".$message;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: ../index.php?mailsend");
    echo '<script>alert("Message sent.")</script>'; // Doesn't work
}