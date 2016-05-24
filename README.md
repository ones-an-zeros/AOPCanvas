# Admit One Products Canvas Program

This is the Admit One Products Canvas program. The canvas program will take a product with options and parameters and 
return an editor, allowing the end user to make alterations and customizations to the product. Once completed the 
the canvas program will return a JSON object describing the product in detail so that Admit One Products can create
a printable version of the product with all of its customizations for the consumer!

## Configuration
90% of the work for setting up the canvas editor will be done here. From HTML IDs, Content Titles, Development mode
color scheme, dimensions and a lot more is configurable

### Define
Option | Type | Explanation
:--- | :---: | ---
CANVAS_ROOT | string | Path to the root canvas module directory
CANVAS_CONFIGURATION_DIRECTORY | string | Path to the canvas module configuration directory
CANVAS_LAYOUT_DIRECTORY | string | Path to the canvas module layout directory

### Options 
Option | Type | Explanation
:--- | :---: | ---
CANVAS_DEVELOPMENT_MODE | boolean | This puts the editor in development mode

### Layout
Option | Type | Explanation
:--- | :---: | ---
CANVAS_CONTAINER_ID | string |  This is the ID for the main editor container
CANVAS_TITLE_ID | string | This is the ID for the title area
CANVAS_CANVAS_ID | string | This is the ID for the canvas area
CANVAS_PALLET_ID | string | This is the ID for the pallet area


## Directory Structure
Directory | Description 
--- | --- 
configuration | All configurable files
data | Not Defined
documentation | PHPDocumentor will generate all of its documentation here
layout | These files are used to create the basic layout for the editor
style | These are all the style sheets used to make make the editor

## Examples
### How to get the Javascript Files
```php
<?php
  include_once(MODULE_DIRECTORY."Canvas".DIRECTORY_SEPARATOR."canvas.module.php"); 
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
  include_once(MODULE_DIRECTORY."Canvas".DIRECTORY_SEPARATOR."canvas.module.php");
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
### How to get the Javascript on document ready
```php
<?php
  include_once(MODULE_DIRECTORY."Canvas".DIRECTORY_SEPARATOR."canvas.module.php");
?>
<html>
  <head>
    <title>Including the CSS</title>
    <?=\Canvas\Canvas::javascript()?>
    <?=\Canvas\Canvas::javascriptOnReady()?>
  </head>
  <body>
    <h1>The javascript on load functions will now run</h1>
  </body>
</html>
```
### Render the Editor 
```php
<?php
  include_once(MODULE_DIRECTORY."Canvas".DIRECTORY_SEPARATOR."canvas.module.php");
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
        <?=$canvasModule::render([])?>
      </section>
      <footer>
        Admit One Products &copy; 2016
      </footer>
    </section>
  </body>
</html>
```


