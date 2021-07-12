<?php
  include "config.php";

  if (!isset($_SESSION['uname'])) {
    header("Location: index.php");
  }

  $UserName = $_POST['sEmail'];
  $IDNumber = $_POST['idN'];
  $StudentID = $_POST['idS'];
  $Location = $_POST['sLocation'];
  $testReq = $_POST['sTestReq'];
  $testCom = $_POST['sTestComp'];
  $Symptoms_Cough = $_POST['symptoms1'];
  $Symptoms_Breath = $_POST['symptoms2'];
  $Symptoms_Fever = $_POST['symptoms3'];
  $Symptoms_Chills = $_POST['symptoms4'];
  $Symptoms_Fatigue = $_POST['symptoms5'];
  $Symptoms_Aches = $_POST['symptoms6'];
  $Symptoms_Headache = $_POST['symptoms7'];
  $Symptoms_LossTastSmell = $_POST['symptoms8'];
  $Symptoms_SoreThroat = $_POST['symptoms9'];
  $Symptoms_Congestion = $_POST['symptoms10'];
  $Symptoms_Diarrhea = $_POST['symptoms11'];
  $Symptoms_Nausea = $_POST['symptoms12'];
  $Symptoms_Contacted = $_POST['symptoms13'];
  $Symptoms_Traveled = $_POST['symptoms14'];
  $Thermometer = $_POST['symptoms3a'];
  $I_will_be = $_POST['reason'];

  if ($Location == "Los Angeles") {
    date_default_timezone_set('America/Los_Angeles');
  }else if ($Location == "Florence, Italy") {
    date_default_timezone_set('Europe/Berlin');
  }else{
    date_default_timezone_set('America/New_York');
  }
  $Date = date("m/d/Y");
  $TimeS = date("Y-m-d h:i:s A");

  if($Symptoms_Cough == "No" && $Symptoms_Breath == "No" && $Symptoms_Fever == "No" && $Symptoms_Chills == "No" && $Symptoms_Fatigue == "No" && $Symptoms_Aches == "No" && $Symptoms_Headache == "No" && $Symptoms_LossTastSmell == "No" && $Symptoms_SoreThroat == "No" && $Symptoms_Congestion == "No" && $Symptoms_Diarrhea == "No" && $Symptoms_Nausea == "No" && $Symptoms_Contacted == "No" && $Symptoms_Traveled == "No"){
      $Positive = "No";
  }else{
      $Positive = "Yes";
  }

  $sql = "INSERT INTO Symptoms(UserName, IDNumber, StudentID, Location, Symptoms_Cough, Symptoms_Breath, Symptoms_Fever, Symptoms_Chills, Symptoms_Fatigue, Symptoms_Aches, Symptoms_Headache, Symptoms_LossTastSmell, Symptoms_SoreThroat, Symptoms_Congestion, Symptoms_Diarrhea, Symptoms_Nausea, Symptoms_Contacted, Symptoms_Traveled, Thermometer, I_will_be, Positive, Date, Time) VALUES (\"$UserName\", \"$IDNumber\", \"$StudentID\", \"$Location\", \"$Symptoms_Cough\", \"$Symptoms_Breath\", \"$Symptoms_Fever\", \"$Symptoms_Chills\", \"$Symptoms_Fatigue\", \"$Symptoms_Aches\", \"$Symptoms_Headache\", \"$Symptoms_LossTastSmell\", \"$Symptoms_SoreThroat\", \"$Symptoms_Congestion\", \"$Symptoms_Diarrhea\", \"$Symptoms_Nausea\", \"$Symptoms_Contacted\", \"$Symptoms_Traveled\",\"$Thermometer\",\"$I_will_be\", \"$Positive\", \"$Date\", \"$TimeS\")";

  if ($_SESSION['import'] == "Yes") {
        
        if($Positive == "No"){
            $message = "<b>" . $UserName . " (" . $IDNumber . ")" . " is cleared to enter NYFA campus for TODAY (" . $Date . ").</b><br><br> Remember to complete the symptom tracker the morning of the day you are again scheduled to be on campus.<br><br><span class='mobile'>Web page redirects after 30 seconds.</span>";
        }else{
             $message = "<b>Thank you for reporting your symptoms. <br><br>You may not enter campus. </b><br><br>  Please get tested for COVID-19 at local testing site. Testing sites locations are noted in the Guidelines for Self- Isolation <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-quarantine-self-isolation-guidelines.pdf\">document</a>. To care for yourself and others, please carefully read and follow all guidelines noted in the <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-isolation-guidelines.pdf\">document</a>.<br><br><span class='mobile'>Web page redirects after 30 seconds.</span>";
        }

  }else{

      if ($UserName != ""){
        
        $result = $con->query($sql);
        if ($result === TRUE) {
          $_SESSION['import'] = "Yes";

          if($Positive == "No"){
              $message = "<b>" . $UserName . " (" . $IDNumber . ")" . " is cleared to enter NYFA campus for TODAY(" . $Date . "). </b><br><br> Remember to complete the symptom tracker the morning of the day you are again scheduled to be on campus.<br><br><span class='mobile'>Web page redirects after 30 seconds.</span>";
          }else{
              $message = "<b>Thank you for reporting your symptoms.<br><br> You may not enter campus.</b><br><br>  Please get tested for COVID-19 at local testing site. Testing sites locations are noted in the Guidelines for Self- Isolation <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-quarantine-self-isolation-guidelines.pdf\">document</a>. To care for yourself and others, please carefully read and follow all guidelines noted in the <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-quarantine-self-isolation-guidelines.pdf\">document</a>.<br><br><span class='mobile'>Web page redirects after 30 seconds.</span>";
          }

        } else {
          $message = "System Error: please contact support@nyfa.edu";
        }

      }
  }

if ($Positive == "No" && $testReq == "Yes" && $testCom == "No" && ($Date == "02/05/2021" || $Date == "02/09/2021" || $Date == "02/11/2021")) {
  if ($Location == "Los Angeles"){
    $message;
  }elseif ($Location == "South Beach") {
    $message = "<strong>You've been selected to take a COVID Test on campus today.<br>Please report to Fellini Room before 3:30pm.<br>Testing should take 5 minutes.</strong><br><br>" . $message;
  }else{
    $message = "<strong>You've been selected to take a COVID Test on campus today.<br>Please report to room 505 before 3:30pm.<br>Testing should take 5 minutes.</strong><br><br>" . $message;
  }
}

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
