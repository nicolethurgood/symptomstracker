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
      .error{color:#CC0000; display: block; padding: 15px;}

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <title>Sign In | Symptoms Tracking</title>
  </head>
  <body class="text-center">
    <form class="form-signin">
  <h1>NYFA COVID-19 Symptom Tracker App</h1>
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <div id="message" class="error"></div>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="button" id="but_submit">Sign in</button>

</form>
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
