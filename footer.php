</div>

<footer class="footer font-small text-light">
        <div class="row m-0 bg-light text-center">
            <div class="col-md-12 py-5">
                <!-- github -->
                <a class="fb-ic text-dark" style="text-decoration: none;" href="https://github.com/Sundy0828/PaceCalcWeb">
                    <i class="fab fa-github fa-lg mr-md-5 mr-3 fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="footer-copyright text-center bg-dark">
            Pace Calculator
        </div>
    </footer>

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
