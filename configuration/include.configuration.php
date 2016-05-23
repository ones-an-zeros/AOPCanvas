<?php
  /**
   * Includes
   *
   * This file file is all of your includes for the canvas module. You should only include the canvas module itself.
   * The canvas module will include this which in turn include all needed file.
   *
   * @package canvas
   * @version 1.0.0
   * @author Corey Rosamond <corey@ones-n-zeros.com>
   */


  namespace Canvas
  {


    include_once('define.configuration.php');

    include_once( CANVAS_CONFIGURATION_DIRECTORY.'options.configuration.php' );
    

    include_once( CANVAS_CONFIGURATION_DIRECTORY.'layout.configuration.php' );


    /** *********************************************************************************************************** */
    /**                                                 LAYOUT                                                      */
    /** *********************************************************************************************************** */


    include_once( CANVAS_LAYOUT_DIRECTORY.'container.layout.php' );
    include_once( CANVAS_LAYOUT_DIRECTORY.'canvas.layout.php' );
    include_once( CANVAS_LAYOUT_DIRECTORY.'group.layout.php' );
    include_once( CANVAS_LAYOUT_DIRECTORY.'option.layout.php' );
    include_once( CANVAS_LAYOUT_DIRECTORY.'pallet.layout.php' );
    include_once( CANVAS_LAYOUT_DIRECTORY.'product.layout.php' );

  }