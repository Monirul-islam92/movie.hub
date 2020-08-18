<?php
include('server.php');
session_start();
if (isset($_POST['movieid']) && isset($_POST['type'])) {
    $userid = $_SESSION["userid"];
    $movieid = $_POST['movieid'];
    if ($_POST['type'] == 1) {
        $query = "SELECT `id` FROM `myfavs` WHERE `user_id`='$userid' AND `movieid`='$movieid'";

        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $query = "UPDATE  `myfavs` SET `active`=1 WHERE `user_id`=$userid AND `movieid`='$movieid'";
            mysqli_query($db, $query);
            echo json_encode('success');
        } else {
            $query = "INSERT INTO `myfavs` (`user_id`,`movieid`, `active`) 
    VALUES('$userid','$movieid',1)";
            mysqli_query($db, $query);
            echo json_encode('success');
        }
    } else {
        $query = "UPDATE  `myfavs` SET `active`=0 WHERE `user_id`=$userid AND `movieid`='$movieid'";
        mysqli_query($db, $query);
        echo json_encode('success');
    }
}
