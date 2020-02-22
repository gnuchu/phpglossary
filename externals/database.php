<?php
  class MyDB extends SQLite3 {
    function __construct() {
      $this->open('database/db.sqlite3');
    }
    
    function getrows() {
      $sql = 'select * from definitions order by word';
      $results = $this->query($sql);
      $data = array();

      while($r = $results->fetchArray()) {
        array_push($data, $r);
      };

      Return $data;
    }
  }

  $conn = new MyDB();
  return $conn;
?>