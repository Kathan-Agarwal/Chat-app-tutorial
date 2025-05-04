<?php
session_start(); // starting session to know which user is sending message

if(isset($_SESSION['name'])){
    $text = $_POST['text']; // to get message sent from javscript 

    date_default_timezone_set('Europe/Riga'); // setting up the timezone for Latvia


    // Format of message with time and username to show up
    $text_message ="<div class='msgln'><span class= 'chat-time'>".date("g:i A")."</span> <b class='user-name'>".$_SESSION['name']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";



    // Appending messages to log.html file
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
}
?>
