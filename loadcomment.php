<?php
$sql = "SELECT * FROM comments WHERE food = '$food'";  
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $name = $row['username'];
    $comment = $row['comment'];
    $time = $row['created_at'];

    if($name == $loggedinuser){
        $deletecomment = "<a href=\"deletecomment.php?id=" . $id . "\">DELETE</a>";
    }
    else {
        $deletecomment = "";
    }
    echo '<div class="comment">
          <h3>'. $name . ':</h3> <h4> '. $time . '</h4>
          <p>' . $comment . '<span id="cmntdelbtn">' . $deletecomment . '</span>' . '</p>
          </div>';
}
?>