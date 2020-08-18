<?php
session_start();

// initializing variables
$servername = "localhost";
$dbusername = "root";
$password = "";
$dbname = "moviehub";
$errors = array();

// connect to the database
$db = mysqli_connect($servername, $dbusername, $password,$dbname);

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      } 
  }


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO `users` (`username`, `email`, `password`,`is_verified`) 
          VALUES('$username', '$email', '$password',1)";
          // echo $query;
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
$to  = $email ; // note the comma
$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";

// subject
$subject = 'Confirmatiion Link';

// message
$message = '
<html>
<head>
  <title>confirmation link</title>
</head>
<body>
<a href="https://ahmeds.ursse.org/confirmlink.php?user='.$username.'">Confirm</a>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Tasrif <tasrif@example.com>' . "\r\n";
$headers .= 'From: Confirmation Link <confirm@example.com>' . "\r\n";
$headers .= 'Cc: archive@example.com' . "\r\n";
$headers .= 'Bcc: check@example.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);


  	header('location: index.php');
  }
}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password' AND `is_verified`=1";
      
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $row= $results->fetch_assoc();
   
          $_SESSION['username'] = $username;
          $_SESSION['userid'] = $row['id'];
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }