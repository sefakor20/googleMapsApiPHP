<?php
  require_once '../core/bootstrap.php';

  $items_to_update = new Education($connection);

  // fields to items_to_update
  $items_to_update->setId($_REQUEST['id']);
  $items_to_update->setLat($_REQUEST['lat']);
  $items_to_update->setLng($_REQUEST['lng']);

  $status = $items_to_update->updateCollegeWithLatLng();

  if ($status == true) {
    echo "updated...";
  } else {
    echo 'Failed...';
  }