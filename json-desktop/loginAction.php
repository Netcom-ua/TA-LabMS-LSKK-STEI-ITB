<?php
    $con=mysqli_connect("localhost","root","","db_lms");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $user = $_GET['user'];
    $result = mysqli_query($con,"SELECT username, password FROM tb_user where username='".$user."'");
    $jason2send = array();
    while($row = mysqli_fetch_assoc($result)) {
      $json2send[] = $row;
    }
    $str = json_encode($json2send);
    echo substr($str, 1, strlen($str)-2);
    //echo $str;
    mysqli_close($con);
?>