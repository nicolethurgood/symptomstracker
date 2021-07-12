<?php
  include "config.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thank you | Symptoms Tracking</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body class="text-center">

    <?php

      $UserName = $_POST['sEmail'];
      $IDNumber = $_POST['idN'];
      $StudentID = $_POST['idS'];
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
      $Symptoms_Diarrhea = $_POST['symptoms12'];

      $sql = "INSERT INTO Symptoms(UserName, IDNumber, StudentID, Symptoms_Cough, Symptoms_Breath, Symptoms_Fever, Symptoms_Chills, Symptoms_Fatigue, Symptoms_Aches, Symptoms_Headache, Symptoms_LossTastSmell, Symptoms_SoreThroat, Symptoms_Congestion, Symptoms_Diarrhea, Symptoms_Nausea) VALUES (\"$UserName\", \"$IDNumber\", \"$StudentID\", \"$Symptoms_Cough\", \"$Symptoms_Breath\", \"$Symptoms_Fever\", \"$Symptoms_Chills\", \"$Symptoms_Fatigue\", \"$Symptoms_Aches\", \"$Symptoms_Headache\", \"$Symptoms_LossTastSmell\", \"$Symptoms_SoreThroat\", \"$Symptoms_Congestion\", \"$Symptoms_Diarrhea\", \"$Symptoms_Nausea\")";

      if ($con->query($sql) === TRUE) {

        // having Positive
        if($Symptoms_Cough == "No" && $Symptoms_Breath == "No" && $Symptoms_Fever == "No" && $Symptoms_Chills == "No" && $Symptoms_Fatigue == "No" && $Symptoms_Aches == "No" && $Symptoms_Headache == "No" && $Symptoms_LossTastSmell == "No" && $Symptoms_SoreThroat == "No" && $Symptoms_Congestion == "No" && $Symptoms_Diarrhea == "No" && $Symptoms_Diarrhea == "No"){
    ?>
          <h1 class="h3 mb-3 font-weight-normal" style="padding:20px; margin:0 auto;" align="center">You are cleared to enter the NYFA campus, please remember to follow all safety guidelines.</h1>
    <?php
          }else{
    ?>
          <h1 class="h3 mb-3 font-weight-normal" style="padding:20px; margin:0 auto;" align="center">You have a symptom that indicates you may have Covid-19. Please go to the nearest testing facility and get a Covid-19 test. Before returning to NYFA campus you will need to have confirmation of a negative test and you must be symptom free for at least 24 hours.</h1>
    
    <?php
          }

      } else {
        echo "System Error: please contact support@nyfa.edu";
      }

      $con->close();
    ?>
</body>
</html>
