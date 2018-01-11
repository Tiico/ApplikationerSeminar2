<?php 
include ('config.php');
include ('login.php');
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Calendar</title>
        <meta name="description" content="Seminar 1">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <meta name="Nicklas Ockelberg" content="Seminarie 1">
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
            <div id="calendar-wrap">
                <div id="calendar">
                    <ul class="weekdays">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                    </ul>

                    <!-- Days from previous month -->

                    <ul class="days">
                        <li class="day other-month">
                            <div class="date">27</div>                      
                        </li>
                        <li class="day other-month">
                            <div class="date">28</div>                   
                        </li>
                        <li class="day other-month">
                            <div class="date">29</div>                      
                        </li>
                        <li class="day other-month">
                            <div class="date">30</div>                      
                        </li>
                        <li class="day other-month">
                            <div class="date">31</div>                      
                        </li>

                        <!-- Days in current month -->

                        <li class="day">
                            <div class="date">1</div>                       
                        </li>
                        <li class="day">
                            <div class="date">2</div>                    
                        </li>
                    </ul>

                    <!-- Row #2 -->

                    <ul class="days">
                        <li class="day">
                            <div class="date">3</div>                       
                        </li>
                        <li class="day">
                            <div class="date">4</div>                       
                        </li>
                        <li class="day">
                            <div class="date">5</div>                       
                        </li>
                        <li class="day">
                            <div class="date">6</div>  
                        </li>
                        <li class="day">
                            <div class="date">7</div>
                            <div class="image">
                                <a href="pancakes.php"><img src="images/pancakes.png" alt="Pancakes"></a>
                            </div>   
                        </li>
                        <li class="day">
                            <div class="date">8</div>                       
                        </li>
                        <li class="day">
                            <div class="date">9</div>                       
                        </li>
                    </ul>

                    <!-- Row #3 -->

                    <ul class="days">
                        <li class="day">
                            <div class="date">10</div>                      
                        </li>
                        <li class="day">
                            <div class="date">11</div>                      
                        </li>
                        <li class="day">
                            <div class="date">12</div> 
                            <div class="image">
                                <a href="meatballs.php"><img src="images/meatballs.jpeg" alt="Meatballs"></a>
                            </div>   
                        </li>
                        <li class="day">
                            <div class="date">13</div>                      
                        </li>
                        <li class="day">                      
                        </li>
                        <li class="day">
                            <div class="date">15</div>                      
                        </li>
                        <li class="day">
                            <div class="date">16</div>                      
                        </li>
                    </ul>

                    <!-- Row #4 -->

                    <ul class="days">
                        <li class="day">
                            <div class="date">17</div>                      
                        </li>
                        <li class="day">
                            <div class="date">18</div>                      
                        </li>
                        <li class="day">
                            <div class="date">19</div>                      
                        </li>
                        <li class="day">
                            <div class="date">20</div>                      
                        </li>
                        <li class="day">
                            <div class="date">21</div>                      
                        </li>
                        <li class="day">
                            <div class="date">22</div>                     
                        </li>
                        <li class="day">
                            <div class="date">23</div>                      
                        </li>
                    </ul>

                    <!-- Row #5 -->

                    <ul class="days">
                        <li class="day">
                            <div class="date">24</div>                      
                        </li>
                        <li class="day">
                            <div class="date">25</div>                    
                        </li>
                        <li class="day">
                            <div class="date">26</div>                      
                        </li>
                        <li class="day">
                            <div class="date">27</div>                      
                        </li>
                        <li class="day">
                            <div class="date">28</div>                      
                        </li>
                        <li class="day">
                            <div class="date">29</div>                      
                        </li>
                        <li class="day">
                            <div class="date">30</div>                      
                        </li>
                    </ul>

                    <!-- Row #6 -->

                    <ul class="days">
                        <li class="day">
                            <div class="date">31</div>                      
                        </li>
                        <li class="day other-month">
                            <div class="date">1</div> <!-- Next Month -->                       
                        </li>
                        <li class="day other-month">
                            <div class="date">2</div>                       
                        </li>
                        <li class="day other-month">
                            <div class="date">3</div>                       
                        </li>
                        <li class="day other-month">
                            <div class="date">4</div>                       
                        </li>
                        <li class="day other-month">
                            <div class="date">5</div>                       
                        </li>
                        <li class="day other-month">
                            <div class="date">6</div>                       
                        </li>
                    </ul>

                </div><!-- /. calendar -->
            </div><!-- /. wrap -->
        </div>
        <script src="modalscript.js"></script>
    </body>
</html>