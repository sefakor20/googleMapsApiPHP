let map;
let hocity = { lat: 6.6101, lng: 0.4785 };

function loadMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: hocity,
    zoom: 10,
  });

  // display marker on location
  var marker = new google.maps.Marker({
    position: hocity,
    map: map
  });
}