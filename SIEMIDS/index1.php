<?php
session_start();

if(empty($_SESSION['hostip'])){
	?><script type="text/javascript">
           window.location = "index.php"
      </script>;<?php
}



if(!empty($_SESSION['timestamp'])){$timestamp = $_SESSION['timestamp'];}
if(!empty($_SESSION['hostname'])){$hostname = $_SESSION['hostname'];}
if(!empty($_SESSION['hostip'])){$hostip = $_SESSION['hostip']; $ip_website = gethostbyname($_SESSION['hostip']);}
if(!empty($_SESSION['program'])){$program = $_SESSION['program'];}
if(!empty($_SESSION['message'])){$message = $_SESSION['message'];}



/* print_r(_POST['message_data']);
die; */
include("config.inc.php");	

					
						$ip = $ip_website;  // ip come from db
						$ip_info_table = "SELECT * FROM  ip_info where ip='$ip'";
						$ip_info_result=mysqli_query($connect, $ip_info_table);
						$sign_in_row=  mysqli_fetch_assoc($ip_info_result);
						$row = mysqli_num_rows($ip_info_result);
						if($row==0){
						//echo"111"; die;
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
						//die;
						
						/* $insert_ip_info = "INSERT INTO ip_info (ip, latitude, longitude, city)
						VALUES ('".$ip."', '".$obj['latitude']."', '".$obj['longitude']."', '".$obj['city']."')";
						mysqli_query($connect, $insert_ip_info) or die (mysqli_error($connect)); */
						
						}
						else{
							
							$marker_lat[] = $sign_in_row['latitude'];
							$marker_lon[] = $sign_in_row['longitude'];
							$marker_name[] = $sign_in_row['city'];
						}
					
				 $total_markers = count($marker_lat);
				 
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Map View</title>

	
	<!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="vendors/build/css/custom.min.css" rel="stylesheet">
	<!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

	
	
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcARMsABCrA2dpdpWyFrAMr9JyDfHSYd0&callback=initMap">
</script>

<style>
.wrapper{width: 500px;margin: 0 auto;font-family: Georgia, "Times New Roman", Times, serif;}
.wrapper > ul#results li{margin-bottom: 1px;background: #f9f9f9;padding: 20px;list-style: none;}
.loading-image {display: block;margin: 5px auto;}
.end-record-info {text-align: center;border-top: 1px solid #ddd;padding: 5px 0;background: #f9f9f9;}
</style>



</head>
<body><div class="page-title" style="height:34px;">
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
								<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
								</div>
							
								<div class="form-group col-xs-7 col-sm-7 col-md-7 col-lg-7">
									<div id="map" class="map_ss" style=" height: 440px; width: 806px;" >
									</div>
											
								</div>
								<div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
								</div>
								
							</div>
							
							</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
							
							<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1">
								</div>
								<div id="data" class="form-group col-xs-10 col-sm-10 col-md-10 col-lg-10">
								
										<?php 
										 $getmac = "SELECT  `id`, `ip`, `title`, `description`,  `dat_time` FROM `map`" ;
											$getmac_result = mysqli_query($connect, $getmac);
										?>
										<div class="x_panel">
											<div class="x_content">
												<table id="datatable" class="table table-striped table-bordered">
														<thead>
															<tr style="background:rgba(52,73,94,.94); color:#ECF0F1;">
																<th> </th>
																<th>IP</th>
																<th>Tittle </th>
																<th>Description</th>
																<th>Date/Times </th>
																
															</tr>
														</thead>
														<tbody>
														<?php    
															$i = 0;
															$num = 1;
														?>
																  <tr  onmouseover="toggleBounce(<?php echo $i; ?>);" onmouseout="stopBounce(<?php echo $i; ?>);" class="odd gradeX">
																	<td><?php echo $num; ?></td>
																	<td><?php echo $ip_website; ?></td>
																	<td><?php echo $hostname; ?></td>
																	<td><?php echo $message; ?></td>
																	<td><?php echo $timestamp; ?></td>
																	<?php  ?>
																  </tr> 
														</tbody>
												</table>
												
											</div>
										</div>
								
								<!--	<ul id="results" style="border:1px solid; overflow:scroll; height:393px;"> results appear here as list </ul>-->
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
    
	
	 <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
	
    <!-- Custom Theme Scripts -->
    <script src="vendors/build/js/custom.min.js"></script>
	
	
<!--
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
</script>  -->
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
  zoom: 2,
  center: new google.maps.LatLng(15.4542, 18.7322),
  mapTypeId: google.maps.MapTypeId.ROADMAP
});

var infowindow = new google.maps.InfoWindow();

var marker, i;
var markers = [];

for (i = 0; i < locations.length; i++) {  
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    map: map,
	animation: google.maps.Animation.DROP
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
<?php session_destroy(); ?>