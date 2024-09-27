<?php
// Take out get variables
if ( !isset($_GET['vname']) ) {
  die('no vname provided in GET');
}

if ( !isset($_GET['action']) ) {
  die('no action provided in GET');
}

require_once('settings.php');

$vname = $_GET['vname'];