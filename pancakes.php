<?php 
require_once('config.php');
include ('registeruser.php');
session_start();
$xml=simplexml_load_file("http://localhost/seminarie2/recipes.xml") or die("Error: Cannot create object");
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Tasty Recipes</title>
        <meta name="Nicklas Ockelberg" content="Seminarie 1">
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
            <h2 class="title"> <?php echo $xml->recipe[1]->title ?> </h2>
            <div id="ingredients">
                <img src="<?php echo $xml->recipe[1]->image ?>" alt="Pancakes">

                <ul class="ingrTable">
                    <h4><?php echo $xml->recipe[1]->content->ingredients->title ?> </h4>
                    <?php foreach($xml->recipe[1]->content->ingredients->ingredient as $ingredient){
                        echo "<li>" . $ingredient . "</li>";
                    }?>
                </ul>
            </div>
            <hr>
            <div id="method">
                <div id="summary">
                    <ul>
                        <li><?php echo $xml->recipe[1]->content->servings ?> </li>
                        <li><?php echo $xml->recipe[1]->content->preptime ?> </li>
                        <li><?php echo $xml->recipe[1]->content->cooktime ?> </li>
                        <li><?php echo $xml->recipe[1]->content->totaltime ?> </li>
                    </ul>
                </div>
                <h2 class="title"><?php echo $xml->recipe[1]->content->instructions->title ?> </h2>
                <p><?php echo $xml->recipe[1]->content->instructions->instruction ?>
                </p>
            </div>
            <hr>
            <div class="commentsubmit">
                <?php 
                if(isset($_SESSION['username'])){
                    echo '<form action="addcomment.php" id="userform" method="post">
                    Commenting as: ' .$_SESSION['username']. '
                    <br>
                    <textarea name="comment" form="userform" rows="4" required placeholder="Enter comment here..."></textarea>
                    <input id="submit" name="pancakes" type="submit" value="Send"/>
                    </form>';
                }
                elseif(!isset($_SESSION['username'])){
                    echo 'Log in, in order to be able to comment!';
                }


                ?>
            </div>
            <hr>
            <div class="commentsection">
                <h2>Comments:</h2>
                <?php 
                $food = 'pancakes';
                if(isset($_SESSION['username'])){
                    $loggedinuser = $_SESSION['username'];
                }
                else{
                    $loggedinuser = "";
                }
                include('loadcomment.php');
                ?>
            </div>
        </div>
        <script src="modalscript.js"></script>
    </body>
</html>