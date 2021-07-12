<?php
  session_start();

  if (!isset($_SESSION['uname'])) {
    header("Location: index.php");
  }
  $message = $_SESSION['message'];

 ?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thank you | Symptoms Tracking</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
    <style>

      body {
        display: grid;
        padding-top: 0 !important;
      }
      .content {
        width: 90%;
        margin: auto;
        margin-top: 0;
      }
      .row hr{
        width: 100%;
        border-color: black;
      }

      .icon{
        font-size: 18px;
        margin: 10px 0 10px 30px;
        padding: 0;
      }
      .icon img{
        width: 150px;
      } 
      .mobile{
        display: none;
      }
      .desktop{
        display: flex;
      }
      .friend{
        font-size: 2rem;
      }
       .headercontainer{
        background-color: #26a32b;
        width: 100%;
        height: 55px;
        margin-top: 0;
        margin-bottom: auto;
      }
      .header{
        text-align: center;
        }
        .headerimg{
            height: auto;
          width: 400px;    
        }
        .head strong{color:#CC0000;}
      @media (max-width: 1024px) {
        body {
        width: 90%;
      }
      }

      @media (max-width: 1000px) {
        .mobile{  
          display: block;
        }
        .desktop{
          display: none;
        }

        .icon{
          margin: 0;
          padding:10px;
        }
        .top{
          border-top: solid 1px;
        }
        .bottom{
          border-bottom: solid 1px;
        }
        .left{
          border-left: solid 1px;
        }
        .right{
          border-top: solid 1px;
        }
        .friend{
          padding-top: 10px;
        }
         .h3 {
          font-size: 20px;
        }
        body {
        width: 90%;}
        .headerimg{
            height: auto;
            width: 320px;    
        }     
           .headercontainer{
           height: 47px;
           }
        .head strong{color:#CC0000;}      
      }
      @media (max-width: 600px) {
        .top{
          margin-top: 20%
        }
        .icon{
          font-size: 15px;
          margin: 0;
          padding:10px 8px;
          width: 50%;
        }
        .icon img{
          width: 100px;
        } 
        .friend{
          padding-top: initial;
          font-size: 1.5rem;
          width: 50%;
        }
         .h3 {
          font-size: 15px;
        }
        body{
          width: 100%
        }
        .head strong{color:#CC0000;}

      }
        
    </style>
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="headercontainer">
    <div class="header"><img src="https://www.nyfa.edu/symptoms-tracking-mobile/images/symptom-tracker-mobile-header-200percent-m.png" class="headerimg"></div>
  </div>
   <div class="content">
      <center>
        <div class="row col-12 head" >
          <h1 class="h3 mb-3 font-weight-normal" style="padding:20px; margin:0 auto;" align="center">
          <?php echo $message; ?>
          </h1>
        </div>
        <div class="row col-12 head" >
          <h1 class="h3 mb-3 font-weight-normal" style="padding:0px 20px 20px 20px; margin:0 auto; color: #CC0000 !important;" align="center">
          If you have been FULLY VACCINATED, send a photo or scan of your vaccination card to 
          <?php
              if ($_SESSION['Location'] == "Los Angeles") {
                  echo "covidteamla@nyfa.edu.";
              }elseif ($_SESSION['Location'] == "South Beach") {
                  echo "covidteamsb@nyfa.edu.";
              }else{

                  echo "covidteamny@nyfa.edu.";
              }
          ?>
          </h1>
        </div>
        <div class="row col-12 desktop">
            <div class="col-4"><hr></div>
            <div class="col-4"><h3><b>Friendly Reminder</b></h3></div>
            <div class="col-4"><hr></div>
        </div>
        <div class="row col-lg-12 col-md-10 col-sm-12" style="width: 100%; text-align: center;">
          <div class=" friend right col-lg-2 col-md-6 col-sm-6 mobile ">
              <br>
              <b>Friendly<br> Reminder</b>
          </div>
             <div class="icon left top col-lg-2 col-md-6 col-sm-6 ">
            <img src="https://www.nyfa.edu/symptoms-tracking/images/vaccine-card-icon-m.png">
            <Br><Br>
            <b>Email Vax card to COVID Team</b>
          </div>
          <div class="icon left top col-lg-2 col-md-6 col-sm-6 ">
            <img src="https://www.nyfa.edu/symptoms-tracking/images/1-wash-hands-often-icon.png">
            <Br><Br>
            <b>Wash hands often</b>
          </div>
          <div class="icon right top col-lg-2 col-md-6 col-sm-6 ">
            <img src="https://www.nyfa.edu/symptoms-tracking/images/2-stay-6-fee-apart-icon.png">
            <br><Br>
            <b>Stay 6 feet apart</b>
          </div>
          <div class="icon left top col-lg-2 col-md-6 col-sm-6 ">
            <img src="https://www.nyfa.edu/symptoms-tracking/images/3-wear-a-mask-icon.png">
            <br><Br>
            <b>Wear a mask</b>
          </div>
          <div class="icon right top bottom col-lg-2 col-md-6 col-sm-6 ">
            <img src="https://www.nyfa.edu/symptoms-tracking/images/4-avoid-touching-face-icon.png">
            <br><Br>
            <b>Avoid touching face</b>
          </div>
          <div class="icon left bottom top col-lg-2 col-md-6 col-sm-6 ">
            <img src="https://www.nyfa.edu/symptoms-tracking/images/5-stay-home-when-sick-icon.png">
            <br><Br>
            <b>Stay home when sick </b>
          </div>
        </div>
        <div class="row col-12 desktop">
          <br>
            <hr style="width: 100%">
            <br><br><br> <p style="width: 100%">Web page redirects after 30 seconds.</p><br><br><br>
        </div>
           <script>
          setTimeout(function(){
          window.location.href = 'index.php';
          }, 30000);
          </script>
      
</center>
</div>
</body>
</html>
