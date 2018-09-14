<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7rXrZa1QSjM1Zoxj23siZc-GRG2glvvA&signed_in=true&callback=initMap"></script>
 <script>
  var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
     var latlng = new google.maps.LatLng(50.804400, -1.147250);
    var mapOptions = {
     zoom: 6,
     center: latlng
    }
     map = new google.maps.Map(document.getElementById('map-canvas12'), mapOptions);
    }

   function codeAddress(address,tutorname,url,distance,prise,postcode) {
   var address = address;

    geocoder.geocode( { 'address': address}, function(results, status) {
     if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
       var marker = new google.maps.Marker({
      map: map,
      position: results[0].geometry.location
  });

  var infowindow = new google.maps.InfoWindow({
     content: 'Tutor Name: '+tutorname+'<br>Price Guide: '+prise+'<br>Distance: '+distance+' Miles from you('+postcode+')<br> <a href="'+url+'" target="blank">View Tutor profile</a> '
   });
    infowindow.open(map,marker);

      } /*else {
      alert('Geocode was not successful for the following reason: ' + status);
    }*/
   });
 }


  google.maps.event.addDomListener(window, 'load', initialize);

 window.onload = function(){
  initialize();
  // your code here
  <?php foreach($addr as $add) { 

  ?>
  codeAddress('<?php echo $add['address']; ?>','<?php echo $add['tutorname']; ?>','<?php echo $add['url']; ?>','<?php echo $add['distance']; ?>','<?php echo $add['prise']; ?>','<?php echo substr( $postcode1,0,4); ?>');
  <?php } ?>
};
  </script>

 <div id="map-canvas12"></div> nhm