<?php
  require_once('settings.php');
?>

<html>
  <head>
    <title>Full Screen Action Overlay</title>
    <style>
      body {
        max-height: <?= $RES_HEIGHT ?>;
        max-width: <?= $RES_WIDTH ?>;
        margin: 0 auto;
        padding: 0px;
      }

      video {
        width: <?= $RES_HEIGHT ?>;
        height: <?= $RES_WIDTH ?>;
        margin: 0 auto;
        padding: 0px;
      }
    </style>
    <script>
      pause = <?= $PAUSE_BETWEEN ?>;
    </script>
  </head>
  <body onload="setInterval(check_queue, 10000)">
    <video id="video">
      <source id="videosrc">
    </video>
    <script type="text/javascript" src="vq.js"></script>
  </body>
</html>