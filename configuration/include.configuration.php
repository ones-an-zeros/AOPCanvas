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
    /** *********************************************************************************************************** */
    /**                                               CONFIGURATION                                                 */
    /** *********************************************************************************************************** */

    /** The directory definitions */
    include_once('define.configuration.php');
    /** The editor options */
    include_once( CANVAS_CONFIGURATION_DIRECTORY.'options.configuration.php' );
    /** The layout defines */
    include_once( CANVAS_CONFIGURATION_DIRECTORY.'layout.configuration.php' );

    /** *********************************************************************************************************** */
    /**                                                 LAYOUT                                                      */
    /** *********************************************************************************************************** */

    /** Main Editor container */
    include_once( CANVAS_LAYOUT_DIRECTORY.'editor.object.php' );
    /** Title bar object */
    include_once( CANVAS_LAYOUT_DIRECTORY.'title.area.php' );
    /** Canvas area container object */
    include_once( CANVAS_LAYOUT_DIRECTORY.'canvas.area.php' );
    /** The product canvas object */
    include_once( CANVAS_LAYOUT_DIRECTORY.'productCanvas.layout.php' );
    /** Pallet Area object */
    include_once( CANVAS_LAYOUT_DIRECTORY.'pallet.area.php' );
    /** Pallet Group object */
    include_once( CANVAS_LAYOUT_DIRECTORY.'group.layout.php' );
    /** Pallet Option Object */
    include_once( CANVAS_LAYOUT_DIRECTORY.'option.layout.php' );
    /** Pallet Control Area container */
    include_once( CANVAS_LAYOUT_DIRECTORY.'control.area.php' );
  }