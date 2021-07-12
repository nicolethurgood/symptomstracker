<?php
  include "config.php";

$Name = "Yonghui Chen";
$UserName = "ychen@nyfa.edu";
$IDNumber = "NY14297";
$StudentID = "ny14297";
$Symptoms_Cough = "No";
$Symptoms_Breath = "No";
$Symptoms_Fever = "No";
$Symptoms_Chills = "No";
$Symptoms_Fatigue = "No";
$Symptoms_Aches = "No";
$Symptoms_Headache = "No";
$Symptoms_LossTastSmell = "No";
$Symptoms_SoreThroat = "No";
$Symptoms_Congestion = "No";
$Symptoms_Diarrhea = "No";
$Symptoms_Nausea = "No";
$Symptoms_Contacted = "No";
$Symptoms_Traveled = "No";
//delete
$Location = "New York City";

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
      $TemplateId = "20559639";
  }else{
      $Positive = "Yes";
      $TemplateId = "20559640";
  }

  $sql = "INSERT INTO Symptoms(UserName, IDNumber, StudentID, Location, Symptoms_Cough, Symptoms_Breath, Symptoms_Fever, Symptoms_Chills, Symptoms_Fatigue, Symptoms_Aches, Symptoms_Headache, Symptoms_LossTastSmell, Symptoms_SoreThroat, Symptoms_Congestion, Symptoms_Diarrhea, Symptoms_Nausea, Symptoms_Contacted, Symptoms_Traveled, Thermometer, I_will_be, Positive, Date, Time) VALUES (\"$UserName\", \"$IDNumber\", \"$StudentID\", \"$Location\", \"$Symptoms_Cough\", \"$Symptoms_Breath\", \"$Symptoms_Fever\", \"$Symptoms_Chills\", \"$Symptoms_Fatigue\", \"$Symptoms_Aches\", \"$Symptoms_Headache\", \"$Symptoms_LossTastSmell\", \"$Symptoms_SoreThroat\", \"$Symptoms_Congestion\", \"$Symptoms_Diarrhea\", \"$Symptoms_Nausea\", \"$Symptoms_Contacted\", \"$Symptoms_Traveled\",\"$Thermometer\",\"$I_will_be\", \"$Positive\", \"$Date\", \"$TimeS\")";

  if ($_SESSION['import'] == "Yes") {
        
        if($Positive == "No"){
            $_SESSION['message'] = $message = "<b>" . $UserName . " (" . $IDNumber . ")" . " is cleared to enter NYFA campus for TODAY (" . $Date . ").</b><br><br> Remember to complete the symptom tracker the morning of the day you are again scheduled to be on campus.<br><br><span class='mobile'>Web page redirects after 30 seconds.</span>";
        }else{
             $message = "<b>Thank you for reporting your symptoms. <br><br>You may not enter campus. </b><br><br>  Please get tested for COVID-19 at local testing site. Testing sites locations are noted in the Guidelines for Self- Isolation <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-quarantine-self-isolation-guidelines.pdf\">document</a>. To care for yourself and others, please carefully read and follow all guidelines noted in the <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-isolation-guidelines.pdf\">document</a>.<br><br><span class='mobile'>Web page redirects after 30 seconds.</span>";
        }

  }else{

      if ($UserName != ""){
        
        $result = $con->query($sql);
        if ($result === TRUE) {
          $_SESSION['import'] = "Yes";

          if($Positive == "No"){
              $_SESSION['message'] = $message = "<b>" . $UserName . " (" . $IDNumber . ")" . " is cleared to enter NYFA campus for TODAY(" . $Date . "). </b><br><br> Remember to complete the symptom tracker the morning of the day you are again scheduled to be on campus.<br><br><span class='mobile'>Web page redirects after 30 seconds.</span>";
          }else{
              $_SESSION['message'] = $message = "<b>Thank you for reporting your symptoms.<br><br> You may not enter campus.</b><br><br>  Please get tested for COVID-19 at local testing site. Testing sites locations are noted in the Guidelines for Self- Isolation <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-quarantine-self-isolation-guidelines.pdf\">document</a>. To care for yourself and others, please carefully read and follow all guidelines noted in the <a href=\"https://www.nyfa.edu/downloads/pdf/NYFA-self-quarantine-self-isolation-guidelines.pdf\">document</a>.<br><br><span class='mobile'>Web page redirects after 30 seconds.</span>";
          }

        } else {
          $_SESSION['message'] = $message = "System Error: please contact support@nyfa.edu";
        }

      }
  }

// sql to get tracker login count
$sql4 = "select * from TrackerCounts WHERE Campus=\"$Location\"";
// get tracker login count
$result4 = $con->query($sql4);
$row4 = mysqli_fetch_array($result4);
$TrackerCount = $row4['Count'];
$DailayTotal = $row4['DailyTotal'];

