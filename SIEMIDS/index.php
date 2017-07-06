<!DOCTYPE html>
<?php
//error_reporting(E_ERROR | E_PARSE);
//require '_process/index.php';
//require 'dbcon.php';

define('hostname', 'localhost');
define('user', 'root');
define('password', '');
define('databaseName', 'syslog_db');
$cc=mysqli_connect(hostname,user,password,databaseName);
mysqli_set_charset($cc, 'utf8mb4');
function prc($cc,$value)
{
	$value = trim($value);
	if($value == "")
	{
		return NULL;
	}
	else
	{
		$value = mysqli_real_escape_string($cc,$value);
	}
	return $value;
	
}


$id= isset($_GET['match_msg']) ? prc($cc,$_GET['match_msg']) : null;


/////////////Map pae info
//include("config.inc.php");	

					$query = "SELECT * FROM  map";
					$results=mysqli_query($cc,$query);
					while($row = mysqli_fetch_assoc($results))
					{
						$ip = $row['ip'];  // ip come from db
						$ip_info_table = "SELECT * FROM  ip_info where ip='$ip'";
						$ip_info_result=mysqli_query($cc, $ip_info_table);
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
						
						
						$insert_ip_info = "INSERT INTO ip_info (ip, latitude, longitude, city)
						VALUES ('".$ip."', '".$obj['latitude']."', '".$obj['longitude']."', '".$obj['city']."')";
						mysqli_query($cc, $insert_ip_info) or die (mysqli_error($cc));
						
						}
						else{
							//echo"<br>222"; die;
							$marker_lat[] = $sign_in_row['latitude'];
							$marker_lon[] = $sign_in_row['longitude'];
							$marker_name[] = $sign_in_row['city'];
						}
					}
				 $total_markers = count($marker_lat);




?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Location Finder</title>

	
	
		<!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   
	<!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

	
	
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

	 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- simple table -->
  <link rel="stylesheet" href="dist/css/mytable.css">

    <!-- Datatables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <!--------------		Map API	------------->
  <script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getSignature(categoryId) {		
		
		var strURL="findSignature.php?category="+categoryId;
	
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('signaturediv').innerHTML=req.responseText;
					
												
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
function getMessage(messageId) {	
	
		var strURL="findMessage.php?message="+messageId;
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					//alert(req.statusText);
					if (req.status == 200) {	
						document.getElementById('messagediv').innerHTML=req.responseText;	
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}

				
	}
		
	
</script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
       
    </div>

    <div class="container">
      <!-- Example row of columns -->
					<form method="post" action="" name="form1">
					<center>

					<table width="45%"  cellspacing="5px" cellpadding="5px">
					  <tr style="line-height:3;">
						<td width="75">Select Category</td>
						 <td width="50">:</td>
						<td  width="150">
				<select class="form-control select2" style="width: 100%;" name="category" onChange="getSignature(this.value)">
				<?php 
				 $sys_tbl= "SELECT id, category FROM signatures WHERE id IN ( SELECT MAX(id) FROM signatures GROUP BY category)"; 
				 $sys_tbl_result= mysqli_query($cc, $sys_tbl);
				 $category= "Select category from signatures where id='$id'";
				 $match_category_result= mysqli_query($cc, $category);
				
				 while ($match_category_row= mysqli_fetch_assoc($match_category_result)){
					 $category=$match_category_row["category"]; 
				 }
								while ($sys_tbl_row= mysqli_fetch_assoc($sys_tbl_result))
								{
								$match_category=$sys_tbl_row["category"];
								if($category == $match_category) { $rsel = "Selected";} else { $rsel = ""; }
								?>
								
					<option value="<?php echo $match_category;   ?>" <?php echo $rsel; ?>><?php  echo $match_category; ?></option>
								<?php 
								}
								?>
                </select>
						</td>
					  </tr>
					  	<tr style="line-height:3;">
						<td>Select Message</td>
						<td width="50">:</td>
						<td id="signaturediv"><div ><select class="form-control select2" style="width: 100%;" name="match_msg">
						<option>Select Category</option>
						</select></div></td>
					  </tr>
					  
					<tr style="">
					<td></td>
					<td></td>
					<td width="50">
					<button type="button"  class="btn btn-success" onclick="window.location.href='index1.php'"  target="_blank">View Map Location</button>
					</td>
					</tr>

					  </tr>
					</table>
					
					</center>
					
					</form>
					
					
					</br></br></br>
					
					 <table id="example1" class="table table-bordered table-striped">
					 
                <thead>
                <tr>
                  <th>ID</th>
                  <th>timestamp</th>
                  <th>Host Name</th>
				  <th>Host IP</th>
				  <th>Program</th>
				  <th>PID</th>
				  <th>Message</th>

                
                </tr>
                </thead>
                <tbody id="messagediv">
             <?php //echo sig_syslog($cc, $id);

			//	echo $hostip;
			 ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
            
                  <th>timestamp</th>
                  <th>Host Name</th>
				  <th>Host IP</th>
				  <th>Program</th>
				  <th>PID</th>
				  <th>Message</th>
				  
				  
                </tr>
                </tfoot>
              </table>
	  </br></br>
	  </br>
	  </br>
	  
	  
   	 
<!--  <a href="index1.php" target="_blank">View Map Location</a> -->
	
      <hr>
	 
	 
<!-- 
      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>/container -->
    </div> 


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
	
	
	
<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>




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
	






<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
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
