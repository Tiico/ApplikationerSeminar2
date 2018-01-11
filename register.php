<?php 
require_once('config.php');
include ('registeruser.php');
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
        <!-- container, inc modal -->
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
            <div class="wrapper">
                <h2>Sign Up</h2>
                <p>Please fill this form to create an account.</p><br>
                <form action="register.php" method="post">
                    <div>
                        <input id="uname" type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter Username" autofocus>
                        <span><?php echo $username_err ?></span>
                    </div>    
                    <div>
                        <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Enter Password">
                        <span><?php echo $password_err; ?></span>
                    </div>
                    <div>
                        <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" placeholder="Repeat Password">
                        <span><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div>
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </div>
                    <p>Already registered? <a href="login.php">Login here</a>.</p>
                </form>
            </div>
        </div>
            <script src="modalscript.js"></script>
    </body>
</html>