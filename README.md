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
```
<?php include_once(MODULE_DIRECTORY."Canvas".DIRECTORY_SEPERATOR."canvas.module.php"); ?>
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
```
<?php include_once(MODULE_DIRECTORY."Canvas".DIRECTORY_SEPERATOR."canvas.module.php"); ?>
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
```
<?php include_once(MODULE_DIRECTORY."Canvas".DIRECTORY_SEPERATOR."canvas.module.php"); ?>
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


