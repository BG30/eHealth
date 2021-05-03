<html> 
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Dynamic Map</title>	

    <style>
      #map {
        height: 100%;
      }
      /* Not needed but makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
	<h1>Appointment Has been Successfully Booked!!!</h1>
	<button onclick="location.href='patientHome.php'" type= "button">Go Home</button>
    	
	<div id="map"></div>
    <script>
		var point = [
			['location2', 49.138561, -122.839450, 10, 'www.google.ca',],
		];
		
		var label2 = 'Doctor'
      
		function initMap() {
			var CustomLatLng2 = {lat: 49.138561, lng: -122.839450};//Doctor
			var CenterLoc = {lat:  49.146742, lng: -122.874729};//Map Center
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 13,
				center: CenterLoc
			});
        
			var marker2 = new google.maps.Marker({
				position: CustomLatLng2,
				map: map,
				Title: label2,
				animation:google.maps.Animation.BOUNCE
			});
            
			google.maps.event.addListener(marker2, 'click', function() {
				window.location.href =  this.url;
			});
		}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=keyGoesHere">
    </script>
  </body>
</html>