<?php
session_start();

include "config.php";

if ($_SESSION['Location'] == "Los Angeles") {
    date_default_timezone_set('America/Los_Angeles');
}else if ($_SESSION['Location'] == "Florence, Italy") {
    date_default_timezone_set('Europe/Berlin');
}else{
    date_default_timezone_set('America/New_York');
}

$EntryID = $_SESSION['StudentID'];
$EntryDate = date("m/d/Y");

$sql_query3 = "select * from Symptoms where StudentID='".$EntryID."' and Date='".$EntryDate."'";
$result3 = mysqli_query($con,$sql_query3);
$row3 = mysqli_fetch_array($result3);
        
$_SESSION['Symptoms_Cough'] = $row3['Symptoms_Cough'];
$_SESSION['Symptoms_Breath'] = $row3['Symptoms_Breath'];
$_SESSION['Symptoms_Fever'] = $row3['Symptoms_Fever'];
$_SESSION['Symptoms_Chills'] = $row3['Symptoms_Chills'];
$_SESSION['Symptoms_Fatigue'] = $row3['Symptoms_Fatigue'];
$_SESSION['Symptoms_Aches'] = $row3['Symptoms_Aches'];
$_SESSION['Symptoms_Headache'] = $row3['Symptoms_Headache'];
$_SESSION['Symptoms_LossTastSmell'] = $row3['Symptoms_LossTastSmell'];
$_SESSION['Symptoms_SoreThroat'] = $row3['Symptoms_SoreThroat'];
$_SESSION['Symptoms_Congestion'] = $row3['Symptoms_Congestion'];
$_SESSION['Symptoms_Diarrhea'] = $row3['Symptoms_Diarrhea'];
$_SESSION['Symptoms_Nausea'] = $row3['Symptoms_Nausea'];
$_SESSION['Symptoms_Contacted'] = $row3['Symptoms_Contacted'];
$_SESSION['Symptoms_Traveled'] = $row3['Symptoms_Traveled'];
$_SESSION['Thermometer'] = $row3['Thermometer'];
$_SESSION['I_will_be'] = $row3['I_will_be'];

$testReq = $_SESSION['TestReq'];
$testCom = $_SESSION['TestComp'];

if ($testReq == "Yes" && $testCom == "No" && ($EntryDate == "06/07/2021" || $EntryDate == "06/08/2021" || $EntryDate == "06/09/2021" || $EntryDate == "06/10/2021")) {
   if ($_SESSION['Location'] == "Los Angeles"){
    $message = "<strong>You've been selected to take a COVID Test on campus today.<br>Please report to either R313 (Truffaut) at the Riverside building or the front desk on the first floor of the Barham building before 4pm.<br>Testing should take 5-10 minutes.</strong><br><br>";
  }elseif ($_SESSION['Location'] == "South Beach") {
    $message = "<strong>You've been selected to take a COVID Test on campus today.<br>Please report to Fellini Room before 4:00pm. Testing should take 5-10 minutes.</strong><br><br>";
  }else{
    $message = "<strong>You've been selected to take a COVID Test on campus today.<br>Please report to room 505 before 4:00pm. Testing should take 5-10 minutes.</strong><br><br>";
  }

}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Symptoms List | Symptoms Tracking</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.css?v=123" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      body{
        padding-top: 0 !important;
      }
      .padding{
        padding-right: 10px;
      }
      #inputtemp{
        width: 105px;
        padding: 5px;
        margin-bottom: 5px;
      }
      #temp{
        display: none;
      }
      #temp label{
        padding-left: 50%;
        padding-top: 6px;
      }
      .headercontainer{
        background-color: #26a32b;
        width: 100%;
        height: 55px;
        margin-top: 0;
      }
      .header{
        text-align: center;
        }
        .headerimg{
            height: auto;
          width: 400px;    
        }

      .text-primary strong{color: #CC0000;}

      @media (max-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        #temp label{
            padding-left: 35%;
          }
            .headerimg{
            height: auto;
            width: 320px;    
        }     
           .headercontainer{
           height: 47px;
           }   
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/style.css?v=123" rel="stylesheet">
  </head>
<body class=""  >
  <div class="headercontainer">
    <div class="header"><img src="https://www.nyfa.edu/symptoms-tracking-mobile/images/symptom-tracker-mobile-header-200percent-m.png" class="headerimg"></div>
</div>
    <div class="form-symptoms mt-0">
    <p class="h5 mb-3 font-weight-normal text-primary"><?php echo $message; ?></p>
    <p class="h5 mb-3 font-weight-normal text-primary">Symptoms log of <?php echo $EntryDate; ?>:</p>
      <div class="container">
        <div class="row">
          <label class="mb-2 padding col col1">Cough</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Cough'];
                ?>
            </div>
           
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Difficulty Breathing/Shortness of Breath</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Breath'];                
                ?>
            </div>
           
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Fever (above 100.4)</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Fever'];                 
                ?>
            </div>
           
        </div>
        <div class="row" id="temp">
          <label class="mb-2 padding col col1">Temperature:</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Thermometer'];
                ?>
            </div>
           
        </div>       
        <div class="row">
          <label class="mb-2 padding col col1">Chills</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Chills'];                 
                ?>
            </div>
           
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Fatigue (unexplained)</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Fatigue'];                 
                ?>
            </div>
           
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Muscle or Body Aches</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Aches'];                 
                ?>
            </div>
           
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Headache</label>
           <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Headache'];                 
                ?>
            </div>
           
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">New Loss of Taste or Smell</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_LossTastSmell'];                 
                ?>
            </div>
           
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Sore Throat</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_SoreThroat'];                 
                ?>
            </div>
           
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Congestion or Runny Nose (unexplained)</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Congestion'];                 
                ?>
            </div>
           
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Diarrhea</label>
           <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Diarrhea'];                
                ?>
            </div>
           
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Nausea or Vomiting (unexplained)</label>
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Nausea'];                 
                ?>
            </div>
           
        </div> 
        
      </div>
      <br>
      <p class="h5 mb-3 font-weight-normal text-primary">Have you been in contact in the past 10 days with anyone with suspected or confirmed COVID-19?</p>
       <div class="container">
        <div class="row" >
           <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Contacted'];                 
                ?>
            </div>
           
        </div><br>
        </div><p class="h5 mb-3 font-weight-normal text-primary">In the past 10 days, have you traveled internationally or arrived/returned  to campus from a location with high rates of coronavirus infection?</p>
       <div class="container">
        <div class="row" >
            <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['Symptoms_Traveled'];                 
                ?>
            </div>
        </div>
        </div><br>
        
        <p class="h5 mb-3 font-weight-normal text-primary">Today, I will be (choose one):</p>
        <div class="container">
        <div class="row">
              <div class="padding font-weight-bolder font-italic">
                <?php 
                    echo $_SESSION['I_will_be'];                 
                ?>
            </div>
        </div>
        </div> <br><br>

        <div class="container">
        <div class="row">
              <div class="padding">
               <p style="width: 100%">Web page redirects after 60 seconds.</p><br><br><br>
            </div>
        </div>
        </div><br>
        <script>
          setTimeout(function(){
          window.location.href = 'index.php';
          }, 60000);
          </script>

  </div>

</body>
</html>
