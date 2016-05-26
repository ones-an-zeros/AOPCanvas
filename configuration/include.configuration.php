<?php
  /**
   * Includes
   *
   * This file file is all of your includes for the canvas module. You should only include the canvas module itself.
   * The canvas module will include this which in turn include all needed file.
   *
   * @package Canvas
   * @version 1.0.0
   * @author  Corey Rosamond <corey@ones-n-zeros.com>
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
    /**                                                  EDITOR                                                     */
    /** *********************************************************************************************************** */

    /** The main editor object */
    include_once( CANVAS_EDITOR_DIRECTORY.'editor.object.php' );

    /** *********************************************************************************************************** */
    /**                                               EDITOR AREAS                                                  */
    /** *********************************************************************************************************** */

    /** Title Area */
    include_once( CANVAS_EDITOR_DIRECTORY.'area'.DIRECTORY_SEPARATOR.'title.area.php' );
    /** Canvas Area */
    include_once( CANVAS_EDITOR_DIRECTORY.'area'.DIRECTORY_SEPARATOR.'canvas.area.php' );
    /** Pallet Area */
    include_once( CANVAS_EDITOR_DIRECTORY.'area'.DIRECTORY_SEPARATOR.'pallet.area.php' );
    /** Control Area */
    include_once( CANVAS_EDITOR_DIRECTORY.'area'.DIRECTORY_SEPARATOR.'control.area.php' );

    /** *********************************************************************************************************** */
    /**                                              PALLET OBJECTS                                                 */
    /** *********************************************************************************************************** */

    /** Group Object */
    include_once( CANVAS_EDITOR_DIRECTORY.'object'.DIRECTORY_SEPARATOR.'pallet'.DIRECTORY_SEPARATOR.'group.object.php' );
    /** Editor Object */
    include_once( CANVAS_EDITOR_DIRECTORY.'object'.DIRECTORY_SEPARATOR.'pallet'.DIRECTORY_SEPARATOR.'editor.object.php' );

    /** *********************************************************************************************************** */
    /**                                           PALLET EDITOR TYPES                                               */
    /** *********************************************************************************************************** */

    /** Text Input Editor Part */
    include_once( CANVAS_EDITOR_DIRECTORY.'object'.DIRECTORY_SEPARATOR.'pallet'.DIRECTORY_SEPARATOR.'editor'.DIRECTORY_SEPARATOR.'text.part.php' );
  }