// sql to assign user to be test
$sql2 = "UPDATE Users SET TestReq = 'Yes', TestReqDate = \"$Date\" WHERE UserName=\"$UserName\"";


// assign NY user to be test
if ($testReq == "No" && $EXEMPT == "No" && $TrackerCount <= $DailayTotal && $Location == "New York City" && $I_will_be == "On-Campus" && ($Date == "04/27/2021" || $Date == "04/28/2021" || $Date == "04/29/2021")) {
 
  // assign user to be test
  $result2 = $con->query($sql2);

  if ($result2 === TRUE) {
  //if ($TrackerCount !="") {
    $testReq = "Yes";
    $TrackerCount = $TrackerCount + 1;

    // sql to update tracker login count
    $sql3 = "UPDATE TrackerCounts SET Count = \"$TrackerCount\" WHERE Campus=\"$Location\"";
    // update tracker login count
    $result3 = $con->query($sql3);

  }
}

// assign South Beach user to be test
if ($testReq == "No" && $EXEMPT == "No" && $TrackerCount <= $DailayTotal && $Location == "South Beach" && $I_will_be == "On-Campus" && ($Date == "04/26/2021" || $Date == "04/27/2021" || $Date == "04/28/2021")) {
 
  // assign user to be test
  $result2 = $con->query($sql2);
  
  if ($result2 === TRUE) {
  //if ($TrackerCount !="") {
    $testReq = "Yes";
    $TrackerCount = $TrackerCount + 1;

    // sql to update tracker login count
    $sql3 = "UPDATE TrackerCounts SET Count = \"$TrackerCount\" WHERE Campus=\"$Location\"";
    
    // update tracker login count
    $result3 = $con->query($sql3);
  }
}

// assign Los Angeles user to be test
if ($testReq == "No" && $EXEMPT == "No" && $TrackerCount <= $DailayTotal && $Location == "Los Angeles" && $I_will_be == "On-Campus" && ($Date == "04/26/2021" || $Date == "04/29/2021")) {
 
  // assign user to be test
  $result2 = $con->query($sql2);
  
  if ($result2 === TRUE) {
  //if ($TrackerCount !="") {
    $testReq = "Yes";
    $TrackerCount = $TrackerCount + 1;

    // sql to update tracker login count
    $sql3 = "UPDATE TrackerCounts SET Count = \"$TrackerCount\" WHERE Campus=\"$Location\"";
    
    // update tracker login count
    $result3 = $con->query($sql3);
  }
}
//delete
$testReq = "Yes";

if ($Positive == "No" && $testReq == "Yes" && $testCom == "No" && $I_will_be == "On-Campus" && ($Date == "04/26/2021" || $Date == "04/27/2021" || $Date == "04/28/2021" || $Date == "04/29/2021")) {
  if ($Location == "Los Angeles"){
    $_SESSION['message'] = $message = "<strong>You've been selected to take a COVID Test on campus today.<br>Please report to either R313 (Truffaut) at the Riverside building or the front desk on the first floor of the Barham building before 4pm.<br>Testing should take 5-10 minutes.</strong><br><br>" . $message;
    $TestMessage = "You've been selected to take a COVID Test on campus today. Please report to either R313 (Truffaut) at the Riverside building or the front desk on the first floor of the Barham building before 4pm. Testing should take 5-10 minutes.";
  }elseif ($Location == "South Beach"){
    $_SESSION['message'] = $message = "<strong>You've been selected to take a COVID Test on campus today.<br>Please report to Fellini Room before 4:00pm.<br>Testing should take 5-10 minutes.</strong><br><br>" . $message;
    $TestMessage = "You've been selected to take a COVID Test on campus today. Please report to Fellini Room before 4:00pm. Testing should take 5-10 minutes.";
  }else{
    $_SESSION['message'] = $message = "<strong>You've been selected to take a COVID Test on campus today.<br>Please report to room 505 before 4:00pm.<br>Testing should take 5-10 minutes.</strong><br><br>" . $message;
    $TestMessage = "You've been selected to take a COVID Test on campus today. Please report to room 505 before 4:00pm. Testing should take 5-10 minutes.";
  }
}

// data for email confirmation
if ($Location == "Los Angeles") {
  $ReplyTo = "covidteamla@nyfa.edu";
  $VaccMessage = "If you have been FULLY VACCINATED, send a photo or scan of your vaccination card to covidteamla@nyfa.edu";

}elseif ($Location == "South Beach") {
  $ReplyTo = "covidteamsb@nyfa.edu";
  $VaccMessage = "If you have been FULLY VACCINATED, send a photo or scan of your vaccination card to covidteamsb@nyfa.edu";
}else{
  $ReplyTo = "covidteamny@nyfa.edu";
  $VaccMessage = "If you have been FULLY VACCINATED, send a photo or scan of your vaccination card to covidteamny@nyfa.edu";
}

include("emailConfirmation.php");

?>
