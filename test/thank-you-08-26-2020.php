<?php
  include "config.php";

  if (!isset($_SESSION['uname'])) {
    header("Location: index.php");
  }

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
  $Symptoms_Nausea = $_POST['symptoms12'];
  $Symptoms_Contacted = $_POST['symptoms13'];
  $Thermometer = $_POST['symptoms3a'];
  $Date = date("m/d/Y");

  if($Symptoms_Cough == "No" && $Symptoms_Breath == "No" && $Symptoms_Fever == "No" && $Symptoms_Chills == "No" && $Symptoms_Fatigue == "No" && $Symptoms_Aches == "No" && $Symptoms_Headache == "No" && $Symptoms_LossTastSmell == "No" && $Symptoms_SoreThroat == "No" && $Symptoms_Congestion == "No" && $Symptoms_Diarrhea == "No" && $Symptoms_Nausea == "No" && $Symptoms_Contacted == "No"){
      $Positive = "No";
  }else{
      $Positive = "Yes";
  }

  $sql = "INSERT INTO Symptoms(UserName, IDNumber, StudentID, Symptoms_Cough, Symptoms_Breath, Symptoms_Fever, Symptoms_Chills, Symptoms_Fatigue, Symptoms_Aches, Symptoms_Headache, Symptoms_LossTastSmell, Symptoms_SoreThroat, Symptoms_Congestion, Symptoms_Diarrhea, Symptoms_Nausea, Symptoms_Contacted, Thermometer, Positive, Date) VALUES (\"$UserName\", \"$IDNumber\", \"$StudentID\", \"$Symptoms_Cough\", \"$Symptoms_Breath\", \"$Symptoms_Fever\", \"$Symptoms_Chills\", \"$Symptoms_Fatigue\", \"$Symptoms_Aches\", \"$Symptoms_Headache\", \"$Symptoms_LossTastSmell\", \"$Symptoms_SoreThroat\", \"$Symptoms_Congestion\", \"$Symptoms_Diarrhea\", \"$Symptoms_Nausea\", \"$Symptoms_Contacted\",\"$Thermometer\", \"$Positive\", \"$Date\")";

  if ($_SESSION['import'] == "Yes") {
        
        if($Positive == "No"){
            $message = "You are cleared to enter NYFA campus for TODAY(" . $Date . "). Remember to complete the symptom tracker the morning of the day you are again scheduled to be on campus.<br><br>";
        }else{
            $message = "Thank you for reporting your symptoms. You may not enter campus. Please get tested for COVID-19 at local testing site. Testing sites locations are noted in the Guidelines for Self- Isolation <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-quarantine-self-isolation-guidelines.pdf\">document</a>. To care for yourself and others, please carefully read and follow all guidelines noted in the <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-quarantine-self-isolation-guidelines.pdf\">document</a>.<br><br>";
        }

  }else{

      if ($UserName != ""){
        
        $result = $con->query($sql);
        if ($result === TRUE) {
          $_SESSION['import'] = "Yes";

          if($Positive == "No"){
              $message = "You are cleared to enter NYFA campus for TODAY(" . $Date . "). Remember to complete the symptom tracker the morning of the day you are again scheduled to be on campus.<br><br>";
          }else{
              $message = "Thank you for reporting your symptoms. You may not enter campus. Please get tested for COVID-19 at local testing site. Testing sites locations are noted in the Guidelines for Self- Isolation <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-quarantine-self-isolation-guidelines.pdf\">document</a>. To care for yourself and others, please carefully read and follow all guidelines noted in the <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-quarantine-self-isolation-guidelines.pdf\">document</a>.<br><br>";
          }

        } else {
          $message = "System Error: please contact support@nyfa.edu";
        }

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
    <table width="100%">
      <tr>
        <td>
            <h1 class="h3 mb-3 font-weight-normal" style="padding:20px; margin:0 auto;" align="center"><?php echo $message; ?></h1>
        </td>
      </tr>
      <tr>
        <td>
            <script>
               setTimeout(function(){
                  window.location.href = 'index.php';
               }, 30000);
            </script>
            <p style="display:block;"> <br><br><br> Web page redirects after 30 seconds.</p>
        </td>
      </tr>
    </table>
    
   
    

</body>
</html>
