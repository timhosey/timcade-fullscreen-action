<?php
// Take our get variables, fail if not set
if ( !isset($_GET['action']) ) {
  die('no action provided in GET');
}

require_once('settings.php');
$action = $_GET['action'];

// Add a new item to queue.
if ($action == 'add') {
  // Fail if vname isn't set
  if ( !isset($_GET['vname']) ) {
    die('no vname provided in GET');
  }
  
  $vname = $_GET['vname'];
}
