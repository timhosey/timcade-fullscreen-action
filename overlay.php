<?php
  require_once('settings.php');
?>

<html>
  <head>
    <title>Full Screen Action Overlay</title>
    <style>
      body {
        height: <?= $RES_HEIGHT ?>px;
        width: <?= $RES_WIDTH ?>px;
        padding: 0px;
        top: 0px;
        left: 0px;
      }

      video {
        position: absolute;
        height: <?= $RES_HEIGHT ?>px;
        width: <?= $RES_WIDTH ?>px;
        margin: 0 auto;
        top: 0px;
        left: 0px;
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