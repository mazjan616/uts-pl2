<?php

class Koneksi {
  var $host = 'localhost';
  var $user = 'root';
  var $pass = '';
  var $db_name = 'spp'; // nama database

  public function __construct() {
    $this->konek = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);
  
  }
}
?>