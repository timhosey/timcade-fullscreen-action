<?php

// Adds a video to the text queue
function addQueue($vidName, $db): void {
  $cre = "CREATE TABLE IF NOT EXISTS 'queue' (id INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
                              vidName TEXT);";
  $db->exec($cre);
  $ins = "INSERT INTO 'queue' (id, vidName)
                  VALUES (null, '".$vidName."');";
  $db->exec($ins);
}

function readQueue($db) {
  $rea = "SELECT vidName, id FROM 'queue' ORDER BY id ASC LIMIT 1"; 
  $qi = $db->query($rea);
  $qi = $qi->fetchArray();
  return $qi;
}

function removeQueue($db, $id) {
  $del = "DELETE FROM 'queue' WHERE id=".$id." LIMIT 1;";
  return $db->exec($del);
}

