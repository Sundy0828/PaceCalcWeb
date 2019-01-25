

<div class="jumbotron text-center mt-5" style="margin-bottom:0">
  <p>Pace Calculator</p>
</div>

<script>
// km to mile conversion
var km_mile = 1.60934;

function checkValidNumber(value) {
  var float = parseFloat(value);
  if (isNaN(float)) {
    return 0;
  }else {
    if (float < 0) {
      return 0;
    }else {
      return float;
    }
  }
}
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
</script>

</body>
</html>
