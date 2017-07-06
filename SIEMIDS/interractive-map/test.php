<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auto Loading Records on Scroll</title>


<!-- Latest compiled and minified CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="js/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<!-- jQuery library -->



<style>

body .container.body .right_col {
    background: #F7F7F7;
}
</style>
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
  border: 1px solid DarkOrange;
  border-radius: 13px; 
  border-spacing: 0;
  }
table.roundedCorners td, 
table.roundedCorners th { 
  border-bottom: 1px solid DarkOrange;
  padding: 10px; 
  }
table.roundedCorners tr:last-child > td {
  border-bottom: none;
}
</style>

</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Upload </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
					<div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<ul id="results"><!-- results appear here as list --></ul>
					</div>
					
					<div class="form-group col-xs-7 col-sm-7 col-md-7 col-lg-7">
						<div id="map" class="map_ss" style=" height: 400px; width: 800px;" >
						</div>
							<style>.map_ss{
								position:fixed !important;
							}
							</style>
					</div>
					
				
				</div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->

        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->

  </body>
</html>
<!-- Latest compiled JavaScript -->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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