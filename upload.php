<?php

require("getgps.php");

date_default_timezone_set('Asia/Singapore');
$filename = "exif.jpg";

if (! is_uploaded_file($_FILES['f']['tmp_name'])) { die("Upload fail: Missing file " . $_FILES["f"]["name"]); }
move_uploaded_file($_FILES["f"]['tmp_name'], $filename);

$exif = exif_read_data($filename);
$lon = getGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
$lat = getGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);

if (empty($lon) || empty($lat)) {
	die("Uploaded image $filename has not contain exif data");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Image with EXIF</title>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<style>
html, body, #map-canvas {
	height: 100%;
	margin: 0px;
	padding: 0px
}
		</style>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		<script>
var map;
function initialize() {
	myLatlng = new google.maps.LatLng(<?php echo "$lat,$lon"; ?>);
	map = new google.maps.Map(document.getElementById('map-canvas'), {
	zoom: 15,
		// center: {lat: <?php echo $lat; ?>, lng: <?php echo $lon;?>}
		center: myLatlng

	});

	var contentString = '<div id="content">'+
		'<img style="max-width:100%" src=exif.jpg>'+
		'</div>';

	var infowindow = new google.maps.InfoWindow({
	content: contentString
		});

	var marker = new google.maps.Marker({
	position: myLatlng,
		map: map,
		title: 'Problem report'
		});

	infowindow.open(map,marker);

}
google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</head>
	<body>
		<div id="map-canvas"></div>
	</body>
</html>




