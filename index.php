<!DOCTYPE html>
<html lang="en">

<head>
  <title>Page Title</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    * {
      box-sizing: border-box;
    }

    /* Style the body */
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
    }

    /* Header/logo Title */
    .header {
      padding: 80px;
      text-align: center;
      background: #1a8fbcc2;
      color: white;
    }

    /* Increase the font size of the heading */
    .header h1 {
      font-size: 40px;
    }

    /* Style the top navigation bar */
    .navbar {
      overflow: hidden;
      background-color: #333;
    }

    /* Style the navigation bar links */
    .navbar a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
    }

    /* Right-aligned link */
    .navbar a.right {
      float: right;
    }

    /* Change color on hover */
    .navbar a:hover {
      background-color: #ddd;
      color: black;
    }

    /* Column container */
    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
    }

    /* Create two unequal columns that sits next to each other */
    /* Sidebar/left column */
    .side {
      -ms-flex: 30%;
      /* IE10 */
      flex: 30%;
      background-color: #f1f1f1;
      padding: 20px;
    }

    /* Main column */
    .main {
      -ms-flex: 70%;
      /* IE10 */
      flex: 70%;
      background-color: white;
      padding: 20px;
    }

    /* Footer */
    .footer {
      padding: 20px;
      text-align: center;
      background: #ddd;
    }

    /* Container of the images */
    .float-container {

      padding: 20px;
    }

    .float-child {
      width: 20%;
      float: left;
      padding: 20px;

    }

    /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 700px) {
      .row {
        flex-direction: column;
      }
    }

    /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
    @media screen and (max-width: 400px) {
      .navbar a {
        float: none;
        width: 100%;
      }
    }

    .myfav {
      position: absolute;
      margin: 8px;
      float: right;
      padding: 5px;
      background-color: white;
      box-shadow: 0 0 7px 1px black;
      cursor: pointer;
    }

    .notfav {
      font-size: 46px;
      color: #272727;

    }

    .notfav:hover {
      color: #ff0000;
    }

    .yesfav {
      font-size: 46px;
      color: #ff0000;
      ;
    }
  </style>
</head>
<?php
include('server.php');
?>


<body>

  <div class="header">
    <h1>A Movie Site</h1>
    <p>Created by Syed Tasrif Ahmed</p>
  </div>

  <div class="navbar">
    <a href="/index.php">Home</a>
    <a href="#">About</a>
    <?php
    if (isset($_SESSION['username'])) {
      echo '<a href="/logout.php" class="right">Logout</a>';
      echo '<a href="#" class="right">' . $_SESSION['username'] . '</a>';
      
      echo '<a href="/mysubscribed.php" class="right">My Subscriptions</a>';

      $userid = $_SESSION["userid"];
      $query = "SELECT `movieid` FROM `myfavs` WHERE `user_id`='$userid' AND `active`=1";

      $results = mysqli_query($db, $query);

      if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
          $allids[] = $row['movieid'];
        }
      }

      echo '<input type="text" class="movieids" value="' . implode(',', $allids) . '" hidden>';
    } else {
    ?>
      <a href="/login.php" class="right">Login</a>
      <a href="<?php echo 'registration.php'; ?>" class="right">Registration</a>
    <?php

    }


    ?>

  </div>


  <div class="main">

    <h2>Recent Hit Movies</h2>


    <div class="float-container movies">





    </div>
  </div>




  <div class="footer">



  </div>

</body>

</html>
<script>
  $(document).ready(function() {

    // https://image.tmdb.org/t/p/w500/b5XfICAvUe8beWExBz97i0Qw4Qh.jpg
    jQuery
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "https://api.themoviedb.org/3/movie/popular?api_key=3a413ffcc846a834f124769129b313b5&language=en-US&page=1",
      "method": "GET",
      "headers": {
        "content-type": "application/json;charset=utf-8",
        "authorization": "Bearer <<access_token>>"
      },
      "processData": false,
      "data": "{}"
    }

    $.ajax(settings).done(function(response) {
    
      var thealready = [];
      var theswapped=[];
      var idddsss = $('.movieids').val();
      if (idddsss != undefined) {
        thealready = idddsss.split(',');
        for(var j=0;j<thealready.length;j++){
          theswapped[thealready[j]]=1;
        }
       
        // console.log(response['results'][i]['id']);
        for (var i = 0; i < Object.keys(response['results']).length; i++) {
          var themovie = response['results'][i]['id'];
         
          if (theswapped[themovie]==1) {
            $('.movies').append('<div class="float-child"><div class="myfav"><i class="fa fa-heart yesfav" id="' + response['results'][i]['id'] + '"  style="font-size: 30px;" aria-hidden="true"></i></div><a href="/movies.php?theid=' + response['results'][i]['id'] + '" class="movielink"><div class="green"><img src="https://image.tmdb.org/t/p/w500' + response['results'][i]['poster_path'] + '" style="width:100%"><div class="w3-container"><h4>' + response['results'][i]['title'] + '</h4></div></div></a></div>');

          } else {
            $('.movies').append('<div class="float-child"><div class="myfav"><i class="fa fa-heart notfav" id="' + response['results'][i]['id'] + '"  style="font-size: 30px;" aria-hidden="true"></i></div><a href="/movies.php?theid=' + response['results'][i]['id'] + '" class="movielink"><div class="green"><img src="https://image.tmdb.org/t/p/w500' + response['results'][i]['poster_path'] + '" style="width:100%"><div class="w3-container"><h4>' + response['results'][i]['title'] + '</h4></div></div></a></div>');

          }


        }
      }
      else{
        for (var i = 0; i < Object.keys(response['results']).length; i++) {
          var themovie = response['results'][i]['id'];
       
            $('.movies').append('<div class="float-child"><div class="myfav"><i class="fa fa-heart notfav" id="' + response['results'][i]['id'] + '"  style="font-size: 30px;" aria-hidden="true"></i></div><a href="/movies.php?theid=' + response['results'][i]['id'] + '" class="movielink"><div class="green"><img src="https://image.tmdb.org/t/p/w500' + response['results'][i]['poster_path'] + '" style="width:100%"><div class="w3-container"><h4>' + response['results'][i]['title'] + '</h4></div></div></a></div>');

        


        }
      }


    });


    $(document).on('click', '.notfav', function() {

      $(this).removeClass('notfav').addClass('yesfav');
      var movieid = $(this).attr('id');
      $.post("addremovefav.php", {
        movieid: movieid,
        type: 1
      }, function(data) {

      });
    });

    $(document).on('click', '.yesfav', function() {
      $(this).removeClass('yesfav').addClass('notfav');
      var movieid = $(this).attr('id');
      $.post("addremovefav.php", {
        movieid: movieid,
        type: 2
      }, function(data) {

      });
    });
  });
</script>