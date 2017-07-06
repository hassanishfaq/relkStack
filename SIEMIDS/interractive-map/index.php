<?php
include("config.inc.php");	

					$query = "SELECT * FROM  map ;";
					$results=mysqli_query($connect,$query);
					while($row = mysqli_fetch_assoc($results))
					{
						$ip = $row['ip'];
						$ip_with_page = "https://freegeoip.net/json/$ip";
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_URL, $ip_with_page);
						$result = curl_exec($ch);
						curl_close($ch);
						$obj = json_decode($result, true);
						//print_r($obj);
						$marker_lat[] = $obj['latitude'];
						$marker_lon[] = $obj['longitude'];
						$marker_name[] = $obj['city'];     
						
					}
				 $total_markers = count($marker_lat);
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auto Loading Records on Scroll</title>

	
	<!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   
    <!-- Custom Theme Style -->
    <link href="vendors/build/css/custom.min.css" rel="stylesheet">
	
	
	
	
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcARMsABCrA2dpdpWyFrAMr9JyDfHSYd0&callback=initMap">
</script>

<style>
.wrapper{width: 500px;margin: 0 auto;font-family: Georgia, "Times New Roman", Times, serif;}
.wrapper > ul#results li{margin-bottom: 1px;background: #f9f9f9;padding: 20px;list-style: none;}
.loading-image {display: block;margin: 5px auto;}
.end-record-info {text-align: center;border-top: 1px solid #ddd;padding: 5px 0;background: #f9f9f9;}
</style>
<style>
table.roundedCorners { 
  border: 1px solid darkgray;
  border-radius: 13px; 
  border-spacing: 0;
  }
table.roundedCorners td, 
table.roundedCorners th { 
  border-bottom: 1px solid darkgray;
  padding: 10px; 
  }
table.roundedCorners tr:last-child > td {
  border-bottom: none;
}
body .container.body .right_col {
    background: #F7F7F7;
}
body{
	color:black;
}
.table{
	margin-bottom:10px;
	display:block;
}

.map_ss{
	position:fixed;
}
</style>


</head>
<body><div class="page-title">
					  <div class="title_left">
						<h3 style="text-align: center; color:white; ">Loction Finder</h3>
					  </div>
					</div>
</br>
	<div class="container body">
		<div class="main_container">
			<div class="right_col" role="main">
				<div class="">
					

						<div class="clearfix"></div>

					<div class="row">
							<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
								</div>
							
								<div class="form-group col-xs-7 col-sm-7 col-md-7 col-lg-7">
									<div id="map" class="map_ss" style=" height: 440px; width: 806px;" >
									</div>
											
								</div>
								<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
								</div>
								
							</div>
							
							</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
							
							<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1">
								</div>
								<div id="data" class="form-group col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<table class="table" style="margin-bottom:auto !important;">
								  <thead>
									<tr style="background:rgba(52,73,94,.94); color:#ECF0F1;">
									  <th style="width:400px; text-align:center;">IP</th>
									  <th style="width:400px; text-align:center;">Title</th>
									  <th style="width:363px; text-align:center;">Date/Time</th>
									</tr>
								  </thead>
								</table>
								<ul id="results" style="border:1px solid; overflow:scroll; height:393px;"><!-- results appear here as list --></ul>
								</div>
								<div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1">
								</div>
							</div>
					</div>
				</div>
			</div>
        </div>
    </div>

	<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="vendors/build/js/custom.min.js"></script>

<script type="text/javascript">

(function($){	
	$.fn.loaddata = function(options) {// Settings
		var settings = $.extend({ 
			loading_gif_url	: "ajax-loader.gif", //url to loading gif
			end_record_text	: 'No more records found!', //no more records to load
			data_url 		: 'fetch_pages.php', //url to PHP page
			start_page 		: 1 //initial page
		}, options);
		
		var el = this;	
		loading  = false; 
		end_record = false;
		contents(el, settings); //initial data load
		
		$(window).scroll(function() { //detact scroll
			if($(window).scrollTop() + $(window).height() >= $(document).height()){ //scrolled to bottom of the page
				contents(el, settings); //load content chunk 
			}
		});		
	}; 
	//Ajax load function
	function contents(el, settings){
		var load_img = $('<img/>').attr('src',settings.loading_gif_url).addClass('loading-image'); //create load image
		var record_end_txt = $('<div/>').text(settings.end_record_text).addClass('end-record-info'); //end record text
		
		if(loading == false && end_record == false){
			loading = true; //set loading flag on
			el.append(load_img); //append loading image
			$.post( settings.data_url, {'page': settings.start_page}, function(data){ //jQuery Ajax post
				if(data.trim().length == 0){ //no more records
					el.append(record_end_txt); //show end record text
					load_img.remove(); //remove loading img
					end_record = true; //set end record flag on
					return; //exit
				}
				loading = false;  //set loading flag off
				load_img.remove(); //remove loading img 
				el.append(data);  //append content 
				settings.start_page ++; //page increment
			})
		}
	}

})(jQuery);

$("#results").loaddata();
</script>
<script>
var locations = [
	
		<?php 
		for($j=0; $j<$total_markers; $j++)
		{
		//if (!empty($marker_lat[$j] && $marker_lon[$j])) {
		?>
		['<?php echo "Area:".$marker_name[$j] ?>' , <?php echo $marker_lat[$j] ?>, <?php echo $marker_lon[$j] ?>, 4],
			
			<?php } ?>
		];

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 5,
  center: new google.maps.LatLng(30.1858802, 71.3373519),
  mapTypeId: google.maps.MapTypeId.ROADMAP
});

var infowindow = new google.maps.InfoWindow();

var marker, i;
var markers = [];

for (i = 0; i < locations.length; i++) {  
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    map: map
  });

  markers.push(marker);
 // marker.addListener('click', toggleBounce);
  //toggleBounce();
  console.log(markers);

  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      infowindow.setContent(locations[i][0]);
      infowindow.open(map, marker);
    }
  })(marker, i));
}
 function toggleBounce(i) {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          markers[i].setAnimation(google.maps.Animation.BOUNCE);
        }
      }
	   function stopBounce(i) {
       
          markers[i].setAnimation(null);
        
      }
console.log(markers[0]);

</script>
</body>
</html>
