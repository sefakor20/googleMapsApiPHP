var map;
var geocoder;

function loadMap() {
  var hocity = { lat: 6.6101, lng: 0.4785 };
  map = new google.maps.Map(document.getElementById("map"), {
    center: hocity,
    zoom: 10,
  });

  // display marker on location
  var marker = new google.maps.Marker({
    position: hocity,
    map: map
  });

  // get colleges data
  var collegeData = JSON.parse(document.getElementById('data').innerHTML);

  // create geocoder object
  geocoder = new google.maps.Geocoder();
  codeAddress(collegeData);

}

// get the lat and lng from the google maps api
function codeAddress(collegeData) {
  Array.prototype.forEach.call(collegeData, function(data){
    // fetch address and name to be displayed on the marker
    var address = data.name + ' ' + data.address;

  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == 'OK') {
      map.setCenter(results[0].geometry.location);
      
      // get items printed on the map
      var points = {};
      points.id = data.id;
      points.lat = map.getCenter().lat();
      points.lng = map.getCenter().lng();

      updateCollegeWithLatLng(points);

    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}); 

}


// function to update latitude and longitude in the database
function updateCollegeWithLatLng(points) {
  $.ajax({
    url: "submits/action.php",
    method: "post",
    data: points,
    success: function(res) {
      console.log(res);
    }
  });
}