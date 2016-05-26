<?php
  include_once('../canvas.module.php');
  /** @var object $productData Get the example data and store it */
  $productData = json_decode( file_get_contents("data/productOne.json") );
  /** @var \Canvas\Canvas $canvasModule An instance of the canvas object */
  $canvasModule = \Canvas\Canvas::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset='utf-8'>
    <meta name="viewport" content="height=device-height, width=device-width, initial-scale=1.0">
    <title>Canvas Example</title>
    <?=\Canvas\Canvas::css()?>
    <?=\Canvas\Canvas::javascript()?>
    <?=\Canvas\Canvas::javascriptOnReady()?>
  </head>
  <body>
    <section id="container">
      <header>
        <h1>Canvas Example</h1>
      </header>
      <section id="content">
        <?=$canvasModule::render( $productData )?>
      </section>
      <footer>
        Admit One Products &copy; 2016
      </footer>
    </section>
  </body>
</html>





