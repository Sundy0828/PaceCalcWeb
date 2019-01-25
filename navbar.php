<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pace Calculator</title>
  <link rel="shortcut icon" href="images/logo.png" >
  <meta name="description" content="A pace calculator to find distance, time and/or pace using the other two.  It also had lap splits for the time and distance you want to run based on lap distance set in settings">
	<meta name="author" content="Jerrod Sunderland">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="site.css">
</head>
<body>

<div class="jumbotron text-center fakeimg rounded-0" style="margin-bottom:0; color: white;">
  <h1>Pace Calculator</h1>
  <p>Try me out!</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-5">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li id="calcActive" class="nav-item">
        <a class="nav-link" href="paceCalc.php">Pace Calculator</a>
      </li>
      <li id="settingsActive" class="nav-item">
        <a class="nav-link" href="settings.php">Settings</a>
      </li>
    </ul>
  </div>
</nav>
