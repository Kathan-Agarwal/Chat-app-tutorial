<?php //Starting the PHP SESSION TO STORE THE USERNAME
session_start();

if(isset($_POST['enter'])){ // Handle login form submission
    if($_POST['name']!=""){ 
        // it checks if name is not empty
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name'])); //stores name after cleaning 
    } else{
        echo '<span class="error"> Please enter a name!</span>'; // if empty show error


        }
    }


if(isset($_GET['logout'])){ // user clicks logout, it destroy session & log event
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>".$_SESSION['name'] ."</b> has left the chat session.</span><br></div>"; // Logout message to show in chat log
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
    
    session_destroy(); // destroy session
    header("Location: index.php"); // Redirect to login page
}

?>

<!DOCTYPE html>
 <html>
 <head>
     <title> Simple Chat Application </title>
     <link rel="stylesheet" href="style.css" />
 </head>
 <body>
     <div id="loginform">
         <p> Please enter your name to continue!</p>
         <form action="index.php" method="post">
             <label for="name">Name -</label>
             <input type="text" name="name" id="name" />
             <input type="submit" name="enter" value="Enter" />
 </form>
 </div>
 </body>
 </html> 