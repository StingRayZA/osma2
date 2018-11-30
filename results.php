<!DOCTYPE html>
<html>
<head>
    <script src="js/Chart.bundle.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/raphael-2.1.4.min.js"></script>
    <script src="js/justgage.js"></script>
    <title>Open Source Maturity Assessment - Results</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="http://overpass-30e2.kxcdn.com/overpass.css"/>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"/>

<!--	<script src="js/jquery-1.10.2.js"></script>-->
<!--- <link rel="stylesheet" href="/resources/demos/style.css"> -->


</head>

<body>

  <nav class="navbar navbar-default" role="navigation">
  	<div class="container-fluid">
  		<div class="navbar-header">
  			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
  				<span class="sr-only">Toggle navigation</span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  			</button>
  			<a class="navbar-brand" href="index.php"><img src="images/innovate.png">  Open Source Maturity Assessment</a>
  		</div>
  		<div class="collapse navbar-collapse" id="navbar1">
  			<ul class="nav navbar-nav navbar-right">
  				<?php if (isset($_SESSION['usr_id'])) { ?>
  				<li><a href="assess.php">Run Assessment</a></li>
  				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
  				<li><a href="logout.php">Log Out</a></li>
  				<?php } else { ?>
  				<li><a href="register.php">Register</a></li>
  				<li><a href="login.php">Login</a></li>
  				<?php } ?>

  			</ul>
  		</div>
  	</div>
  </nav>
<?php
date_default_timezone_set("Europe/London");
## Connect to the Database
include 'dbconnect.php';
connectDB();

# Retrieve the data
$hash = $_REQUEST['hash'];
$qq = "SELECT * FROM data WHERE hash='".mysqli_real_escape_string($db, $hash)."'";
$res = mysqli_query($db, $qq);
$data_array = mysqli_fetch_assoc($res);
$area1 = $area2 = $area3 = $area4 = $area5 = 0;
$area1Total = $area2Total = $area3Total = $area4Total = $area5Total = 0;
$i = 1;

foreach ($data_array as $key => $value) {
	$regEx = "question";
	if (substr($key,0,8) == "question") {
		$area = substr($key,8,1);
		${'area' . $area . 'Total'}++;
		${'area' . $area} += $value;
	}
}

## Do a bit of maths

while ($i < 6) {
	$avg = ${'area' . $i} / ${'area' . $area . 'Total'};
	${'areaAvg' . $i} = $avg;
#print "Area $i average is $avg <br>";
$i++;
}

#print "$area1   $area2   $area3 <br>";

 ?>
      <div id="wrapper">
      <header>

      <center>
      <h2>Open Source Maturity Assessment for <?php echo $data_array['client']; ?></h2>
      </center>
      </header>
      <div class="container">

<div id="content">
    <div style="width:90%">
        <canvas id="canvas"></canvas>
    </div>
        <script>
    var customerName = '<?php echo $data_array['client'] ?>'
    console.log(customerName);
    var customerNameNoSpaces = customerName.replace(/\s+/, "");

      var d1 = <?php print round($areaAvg1,2) . "\n"; ?>
      var d2 = <?php print round($areaAvg2,2) . "\n"; ?>
      var d3 = <?php print round($areaAvg3,2) . "\n"; ?>
      var d4 = <?php print round($areaAvg4,2) . "\n"; ?>
      var d5 = <?php print round($areaAvg5,2) . "\n"; ?>


    var totalDev = d1 + d2 + d3 + d4 + d5

//    var chartTitle = "Open Source Maturity Assessment (" + customerName + ")"
    var chartTitle = ""


    var randomScalingFactor = function() {
        return Math.round(Math.random() * 4);
    };

    var color = Chart.helpers.color;
    var config = {
        type: 'radar',
        data: {
            labels: ["General", "Standards and Tools", "Upstream Participation", "Leagel & Governance", "Management Support"],
            datasets: [{
                label: "Overall",
                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                borderColor: window.chartColors.blue,
                pointBackgroundColor: window.chartColors.blue,
                data: [d1,d2,d3,d4,d5]
            }]
        },
        options: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: chartTitle
            },
            scale: {

              ticks: {
                beginAtZero: true,
                max: 5,
                min: 0
              }
            },

    }
 }
    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("canvas"), config);

};
    </script>

</div>

<div id="rightcol">

  More stuff
<br>


<?php


?>

<br>



</div>
<!-- end of main content div -->
<!-- end of wrapper div -->


</div>

</body>
</html>
