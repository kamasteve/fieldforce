<?php include ('header.php'); 
include ('functions.php');
$sql1 = mysqli_query($mysqli,"SELECT * FROM users");
while($row1 = mysqli_fetch_array($sql1)) {
$pro_arr[]=$row1;
$pageid=75;
}
?>
<div class="ch-container">
<div class="row">
 <?php include('left_sidebar.php');  ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.js"></script>
 <div id="content" class="col-lg-10 col-sm-10">
 <div class="row">
    <div class="box col-md-12">
<div class="box-inner">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7rXrZa1QSjM1Zoxj23siZc-GRG2glvvA&signed_in=true&callback=initMap"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#property').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'http://localhost/O-Mapp/ajax/ajaxData.php',
                data:'property_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
				dataType: 'json',
                url:'http://localhost/O-Mapp/ajax/ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    for(var i = 0; i < html.length; i++) {
          var obj = html[i];

          $("#meter_number").val(obj.meter_number);
          $("#serial_number").val(obj.serial_number);
          $("#current_reading").val(obj.current_reading);
                }
				}
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
$(document).ready(function(e){
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ajax/add_kplc.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Agent Added Successfully.</span>');
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
    
    //file type validation
    $("#file").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#file").val('');
            return false;
        }
    });
});

</script>		
				<?php 

 $mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);
	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
    $query = "SELECT  * from users";

	// mysqli select query
	$results = $mysqli->query($query);

	// mysqli select query
	?>



<form enctype="multipart/form-data" id="fupForm" >
  <div class="form-group" >
         <div class='statusMsg alert '> </div>

	
 <body onload="getLocation()"> 

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";}
    }
    
function showPosition(position) {
   // x.innerHTML="Latitude: " + position.coords.latitude + 
    //"<br>Longitude: " + position.coords.longitude;
	//var lat = position.coords.latitude;
   // var lon = position.coords.longitude;
	//var $("#lat").val(obj.lat);
	$.get( "http://maps.googleapis.com/maps/api/geocode/json?latlng="+ position.coords.latitude + "," + position.coords.longitude +"&sensor=false", function(data) {
                        console.log(data);
						address  = data.results[1].formatted_address;
						city=data.results[1].address_components[3].long_name;
						var myadress = address;
						var mycity = city;
						document.getElementById("mytext").value = myadress;
						document.getElementById("city").value = mycity;
//document.getElementById("address").value=data.results[1].formatted_address;
//alert(city);	 
                      })
	
     document.getElementById("lon").value = position.coords.longitude;
     document.getElementById("lat").value = position.coords.latitude;
	

}
_getCityState = function(resp){
	var res = '';
      	if (resp.status == 'OK') {
		if (resp.results[1]) {
			var city=false,state=false;
			for (var i = 0; i < resp.results.length; i++) {
				if ((!city || !state) && resp.results[i].types[0] === "locality") {
					city = resp.results[i].address_components[0].short_name,
					state = resp.results[i].address_components[2].short_name;
					res = city + ", " + state;
				}
			}
		}
	}
};

</script>





<div id="map"></div>

<div class="form-group col-md-6">
<label class="control-label col-xs-4" for="text">latitude:</label>
 <div class="input-group  col-xs-8" id="invoice_due_text">
  <input class="form-control" name="lat" id="lat" type="text" placeholder="Latitude" value=""  readonly>
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class="form-group col-md-6">
<label class="control-label col-xs-4" for="text">longitude:</label>
 <div class="input-group  col-xs-8" id="invoice_due_text">
  <input class="form-control" name="lon" type="text" placeholder="longitude" value="" id='lon' readonly >
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class="form-group col-md-6">
<label class="control-label col-xs-4" for="text">Full Names:</label>
 <div class="input-group  col-xs-8" id="invoice_due_text">
  <input class="form-control" name="names" type="text" placeholder="Full Names" value="" id='names' >
  <span class="help-block" id="error"></span> 
</div>
</div>

<div class="form-group col-md-6">
<label class="control-label col-xs-4" for="text">Contact Number:</label>
 <div class="input-group  col-xs-8" id="invoice_due_text">
  <input class="form-control" name="mobile" type="text" placeholder="Mobile Number" value="" id='mobile' >
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class="form-group col-md-6">
<label class="control-label col-xs-4" for="text">Secondary Contact :</label>
 <div class="input-group  col-xs-8" id="invoice_due_text">
  <input class="form-control" name="secondary_contact" type="text" placeholder=" Secondary Contact" value="" id='secondary_contact' >
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class="form-group col-md-6">
<label class="control-label col-xs-4" for="text">Email:</label>
 <div class="input-group  col-xs-8" id="invoice_due_text">
  <input class="form-control" name="email" type="text" placeholder="Email" value="" id='email' >
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class="form-group col-md-6">
<label class="control-label col-xs-4" for="text">City:</label>
 <div class="input-group  col-xs-8" id="invoice_due_text">
  <input class="form-control" name="city" type="text" placeholder="City" value="" id='city' readonly >
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class="form-group col-md-6">
<label class="control-label col-xs-4" for="text">Address :</label>
 <div class="input-group  col-xs-8" id="invoice_due_text">
  <input class="form-control" name="mytext" type="text" placeholder=" mytext" value=" " id='mytext' readonly >
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class=" form-group col-md-6 ">
				        <label class="control-label col-xs-4" for="fname">Capture Date:</label>
				            <div class="input-group  col-xs-8" id="invoice_due_date">
				            
				                <input type="text" class="form-control required" name="capture_date" placeholder="Capture Date" data-date-format="<?php echo DATE_FORMAT ?> " />
				                <span class="input-group-addon">
				                    <span class="glyphicon glyphicon-calendar"></span>
				                </span>
				            </div>
				        </div>
<div class="form-group col-md-6">
<label class="control-label col-xs-4" for="text">Region:</label>
 <div class="input-group  col-xs-8" id="invoice_due_text">
  <input class="form-control" name="region" type="text" placeholder="Previous" value="" id='region' >
  <span class="help-block" id="error"></span> 
</div>
</div>


<div class="form-group col-md-6">
<label class="control-label col-xs-4" for="text">ID Number:</label>
 <div class="input-group  col-xs-8" id="invoice_due_text">
  <input class="form-control" name="IDCARD" type="text" placeholder=" ID Number" value="" id='IDCARD' >
  <span class="help-block" id="error"></span> 
</div>
</div>
<input type="hidden" name="ADDEB_BY" value="<?php echo "Snkamau" ?> "/>
<div class="form-group col-md-6">
<div class="control-label col-xs-4" for="text"></div>
 <div class="input-group  col-xs-8" id="invoice_due_text">
<input type="submit" name="submit" class="btn btn-danger submitBtn" value="SAVE"/>
  <span class="help-block" id="error"></span> 
</div>
</div>

 
 
<div class="row">
		<div class="col-xs-4">
		
		</div>
		</div>
          <!-- .vd_content-section --> 
        
        </div>
		</form>
		</div>
	</div>
</div>
</div>	
		</div>
		</div>
		



<?php
include('footer.php');
?>