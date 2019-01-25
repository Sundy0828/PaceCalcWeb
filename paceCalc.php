<?php include("navbar.php");?>


  <h2>Pace Calculator</h2>
  <hr />
  <div class="row">

    <div class="col-sm-3"></div>

    <div class="col-sm-9">

        <div class="row">
          <div class="col-4">
            <h3>Time</h3>
          </div>
          <div class="col-8">
            <div class="clearfix">
                <span class="float-right"><button class="btn btn-primary" onclick="timeBtn()"><i class="fas fa-calculator"></i>  Calculate Time</button></span>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-4">
            <h4>Hours</h4>
            <input id="THour" type="number" class="form-control" maxlength="2"/>
          </div>
          <div class="col-4">
            <h4>Minutes</h4>
            <input id="TMin" type="number" class="form-control" maxlength="2"/>
          </div>
          <div class="col-4">
            <h4>Seconds</h4>
            <input id="TSec" type="number" class="form-control" maxlength="6"/>
          </div>
        </div>

        <hr />

        <div class="row">
          <div class="col-4">
            <h3>Distance</h3>
          </div>
          <div class="col-8">
            <div class="clearfix">
                <span class="float-right"><button class="btn btn-primary" onclick="distBtn()"><i class="fas fa-calculator"></i>  Calculate Distance</button></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h4 id="distUnit">Kilometers</h4>
            <input id="Dist" type="number" class="form-control" maxlength="6"/>
          </div>
        </div>

        <hr />

        <div class="row">
          <div class="col-4">
            <h3>Pace</h3>
          </div>
          <div class="col-8">
            <div class="clearfix">
                <span class="float-right"><button class="btn btn-primary" onclick="paceBtn()"><i class="fas fa-calculator"></i>  Calculate Pace</button></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <h4>Hours</h4>
            <input id="PHour" type="number" class="form-control" maxlength="2"/>
          </div>
          <div class="col-4">
            <h4>Minutes</h4>
            <input id="PMin" type="number" class="form-control" maxlength="2"/>
          </div>
          <div class="col-4">
            <h4>Seconds</h4>
            <input id="PSec" type="number" class="form-control" maxlength="6"/>
            <div class="clearfix">
                <span class="float-right"><h5 id="perDist">Per Kilometer<h5></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <hr />
            <hr />
            <div class="clearfix">
                <span class="float-right"><button class="btn btn-primary" onclick="splitBtn()"><i class="fas fa-calculator"></i>  Calculate Splits</button></span>
            </div>
          </div>
        </div>
    </div>

  </div>


