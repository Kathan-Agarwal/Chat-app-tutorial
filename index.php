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
 
 <body>
    <?php
    if(!isset($_SESSION['name'])){ //if user not logged in show login form
        ?>
     <div id="loginform">
         <p> Please enter your name to continue!</p>
         <form action="index.php" method="post">
             <label for="name">Name -</label>
             <input type="text" name="name" id="name" />
             <input type="submit" name="enter" value="Enter" />
 </form>
 </head>
 </div>
   
<?php
    } else {
        ?>
        <!-- Main chat interface -->
        <div id="wrapper"> 
        <div id="menu">
            <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
            <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        </div>
    <div id="chatbox">
        <?php
        if(file_exists("log.html") && filesize("log.html") > 0){ //load exisiting message if chat log gile exists
            $contents = file_get_contents("log.html");
            echo $contents;
        }}
        ?>
        </div>

        <formname="message" action="">
            <input name= "usermsg" type="text" id="usermsg" />
            <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
    </form>
    </div>
 </body>
 </html> 
    


