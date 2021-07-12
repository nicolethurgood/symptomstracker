<?php
session_start();

// if (!isset($_SESSION['uname'])) {
//     header("Location: index.php");
// }
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
      @media (max-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        #temp label{
            padding-left: 35%;
          }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/style.css?v=123" rel="stylesheet">
  </head>
<body class="pt-1"  >
    <div class="form-symptoms mt-0">
    <p class="h5 mb-3 font-weight-normal text-primary">Please check all of the symptoms noted below that you are presently experiencing and not caused by a known and diagnosed preexisting condition or chronic illness:</p>

    <form action="thank-you.php" method="POST">
        <input type="hidden" name="sEmail" id="sEmail" value="<? echo $_SESSION['uname']; ?>" >
        <input type="hidden" name="idN" id="idN" value="<? echo $_SESSION['IDNumber']; ?>" >
        <input type="hidden" name="idS" id="idS" value="<? echo $_SESSION['StudentID']; ?>" >
        <input type="hidden" name="sLocation" id="sLocation" value="<? echo $_SESSION['Location']; ?>" >
      <div class="container">
        <div class="row">
          <label class="mb-2 padding col col1">Cough</label>
            <div class="custom-control custom-radio padding" >
            <input id="coughYes" name="symptoms1" type="radio" class="custom-control-input" value="Yes" required >
            <label class="custom-control-label" for="coughYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="coughNo" name="symptoms1" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="coughNo">No</label>
            </div>
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Difficulty Breathing/Shortness of Breath</label>
            <div class="custom-control custom-radio padding" >
            <input id="breathYes" name="symptoms2" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="breathYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="breathNo" name="symptoms2" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="breathNo">No</label>
            </div>
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Fever (above 99.5)</label>
            <div class="custom-control custom-radio padding" >
            <input id="feverYes" name="symptoms3" type="radio" class="custom-control-input" value="Yes" required onclick="fever();">
            <label class="custom-control-label" for="feverYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="feverNo" name="symptoms3" type="radio" class="custom-control-input" value="No" required onclick="fever();">
            <label class="custom-control-label" for="feverNo" >No</label>
            </div>
        </div>
        <div class="row" id="temp">
          <label class="mb-2 padding col col1">Temperature:</label>
            <div class="custom-control custom-radio padding text-left" >
            <input type="number" id="inputtemp" name="symptoms3a" class="form-control" placeholder="98.6" step=".01">
            </div>
        </div>       
        <div class="row">
          <label class="mb-2 padding col col1">Chills</label>
            <div class="custom-control custom-radio padding" >
            <input id="chillsYes" name="symptoms4" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="chillsYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="chillsNo" name="symptoms4" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="chillsNo">No</label>
            </div>
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Fatigue (unexplained)</label>
            <div class="custom-control custom-radio padding" >
            <input id="fatigueYes" name="symptoms5" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="fatigueYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="fatigueNo" name="symptoms5" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="fatigueNo">No</label>
            </div>
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Muscle or Body Aches</label>
            <div class="custom-control custom-radio padding" >
            <input id="achesYes" name="symptoms6" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="achesYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="achesNo" name="symptoms6" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="achesNo">No</label>
            </div>
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Headache</label>
            <div class="custom-control custom-radio padding" >
            <input id="headacheYes" name="symptoms7" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="headacheYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="headacheNo" name="symptoms7" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="headacheNo">No</label>
            </div>
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">New Loss of Taste or Smell</label>
            <div class="custom-control custom-radio padding" >
            <input id="lossYes" name="symptoms8" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="lossYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="lossNo" name="symptoms8" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="lossNo">No</label>
            </div>
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Sore Throat</label>
            <div class="custom-control custom-radio padding" >
            <input id="throatYes" name="symptoms9" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="throatYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="throatNo" name="symptoms9" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="throatNo">No</label>
            </div>
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Congestion or Runny Nose (unexplained)</label>
            <div class="custom-control custom-radio padding" >
            <input id="congestionYes" name="symptoms10" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="congestionYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="congestionNo" name="symptoms10" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="congestionNo">No</label>
            </div>
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Diarrhea</label>
            <div class="custom-control custom-radio padding" >
            <input id="diarrheaYes" name="symptoms11" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="diarrheaYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="diarrheaNo" name="symptoms11" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="diarrheaNo">No</label>
            </div>
        </div>
        <div class="row">
          <label class="mb-2 padding col col1">Nausea or Vomiting (unexplained)</label>
            <div class="custom-control custom-radio padding" >
            <input id="nauseaYes" name="symptoms12" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="nauseaYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding">
            <input id="nauseaNo" name="symptoms12" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="nauseaNo">No</label>
            </div>
        </div> 
        
      </div>
      <br>
      <p class="h5 mb-3 font-weight-normal text-primary">Have you been in contact in the past 14 days with anyone with suspected or confirmed COVID-19?</p>
       <div class="container">
        <div class="row" >
            <div class="custom-control custom-radio padding col col1 " >
            <input id="contactYes" name="symptoms13" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="contactYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding col col1 ">
            <input id="contactNo" name="symptoms13" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="contactNo">No</label>
            </div>
        </div><br>
        </div><p class="h5 mb-3 font-weight-normal text-primary">In the past 14 days, have you traveled internationally or arrived/returned  to campus from a location with high rates of coronavirus infection?</p>
       <div class="container">
        <div class="row" >
            <div class="custom-control custom-radio padding col col1 " >
            <input id="travelYes" name="symptoms14" type="radio" class="custom-control-input" value="Yes" required>
            <label class="custom-control-label" for="travelYes">Yes</label>
            </div>
            <div class="custom-control custom-radio padding col col1 ">
            <input id="travelNo" name="symptoms14" type="radio" class="custom-control-input" value="No" required>
            <label class="custom-control-label" for="travelNo">No</label>
            </div>
        </div>
        </div><br>
        <div class="container">
        <div class="row">
          <label class="mb-2 padding h5 mb-3 font-weight-normal text-primary">Today, I will be (choose one):</label>
             <select class="form-control  " id="reason" name="reason" required>
                <option value="" disabled selected>Select One</option>
                <option value="On-Campus (Class or PW)">On-Campus (Class or PW)</option>
                <option value="Off-Campus (Class or PW)">Off-Campus (Class or PW)</option>
                <option value="Student-led Production (Off-campus)">Student-led Production (Off-campus)</option>
                <option value="Other">Other</option>
            </select>
        </div>
        </div> <br>

      By clicking submit, I am renewing my Pledge to Care for my NYFA Community and Comply with the COVID Safety Plan.<br><br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button><br><br>


      Source: <a href="https://www.cdc.gov/coronavirus/2019-ncov/symptoms-testing/symptoms.html">Centers for Disease Control and Prevention</a>
        <br><br>

    </form>
  </div>

</body>
<script type="text/javascript">
    function fever(){
        if(document.getElementById('feverYes').checked) {
            document.getElementById("temp").style.display = "flex";
            document.getElementById('inputtemp').setAttribute("required", "");
            document.getElementById('inputtemp').required = true;    
        } else if(document.getElementById('feverNo').checked) {
            document.getElementById("temp").style.display = "none";
            document.getElementById("inputtemp").removeAttribute("required");
        }
    }

</script>
</html>
