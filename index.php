<?php

  require 'vendor/autoload.php';

  $pdo = new Connection;
  $connection = $pdo->make(); 

  $education = new Education($connection);

  // fetch blank lat and lng from DB
  $coll = $education->getCollegesBlankLatLng();
  $coll = json_encode($coll, true);

  // fetch all colleges lat and lng from with their markers
  $allData = $education->getAllColleges();
  $allData = json_encode($allData, true);

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Access Google Maps API in PHP</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChzF3o3zyM6XB8pCAksyv7bUYpCcJw_uk&callback=loadMap"
      defer
    ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <style>
      #data, #allData {
        display: none;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <center class="mt-5">
        <h1>Access Google Maps API in PHP</h1>
      </center>
      <?php echo '<div id="data">' . $coll . '</div>'; ?>
      <?php echo '<div id="allData">' . $allData . '</div>'; ?>
      <div id="map"></div>
    </div>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</html>