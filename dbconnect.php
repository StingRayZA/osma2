<?php
function connectDB() {
## Database stuff
global $db;
$db = ($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', 'XXXXXXXXX'));
	if (!$db) {
	die("Unable to connect to database");
	}
if (!mysqli_select_db($GLOBALS["___mysqli_ston"], 'osma2')) {
		die("Unable to access osma2 database");
	}
}
?>
