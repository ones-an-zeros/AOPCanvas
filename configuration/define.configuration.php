<?php


  namespace Canvas
  {

    define( 'CANVAS_ROOT', str_replace ('/configuration','' , __DIR__.DIRECTORY_SEPARATOR ) );

    define( 'CANVAS_CONFIGURATION_DIRECTORY', __DIR__.DIRECTORY_SEPARATOR );

    define( 'CANVAS_LAYOUT_DIRECTORY', CANVAS_ROOT.'layout'.DIRECTORY_SEPARATOR );

  }