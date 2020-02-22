<?php
  ini_set( 'session.cookie_httponly', 1 );
  if(session_status() ===PHP_SESSION_NONE) {
    session_start();
  }

  if(!($_SERVER['REQUEST_METHOD']=='GET' || $_SERVER['REQUEST_METHOD']=='POST')) {
    http_response_code(404);
    include('404.php');
    die();
  }

  require_once 'externals/database.php';
  require_once 'externals/functions.php';

  if($conn===NULL || $conn===false) {
    echo "Connection error";
    die();
  }

  $page = "";
  $page .= file_get_contents('templates/index_header.php');
  
  $theader = file_get_contents('templates/tstart.php');
  $tfooter = file_get_contents('templates/tend.php');
  $trow = file_get_contents('templates/trow.php');

  $page .= $theader;

  $rows = $conn->getrows();

  foreach ($rows as $key => $row) {
    $term = $row['word'];
    $definition = $row['definition'];
    $originator = $row['originator'];
    $example_use = $row['use'];

    $r = sprintf($trow, $term, $definition, $originator, $example_use);
    $page .= $r;
  }

  $page .= $tfooter;
  $page = eval("?>$page");
  echo $page;
?>