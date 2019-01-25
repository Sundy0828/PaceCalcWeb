<?php include("navbar.php");?>


  <h2>Pace Calculator</h2>
  <hr />
  <div class="row">

    <div class="col-sm-3">
      <button class="btn btn-primary" onclick='location.href = "paceCalc.php";'><i class="fas fa-chevron-left"></i> Back to Pace Calculator</button>
    </div>

    <div id="splitTbl" class="col-sm-9 marginSM">

      <table id="myTable" class="table table-bordered table-hover table-dark">
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
  var myArray = JSON.parse(window.localStorage.getItem("myArray"));
  setSplitTable(myArray);
});

  function setSplitTable(arr) {
    var table = document.getElementById("myTable");
    for (var i = 0; i < arr[0].length; i++) {
      var row = table.insertRow(i+1);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var lapTime = arr[1][i];
      cell1.innerHTML = Math.round(parseFloat(arr[0][i])) + " meters";
      cell2.innerHTML = addZero(lapTime[0]) + ":" + addZero(lapTime[1]) + ":" + addZero(lapTime[2]).substring(0,4);
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
