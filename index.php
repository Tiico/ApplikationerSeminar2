<?php 
include ('config.php');
include ('login.php');
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Tasty Recipes</title>
        <meta name="Nicklas Ockelberg" content="Seminar 1">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>

    <body>
        <h1 id="header"><a href="index.php">Tasty Recipes</a></h1>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="calendar.php">Calendar</a>    
            <div class="dropdown">
                <button class="dropbtn">Recipes 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="meatballs.php">Meatballs</a>
                    <a href="pancakes.php">Pancakes</a>
                </div>
            </div> 
            <a href="register.php">Register</a>
            <?php 
            if(isset($_SESSION['logged'])){
                echo '<a href="logout.php" style="float:right;" id="logoutbtn">Log out</a>';
            }
            elseif(!isset($_SESSION['logged'])){
                echo '<button id="loginbtn" onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">Login</button>';
            }
            ?>
        </div>
        <div id="container">
            <div id="id01" class="modal">
                <form class="modal-content animate" action="login.php" method="post">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Username:<sup>*</sup></label>
                        <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Password:<sup>*</sup></label>
                        <input type="password" name="password" class="form-control">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                    <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                    <div class="container">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <span class="psw"> Forgot <a href="#"> password?</a></span>
                    </div>
                </form>
            </div>
            <div id="welcome">
                <h2>Welcome to Tasty Recipes!</h2>
                <p>Thank you so much for stopping by the site! If you are new to Tasty Recipes, the one thing you should know about us is that we are obsessed with creating scratch cooking recipes that you will love. Also, if you want to check out our food calendar by clicking <a href="calendar.php">here!</a></p>
            </div>
            <hr>
            <div id="recent">

                <div class="post">
                    <h3>Meatballs</h3>
                    <a href="meatballs.php"><img src="images/meatballs.jpeg" alt="Meatballs"></a>
                    <p>Tired of the same old boring dinner every night? Spice up your dinner this evening with some authentic Swedish meatballs!</p>
                    <a href="meatballs.php" class="button" role="button">Read more &#8594;</a>
                </div>
                <div class="post">
                    <h3>Pancakes</h3>
                    <a href="pancakes.php"><img src="images/pancakes.png" alt="Pancakes"></a>
                    <p>Looking for something easy and delicious? Then you've come to the right place, not much can compete with this simple but absolutely delicious treat!</p>
                    <a href="pancakes.php" class="button" role="button">Read more &#8594;</a>
                </div>
            </div>
        </div>
        <script src="modalscript.js"></script>
    </body>
</html>