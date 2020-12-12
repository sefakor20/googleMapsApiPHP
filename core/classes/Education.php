<?php

class Education 
{
  private $id;

  private $name;

  private $address;

  private $type;

  private $lat;

  private $lng;

  private $connection;

  private $tableName = 'google_map_colleges';


  // set and get property for ID
  function setId($id) { $this->id = $id; }
  function getId(){ return $this->id; }

  // set and get property forn NAME
  function setName($name) { $this->name = $name; }
  function getName(){ return $this->name; }

  // set and get property forn ADDRESS
  function setAddress($address) { $this->address = $address; }
  function getAddress(){ return $this->address; }

  // set and get property forn TYPE
  function setType($type) { $this->type = $type; }
  function getType(){ return $this->type; }

  // set and get property forn LATITUDE
  function setLat($lat) { $this->lat = $lat; }
  function getLat(){ return $this->lat; }

  // set and get property forn LONGITUDE
  function setLng($lng) { $this->lng = $lng; }
  function getLng(){ return $this->lng; }


  public function __construct($connection)
  {
    $this->connection = $connection;
  }


  // get all colleges with blank latitude and longitude
  public function getCollegesBlankLatLng() {
    $sql = $this->connection->prepare("SELECT * FROM $this->tableName WHERE lat is NULL AND lng is NULL");
    $sql->execute();
    return $colleges = $sql->fetchAll(PDO::FETCH_OBJ);

  }

  
  // update lat and lng in DB
  public function updateCollegeWithLatLng() {
    $sql = $this->connection->prepare("UPDATE $this->tableName SET lat = :lat, lng = :lng WHERE id = :id");

    // bind values
    $sql->bindParam(':lat', $this->lat);
    $sql->bindParam(':lng', $this->lng);
    $sql->bindParam(':id', $this->id);

    if ($result = $sql->execute()) {
      return true;
    } else {
      return false;
    }
  }
  
}
