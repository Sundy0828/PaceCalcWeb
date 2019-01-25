<?php include("navbar.php");?>


  <h2>Pace Calculator</h2>
  <hr />
  <div class="row">
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

    <div id="splitTbl" class="col-sm-3 marginSM">
      <table id="myTable" class="table table-bordered table-hover table-dark table-responsive-sm">
        <thead>
          <tr>
            <th>Lap</th>
            <th>Time</th>
          </tr>
        </thead>
      </table>
    </div>

  </div>


<script>
$(document).ready(function(){
  var element = document.getElementById("calcActive");
  element.classList.add("active");
  getdUnit();
  getpdUnit();

  $('#distUnit').text(dUnit + "s");
  $('#perDist').text("Per " + pUnit);
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
  var pUnit = "Kilometer";

  // get seconds for calculations
  function getSeconds(hour, min, sec) {
    return (hour * 3600) + (min * 60) + sec;
  }
  // get distance convertion for calculations
  function ConvertDist(distType, dist) {
    if (dUnit != pdUnit) {
      if (distType == "Kilometer") {
        return dist * km_mile;
      }else {
        return dist / km_mile;
      }
    }else {
      return dist;
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
    var dist = ConvertDist(pdUnit, Dist);
    var sec = getSeconds(PHour, PMin, PSec);
    var result = calcTime(dist, sec);
    var time = getTime(result);

    // set values
    $('#THour').val(time[0]);
    $('#TMin').val(time[1]);
    $('#TSec').val(time[2]);
  }
  function distBtn() {
    getValues();
    var time = getSeconds(THour, TMin, TSec);
    var pace = getSeconds(PHour, PMin, PSec);
    var result = calcDist(time, pace);
    result = ConvertDist(dUnit, result);

    // set values
    $('#Dist').val(result);
  }
  function paceBtn() {
    getValues();
    var dist = ConvertDist(pdUnit, Dist);
    var sec = getSeconds(THour, TMin, TSec);
    var result = calcPace(sec, dist);
    var time = getTime(result);

    // set values
    $('#PHour').val(time[0]);
    $('#PMin').val(time[1]);
    $('#PSec').val(time[2]);
  }
  function splitBtn() {
    getValues();
    var cookie = getCookie("lapDist");
    var lapDist = 200;
    if (cookie !== "") {
      lapDist = checkValidNumber(cookie);
    }
    var dist = Dist;
    var sec = getSeconds(THour, TMin, TSec);

    var lapSplit = 0;
    if (dist > 0 && lapDist > 0) {
      lapSplit = Math.ceil((dist * 1000) / lapDist);
    }

    var lapSplitArr = [[],[]];
    if (lapSplit > 0) {
      for (var i = 1; i <= lapSplit; i++) {
        if (i != lapSplit) {
          lapSplitArr[0][i-1] = i * lapDist;
          lapSplitArr[1][i-1] = getTime(sec / (dist * 1000) * lapDist * i);
        }else {
          lapSplitArr[0][i-1] = dist * 1000;
          lapSplitArr[1][i-1] = getTime(sec);
        }
      }
    }
    setSplitTable(lapSplitArr);
  }
  function setSplitTable(arr) {
    var table = document.getElementById("myTable");
    for (var i = 0; i < arr[0].length; i++) {
      var row = table.insertRow(i+1);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var lapTime = arr[1][i];
      cell1.innerHTML = arr[0][i] + " meters";
      cell2.innerHTML = addZero(lapTime[0]) + ":" + addZero(lapTime[1]) + ":" + addZero(lapTime[2]);
    }
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
