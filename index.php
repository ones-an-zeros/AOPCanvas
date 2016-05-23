<?php
  include_once('canvas.module.php');
  $canvasModule = \Canvas\Canvas::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset='utf-8'>
    <title>Canvas Example</title>
    <?=\Canvas\Canvas::css()?>
    <?=\Canvas\Canvas::javascript()?>
  </head>
  <body>
    <h1>Canvas Example Page</h1>
    <?=$canvasModule::render([])?>
  </body>
</html>





