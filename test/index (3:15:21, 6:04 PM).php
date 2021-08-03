<?php
session_start();
$_SESSION['import'] = "";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<meta property="og:image" content="https://www.nyfa.edu/img/info/symptoms-tracker-1200x627.png" />
<link rel="apple-touch-icon" href="https://www.nyfa.edu/img/info/apple-touch-icon.png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      h2{
        font-size: 2.3rem;
      }
      body{
        padding-top: 0 !important;
      }
      .error{color:#CC0000; display: block; padding: 15px;}
      .header{
        background-image: url(https://www.nyfa.edu/symptoms-tracking-mobile/images/symptom-tracker-desktop-login-header-1920-m.png);
        width: 100%;
        height: 414px;
        margin-top: -70px;
        background-size: cover;
        margin-bottom: auto;
      }
      .headerimg{
        display: none;
      }
      .form-signin{
      }
      @media (max-width: 1024px) {
        .headercontainer{
          margin-top: 0;
        }
        .header{
           background-image: none;
           background-color: #26a32b;
            width: 100%;
            height: 47px;
            margin-top: 0;
            text-align: center;
        }
        .headerimg{
          display: block;
          margin: auto;
          height: auto;
          width: 320px;     }
      }
    

    </style>
    <!-- Custom styles for this template -->
    <link href="css/style.css?v=1" rel="stylesheet">
    <title>NYFA Tracker</title>
  </head>
  <body class="text-center">


    <div class="header"><img src="https://www.nyfa.edu/symptoms-tracking-mobile/images/symptom-tracker-mobile-header-200percent-m.png"  class="headerimg"></div>
    <form class="form-signin">
  <h2 class="text-primary">NYFA COVID-19 <br>Symptom Tracker App</h2>
  <br>
  <h4 class="h4 mb-3 font-weight-normal">Please sign in</h4>
  <div id="message" class="error"></div>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="button" id="but_submit">Sign in</button>

</form>
<br><br><br><br><br>
<div>
<a href="https://play.google.com/store/apps/details?id=com.nyfatracker"><img src="https://www.nyfa.edu/symptoms-tracking/images/google-play-badge.png"  class="" height="40px"></a>
<a href="https://apps.apple.com/us/app/nyfa-tracker/id1538482296"><img src="https://www.nyfa.edu/symptoms-tracking/images/apple_badge.png"  class="" height="40px"></a>
</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
    $("#but_submit").click(function(){
        var username = $("#inputEmail").val().trim();
        var password = $("#inputPassword").val().trim();
        
        if( username != "" && password != "" ){
            $.ajax({
                url:'checkUser.php',
                type:'post',
                data:{username:username,password:password},
                success:function(response){
                    var msg = "";
                    if(response == 1){
                        window.location = "symptoms.php";
                    }else{
                        msg = "Invalid username and password!";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});
</script>
</html>
