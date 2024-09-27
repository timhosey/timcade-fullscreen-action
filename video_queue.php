<?php
// Take our get variables, fail if not set
if ( !isset($_GET['action']) ) {
  die('no action provided in GET');
}

require_once 'settings.php';
require_once 'video_queue_lib.php';

$action = $_GET['action'];

// Add a new item to queue.
if ($action == 'add') {
  // Fail if vname isn't set
  if ( !isset($_GET['vname']) ) {
    die('no vname provided in GET');
  }
  
  $vname = $_GET['vname'];

  // Function library for video_queue.php
  // create or open (if exists) the database
  $db = new SQLite3('queue.db');

  addQueue($vname, $db);

  // For some reason, I wanted to note that I am listening to Switchfoot's "Meant to Live."
  // I know it's not relevant, nor is it a good use of lines of code, but you know what, screw it.
  // You're not my dad.
  
} elseif ($action == 'queue') {
  // Function library for video_queue.php
  // create or open (if exists) the database
  $db = new SQLite3('queue.db');
  // Return JSON list of queued videos
  $q = [];
  $q = readQueue($db);
  if (gettype($q)=="array") { removeQueue($db, $q['id']); }
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($q);
}
