# Admit One Products Canvas Program

This is the Admit One Products Canvas program. The canvas program will take a product with options and parameters and 
return an editor, allowing the end user to make alterations and customizations to the product. Once completed the 
the canvas program will return a JSON object describing the product in detail so that Admit One Products can create
a printable version of the product with all of its customizations for the consumer!

## Configuration Options

All configuration options are in the configuration directory in the file option.configuration.php

Development Mode true|false
This will enable or disable development mode.

## Directory Structure
Directory | Description
--- | --- 
`configuration` | All configurable files
`data` | Not Defined
`documentation` | PHPDocumentor will generate all of its documentation here
`layout` | These files are used to create the basic layout for the editor
`style` | These are all the style sheets used to make make the editor

## Examples
### How to get the Javascript Files
```php
<?php
  include_once(MODULE_DIRECTORY."Canvas".DIRECTORY_SEPERATOR."canvas.module.php"); 
?>
<html>
  <head>
    <title>Including the javascript</title>
    <?=\Canvas\Canvas::javascript()?>
  </head>
  <body>
    <h1>The javascript was included </h1>
  </body>
</html>
```
### How to get the CSS Files
```php
<?php
  include_once(MODULE_DIRECTORY."Canvas".DIRECTORY_SEPERATOR."canvas.module.php");
?>
<html>
  <head>
    <title>Including the CSS</title>
    <?=\Canvas\Canvas::css()?>
  </head>
  <body>
    <h1>The CSS was included </h1>
  </body>
</html>
```
### Render the Editor 
```php
<?php
  include_once(MODULE_DIRECTORY."Canvas".DIRECTORY_SEPERATOR."canvas.module.php");
?>
<html>
  <head>
    <title>The Editor</title>
  </head>
  <body>
    <h1>The Editor</h1>
    <?=$canvasModule::render([])?>
  </body>
</html>
```
### All of it together
```php
<?php
  include_once('canvas.module.php');
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
  </head>
  <body>
    <section id="container">
      <header>
        <h1>Canvas Example</h1>
      </header>
      <section id="content">
        <?=$canvasModule::render([])?>
      </section>
      <footer>
        Admit One Products &copy; 2016
      </footer>
    </section>
  </body>
</html>
```


