<?php include("navbar.php");?>

<div class="container">
  <h2>Settings</h2>
  <hr />
    <div class="row">
    	<div class="col-md-3">
          <div class="list-group" id="sidebar">
          	<a id="settingsBtn" href="#" class="list-group-item active">Settings</a>
			      <a id="convertKMBtn" href="#" class="list-group-item">Convert to KM</a>
            <a id="convertMBtn" href="#" class="list-group-item">Convert to Mile</a>
          </div>
        </div>
        <div class="col-md-6">


          <div id="settings">
            <div class="row">
              <div class="col-md-12">
                  <h4>Track Size (meters)</h4>
                  <input id="trackSize" type="number" class="form-control" value="200">
              </div>
              <div class="col-md-12">
                  <h4>Distance Units</h4>
                  <select id="dUnit" class="form-control">
                    <option value="Kilometer">Kilometer</option>
                    <option value="Mile">Mile</option>
                  </select>
              </div>
              <div class="col-md-12">
                  <h4>Pace Distance Units</h4>
                  <select id="pdUnit" class="form-control">
                    <option value="Kilometer">Kilometer</option>
                    <option value="Mile">Mile</option>
                  </select>
              </div>
              <div class="col-md-12" style="margin-top:40px;">
                <div class="clearfix">
                    <span class="float-right"><button class="btn btn-primary" onclick="save()"><i class="fas fa-save"></i> Save Settings</button></span>
                </div>
              </div>
            </div>
          </div>



          <div id="convertM" style="display: none;">
            <div class="row">
              <div class="col-sm-6">
                <h4>Miles</h4>
                <input id="mileConvert" type="number" class="form-control"/>
              </div>
              <div class="col-sm-6">
                <div class="clearfix" style="margin-top: 40px;">
                    <span class="float-right"><h4 id="kmAnswer">0 Kilometers</h4></span>
                </div>
              </div>
            </div>
          </div>



          <div id="convertKM" style="display: none;">
            <div class="row">
              <div class="col-sm-6">
                <h4>Kilometers</h4>
                <input id="kmConvert" type="number" class="form-control"/>
              </div>
              <div class="col-sm-6">
                <div class="clearfix" style="margin-top: 40px;">
                    <span class="float-right"><h4 id="mileAnswer">0 Miles</h4></span>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

<script>
$(document).ready(function(){
  var element = document.getElementById("settingsActive");
  element.classList.add("active");

  var cookie = getCookie("lapDist");
  var lapDist = 200;
  if (cookie !== null) {
    lapDist = checkValidNumber(cookie);
  }
  var cookie2 = getCookie("dUnit");
  var convertM = "Kilometer";
  if (cookie2 !== null) {
    convertM = cookie2;
  }
  var cookie3 = getCookie("pdUnit");
  var convertKM = "Kilometer";
  if (cookie3 !== null) {
    convertKM = cookie3;
  }
  $('#trackSize').val(lapDist);
  $("#dUnit option[value='" + convertM + "']").attr("selected", "selected");
  $("#pdUnit option[value='" + convertKM + "']").attr("selected", "selected");

  $('#convertM').hide();
  $('#convertKM').hide();
});
$("#settingsBtn").click(function(){
  $('#settings').show();
  $('#convertM').hide();
  $('#convertKM').hide();

  setActive("settingsBtn","convertMBtn","convertKMBtn");
});
$("#convertMBtn").click(function(){
  $('#settings').hide();
  $('#convertM').show();
  $('#convertKM').hide();

  setActive("convertMBtn","convertKMBtn","settingsBtn");
});
$("#convertKMBtn").click(function(){
  $('#settings').hide();
  $('#convertM').hide();
  $('#convertKM').show();

  setActive("convertKMBtn","convertMBtn","settingsBtn");
});
$('#mileConvert').on('change', function() {
  var mile = checkValidNumber($('#mileConvert').val());
  var value = Number((mile * km_mile).toFixed(2)) + " Kilometers";
  $('#kmAnswer').text(value);
});
$('#kmConvert').on('change', function() {
  var km = checkValidNumber($('#kmConvert').val());
  var value = Number((km / km_mile).toFixed(2)) + " Miles";
  $('#mileAnswer').text(value);
});
function setActive(one, two, three) {
  var element = document.getElementById(one);
  element.classList.add("active");
  var element = document.getElementById(two);
  element.classList.remove("active");
  var element = document.getElementById(three);
  element.classList.remove("active");
}
function save() {
  var lapDist = checkValidNumber($('#trackSize').val());
  var dUnit = $('#dUnit').val();
  var pdUnit = $('#pdUnit').val();
  // 50 years
  setCookie("lapDist", lapDist, 18250);
  setCookie("dUnit", dUnit, 18250);
  setCookie("pdUnit", pdUnit, 18250);
}
</script>

<?php include("footer.php");?>
