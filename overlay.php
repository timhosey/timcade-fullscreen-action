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
  </head>
  <body>
    <video autoplay="autoplay">
      <source src="video/supercoolvideo.mp4" type="video/webm" />
    </video>
  </body>
</html>