<?php
require_once('dbcon.php');	
					$query = "SELECT * FROM  map ;";
					$result=mysqli_query($connect,$query);
					while($row = mysqli_fetch_assoc($result))
					{
					$marker_lat[]=$row['lat'];
					$marker_lon[]=$row['lon'];
					$marker_name[]=$row['title'];                    
	
					}
				$total_markers = count($marker_lat);
				
?>
<html>
<head>
  
  <title>Google Maps Multiple Markers</title>

   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Latest compiled JavaScript -->
	
 	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <style>
   div.dataTables_wrapper {
        margin-bottom: 3em;
    }
   </style>
      <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
	
	<script type="text/javascript">

	$(document).ready(function(){
	
	   refreshTable();
	
	});

function refreshTable(){
    $('#signal_table').load('table_data.php', function(){
       setTimeout(refreshTable, 3000);
    });
	 
}
	
</script>
</head>
<body>
</br>
	<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
		 <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
		 </div>
		 
		 <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
		 
		<div id="map" style="height: 400px; width: 800px; " >

		<script type="text/javascript">
				function initMap() {
				 
				var map = new google.maps.Map(document.getElementById('map'), {
				  zoom: 3,
				  center: {lat: 33.6692576, lng: 72.9149374},
				  mapTypeId: 'terrain'
				});
				
			 var locations = [
	
		<?php 
		for($j=0; $j<$total_markers; $j++)
		{
		//if (!empty($marker_lat[$j] && $marker_lon[$j])) {
		?>
		['<?php echo "Area:".$marker_name[$j] ?>' , <?php echo $marker_lat[$j] ?>, <?php echo $marker_lon[$j] ?>, 4],
			
			<?php } ?>
		];

			var infowindow = new google.maps.InfoWindow();
			var marker, i;

			for (i = 0; i < locations.length; i++) { 
			  marker = new google.maps.Marker({
				map: map,
				animation: google.maps.Animation.DROP,
				position: new google.maps.LatLng(locations[i][1], locations[i][2])
				});
				marker.addListener('click', toggleBounce);
				
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
				  infowindow.setContent(locations[i][0]);
				  infowindow.open(map, marker);
				}
			  })(marker, i));
			 
			}
			

	 }
			function toggleBounce() {
			        if (marker.getAnimation() !== null) {
			          marker.setAnimation(null);
			        } else {
			          marker.setAnimation(google.maps.Animation.BOUNCE);
			        }
			      }
		  </script>

		</div>
		 
		 </div>
		
		<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
		 </div> 
		
	
	</div>
	
	</br>
	</br>
	</br>
	 <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
	 
	 
		<div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1">
		</div>
		<div class="form-group col-xs-10 col-sm-10 col-md-10 col-lg-10">
		
			<table  class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Id</th>
						<th>Position</th>
						<th>Office</th>
						<th >Age </th>
						<th>Salary</th>
						<th>Salary</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Office</th>
						<th>Age </th>
						<th>Salary</th>
						<th>Salary</th>
					</tr>
				</tfoot>
				<tbody id="signal_table">
				
				</tbody>
				
			</table>
		</div>
		
		<div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1">
		</div>
	
	</div>

</body>
</html>
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB558Hsmi7CZrUmg4n6Rwj9fdRcPV1A9fY&callback=initMap">
    </script>
	<script>
$(document).ready(function() {
    $('table.display').DataTable();
	
	
} );
</script>