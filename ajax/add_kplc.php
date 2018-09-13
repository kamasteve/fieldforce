<?php
include_once('config.php');
    $Latitude = $_REQUEST['lat'];
	$longitude = $_REQUEST['lon'];
	$mobile = $_REQUEST['mobile'];
	$secondary_contact = $_REQUEST['secondary_contact'];
	$email = $_REQUEST['email'];
	$Address = $_REQUEST['Address'];
	$capture_date = $_REQUEST['capture_date'];
	$IDCARD = $_REQUEST['IDCARD'];
	$region = $_REQUEST['region'];
	//$photo = $_REQUEST['input-b3[]'];
	//$image = $_FILES['image']['name'];
	//$file_basename = substr($image, 0, strripos($image, '.')); // get file extention
//$file_ext = substr($image, strripos($image, '.'));
	$ADDEB_BY = $_REQUEST['ADDEB_BY'];
	$OTP= '1234';
	


$add_unit ="INSERT into Field_force_users(Latitude,longitude,mobile,secondary_contact,email,Address,capture_date,region,IDCARD,ADDEB_BY) VALUES('$Latitude','$longitude','$mobile','$secondary_contact','$email','$Address','$capture_date','$region','$IDCARD','$ADDEB_BY')";
 $result_addunits = mysqli_query($mysqli, $add_unit);

            if (!$result_addunits) {
             print "Error: " . $add_unit . "<br>" . mysqli_error($mysqli);
			}
			else{
			echo "ok";

}
?>