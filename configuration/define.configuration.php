<?php
  /**
   * Define
   *
   * This configuration file is for defining any constants the canvas module uses
   *
   * @package Canvas
   * @version 1.0.0
   * @author Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas
  {
    /** This is the root directory for the Canvas Module */
    define( 'CANVAS_ROOT', str_replace ('/configuration','' , __DIR__.DIRECTORY_SEPARATOR ) );
    /** This is the base development url */
    define( 'CANVAS_DEVELOPMENT_URL', '//client.ones-n-zeros.com/aop/' );
    /** This is the base live URL */
    define( 'CANVAS_LIVE_URL', '//client.ones-n-zeros.com/aop/' );
    /** This is the path to the configuration directory */
    define( 'CANVAS_CONFIGURATION_DIRECTORY', __DIR__.DIRECTORY_SEPARATOR );
    /** This is the path to the exception handler directory */
    define( 'CANVAS_EXCEPTION_DIRECTORY', CANVAS_ROOT.'exception'.DIRECTORY_SEPARATOR );
    /** This is the path to the editor directory */
    define( 'CANVAS_EDITOR_DIRECTORY', CANVAS_ROOT.'editor'.DIRECTORY_SEPARATOR );
  }