<?php

  define('STR_MAX_LENGTH', 50);

  function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
  }

  function strongify($text) {
    return "<strong>" . $text . "</strong>";
  }
  
  function urlify($url) {
    return "<a target='_blank' href='" . $url . "'><i class='fa fa-external-link'></i></a>";
  }

  function urlify2($url) {
    return "<a target='_blank' href='" . $url . "'>$url</a>";
  }

  function urlify3($url, $text) {
    return "(<a href='" . $url . "'>" . $text . "</a>)";
  }

  function ago($s) {
    $slug = $s < 2 ? "$s second ago" : "$s seconds ago";
    return $slug;
  }
  

?>
