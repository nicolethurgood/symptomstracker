<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Signin Template · Bootstrap</title>

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
      .padding{
        padding-right: 10px;
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
  <body class="" >
    <div class="form-symptoms" >
  <p class="h4 mb-3 font-weight-normal">Please check all of the symptoms noted below that you are presently experiencing and not caused by a known and diagnosed preexisting condition or chronic illness:</p>

  <div class="container">
    <div class="row">
      <label class="mb-3 padding col col1">Cough </label>
        <div class="custom-control custom-radio padding" >
        <input id="coughYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="coughYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="coughNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="coughNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">Difficulty Breathing/Shortness of Breath</label>
        <div class="custom-control custom-radio padding" >
        <input id="breathYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="breathYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="breathNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="breathNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">Fever (above 99.5)</label>
        <div class="custom-control custom-radio padding" >
        <input id="feverYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="feverYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="feverNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="feverNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">Chills</label>
        <div class="custom-control custom-radio padding" >
        <input id="chillsYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="chillsYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="chillsNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="chillsNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">Fatigue (unexplained)</label>
        <div class="custom-control custom-radio padding" >
        <input id="fatigueYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="fatigueYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="fatigueNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="fatigueNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">Muscle or Body Aches</label>
        <div class="custom-control custom-radio padding" >
        <input id="achesYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="achesYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="achesNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="achesNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">Headache</label>
        <div class="custom-control custom-radio padding" >
        <input id="headacheYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="headacheYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="headacheNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="headacheNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">New Loss of Taste or Smell</label>
        <div class="custom-control custom-radio padding" >
        <input id="lossYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="lossYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="lossNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="lossNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">Sore Throat</label>
        <div class="custom-control custom-radio padding" >
        <input id="throatYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="throatYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="throatNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="throatNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">Congestion or Runny Nose</label>
        <div class="custom-control custom-radio padding" >
        <input id="congestionYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="congestionYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="congestionNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="congestionNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">Diarrhea</label>
        <div class="custom-control custom-radio padding" >
        <input id="diarrheaYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="diarrheaYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="diarrheaNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="diarrheaNo">No</label>
        </div>
    </div>
    <div class="row">
      <label class="mb-3 padding col col1">Nausea or Vomiting (unexplained)</label>
        <div class="custom-control custom-radio padding" >
        <input id="nauseaYes" name="symptoms" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="nauseaYes">Yes</label>
        </div>
        <div class="custom-control custom-radio padding">
        <input id="nauseaNo" name="symptoms" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="nauseaNo">No</label>
        </div>
    </div>

          
  </div>
        <br>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>

  </div>


</div>
</body>
</html>