<script>
$(document).ready(function(){
  var element = document.getElementById("calcActive");
  element.classList.add("active");
  getdUnit();
  getpdUnit();

  $('#distUnit').text(dUnit + "s");
  $('#perDist').text("Per " + pdUnit);
});

  // variables from inputs
  var THour = 0;
  var TMin = 0;
  var TSec = 0;

  var Dist = 0;

  var PHour = 0;
  var PMin = 0;
  var PSec = 0;

  var dUnit = "Kilometer";
  var pdUnit = "Kilometer";

  // get seconds for calculations
  function getSeconds(hour, min, sec) {
    return (hour * 3600) + (min * 60) + sec;
  }

  // convert distance to meter
  function convertToMD(distType, dist) {
    switch(distType) {
      case "Kilometer":
        // code block
        return dist * 1000;
      case "Mile":
        // code block
        return dist * (km_mile * 1000);
      default:
        // code block
        return dist;
    }
  }
  // convert distance from meter
  function convertFromMD(distType, dist) {
    switch(distType) {
      case "Kilometer":
        // code block
        return dist / 1000;
      case "Mile":
        // code block
        return dist / (km_mile * 1000);
      default:
        // code block
        return dist;
    }
  }

  function convertToMP(distType, sec) {
    switch(distType) {
      case "Kilometer":
        // code block
        return sec / 1000;
      case "Mile":
        // code block
        return sec / (km_mile * 1000);
      default:
        // code block
        return sec;
    }
  }
  function convertFromMP(distType, sec) {
    switch(distType) {
      case "Kilometer":
        // code block
        return sec * 1000;
      case "Mile":
        // code block
        return sec * (km_mile * 1000);
      default:
        // code block
        return sec;
    }
  }

  // get time from sec
  function getTime(seconds) {
    var hour = 0;
    var min = 0;
    var sec = 0;
    var temp = seconds;

    if (temp >= 3600) {
      hour = parseInt(temp / 3600);
      temp = temp - (hour * 3600);
    }
    if (temp >= 60) {
      min = parseInt(temp / 60);
      temp = temp - (min * 60);
    }
    sec = temp;

    return [hour, min, sec];
  }
  function getdUnit() {
    var cookie = getCookie("dUnit");
    if (cookie !== "") {
      dUnit = cookie;
    }
  }
  function getpdUnit() {
    var cookie = getCookie("pdUnit");
    if (cookie !== "") {
      pdUnit = cookie;
    }
  }

  // calculate for time, dist, or pace
  function calcTime(dist, pace) {
    return dist * pace;
  }
  function calcDist(time, pace) {
    if (pace == 0) {
      alert("Pace must be a valid number above zero!")
    }else {
      return time / pace;
    }
  }
  function calcPace(time, dist) {
    if (dist == 0) {
      alert("Distance must be a valid number above zero!")
    }else {
      return time / dist;
    }
  }

  // get values from inputs
  function getValues() {
    THour = checkValidNumber($('#THour').val());
    TMin = checkValidNumber($('#TMin').val());
    TSec = checkValidNumber($('#TSec').val());

    Dist = checkValidNumber($('#Dist').val());

    PHour = checkValidNumber($('#PHour').val());
    PMin = checkValidNumber($('#PMin').val());
    PSec = checkValidNumber($('#PSec').val());
  }

  // on calculate btn click
  function timeBtn() {
    getValues();
    var distM = convertToMD(dUnit, Dist);
    //var dist = ConvertDist(pdUnit, Dist);
    var sec = getSeconds(PHour, PMin, PSec);
    var secM = convertToMP(pdUnit, sec);
    var result = calcTime(distM, secM);
    var time = getTime(result);

    // set values
    $('#THour').val(addZero(time[0]));
    $('#TMin').val(addZero(time[1]));
    $('#TSec').val(addZero(time[2]));
  }
  function distBtn() {
    getValues();
    var time = getSeconds(THour, TMin, TSec);
    var pace = getSeconds(PHour, PMin, PSec);
    var paceM = convertToMP(pdUnit, pace);
    var result = calcDist(time, paceM);
    result = convertFromMD(dUnit, result);

    // set values
    $('#Dist').val(result);
  }
  function paceBtn() {
    getValues();
    var dist = convertToMD(dUnit, Dist);
    var sec = getSeconds(THour, TMin, TSec);
    var result = calcPace(sec, dist);
    result = convertFromMP(pdUnit, result);
    var time = getTime(result);


    // set values
    $('#PHour').val(addZero(time[0]));
    $('#PMin').val(addZero(time[1]));
    $('#PSec').val(addZero(time[2]));
  }
  function splitBtn() {
    getValues();
    var cookie = getCookie("lapDist");
    var lapDist = 200;
    if (cookie !== "") {
      lapDist = checkValidNumber(cookie);
    }
    var dist = convertToMD(dUnit, Dist);
    var sec = getSeconds(THour, TMin, TSec);

    var lapSplit = 0;
    if (dist > 0 && lapDist > 0) {
      lapSplit = Math.ceil((dist) / lapDist);
    }

    var lapSplitArr = [[],[]];
    if (lapSplit > 0) {
      for (var i = 1; i <= lapSplit; i++) {
        if (i != lapSplit) {
          lapSplitArr[0][i-1] = i * lapDist;
          lapSplitArr[1][i-1] = getTime(sec / (dist) * lapDist * i);
        }else {
          lapSplitArr[0][i-1] = dist;
          lapSplitArr[1][i-1] = getTime(sec);
        }
      }
    }
    window.localStorage.setItem('myArray', JSON.stringify(lapSplitArr));
    var myArray = sessionStorage.getItem('myArray');
    
    location.href = "Lapsplits.php";
  }
  function addZero(val) {
    var zero = "";
    if (val < 10) {
      zero = "0";
    }
    return zero + val;
  }
</script>

<?php include("footer.php");?>
