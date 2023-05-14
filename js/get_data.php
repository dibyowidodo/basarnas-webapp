<?php
// Connect to the database
$conn = mysqli_connect("mysql", "user", "root", "dibyo") or die();

// Get the date parameter from the query string
$date = $_GET['date'];

// Query the database
$sql = "SELECT suhu_air_sungai FROM river_data WHERE DATE(datetime) = '$date'";
$result = mysqli_query($conn, $sql);

// Fetch the data
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row['suhu_air_sungai'];
}

// Return the data as JSON
echo json_encode($data);

// Close the database connection
mysqli_close($conn);
?>
