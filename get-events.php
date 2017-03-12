<?php
session_start();

//--------------------------------------------------------------------------------------------------
// This script reads event data from a JSON file and outputs those events which are within the range
// supplied by the "start" and "end" GET parameters.
//
// An optional "timezone" GET parameter will force all ISO8601 date stings to a given timezone.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

// Require our Event class and datetime utilities
require dirname(__FILE__) . '/utils.php';
/*
// Short-circuit if the client did not give us a date range.
if (!isset($_GET['start']) || !isset($_GET['end'])) {
	die("Please provide a date range.");
}
*/
// Parse the start/end parameters.
// These are assumed to be ISO8601 strings with no time nor timezone, like "2013-12-29".
// Since no timezone will be present, they will parsed as UTC.
/*
$range_start = parseDateTime($_GET['start']);
$range_end = parseDateTime($_GET['end']);

// Parse the timezone parameter if it is present.
$timezone = null;
if (isset($_GET['timezone'])) {
	$timezone = new DateTimeZone($_GET['timezone']);
}
*/
$host = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "DKN";

//$username = $_SESSION["username"];
$username = "redeteus";

$appointments = array();

try {
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
	
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $conn->prepare("SELECT appointment_id as id
								, username as title
								, CONCAT('book.php?id=', appointment_id) as url
								, CONCAT(date , 'T',
									CASE time WHEN '01' THEN '09:00:00'
												WHEN '02' THEN '11:00:00'
												WHEN '03' THEN '13:00:00'
												WHEN '04' THEN '15:00:00'
												WHEN '05' THEN '17:00:00'
												WHEN '06' THEN '19:00:00'
									END) AS start
									, CONCAT(date, 'T',
									CASE time WHEN '01' THEN '11:00:00'
												WHEN '02' THEN '13:00:00'
												WHEN '03' THEN '15:00:00'
												WHEN '04' THEN '17:00:00'
												WHEN '05' THEN '19:00:00'
												WHEN '06' THEN '21:00:00'
									END) AS end
								FROM Appointments
								WHERE is_scheduled = 'N'"
							);
	$stmt->bindParam(':username', $username);
	$stmt->execute();

	while($result = $stmt->fetch(PDO::FETCH_OBJ)) {
		array_push($appointments, $result);            
	}
	
	$stmt = null;
	$conn = null;

} catch(PDOException $e) {
	echo "<script type='text/javascript'>alert('Error: " . $e->getMessage() . "');</script>";
	//header("Location:503.html");
}
/*
// Read and parse our events JSON file into an array of event data arrays.
$json = file_get_contents(dirname(__FILE__) . '/events.json');
$input_arrays = json_decode($json, true);

// Accumulate an output array of event data arrays.
$output_arrays = array();
foreach ($input_arrays as $array) {

	// Convert the input array into a useful Event object
	$event = new Event($array, $timezone);

	// If the event is in-bounds, add it to the output
	if ($event->isWithinDayRange($range_start, $range_end)) {
		$output_arrays[] = $event->toArray();
	}
}

// Send JSON to the client.
*/
echo json_encode($appointments);