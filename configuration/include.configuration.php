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
    /**                                               ERROR HANDLING                                                */
    /** *********************************************************************************************************** */

    include_once( CANVAS_EXCEPTION_DIRECTORY.'handler.object.php' );

    include_once( CANVAS_EXCEPTION_DIRECTORY.'canvasException.object.php' );

    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'arrayToStringConversion.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'compileError.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'compileWarning.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'coreError.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'coreWarning.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'includeOnce.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'missingArgument.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'propertyOfNoneObject.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'recoverable.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'standardDeprecated.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'standardNotice.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'standardParse.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'standardWarning.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'strict.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'unDefinedConstant.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'unDefinedIndex.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'unDefinedVariable.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'userDeprecated.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'userError.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'userNotice.exception.php' );
    include_once( CANVAS_EXCEPTION_DIRECTORY.'type'.DIRECTORY_SEPARATOR.'userWarning.exception.php' );
    
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

    /** Editor Part Interface */
    include_once( CANVAS_EDITOR_DIRECTORY.'object'.DIRECTORY_SEPARATOR.'pallet'.DIRECTORY_SEPARATOR.'interface'.DIRECTORY_SEPARATOR.'part.interface.php' );
    /** Editor Part Abstract */
    include_once( CANVAS_EDITOR_DIRECTORY.'object'.DIRECTORY_SEPARATOR.'pallet'.DIRECTORY_SEPARATOR.'abstract'.DIRECTORY_SEPARATOR.'part.abstract.php' );
    /** Text Input Editor Part */
    include_once( CANVAS_EDITOR_DIRECTORY.'object'.DIRECTORY_SEPARATOR.'pallet'.DIRECTORY_SEPARATOR.'editor'.DIRECTORY_SEPARATOR.'text.part.php' );

    /** *********************************************************************************************************** */
    /**                                             CANVAS OBJECTS                                                  */
    /** *********************************************************************************************************** */

    /** CANVAS EDITABLE OBJECT */
    include_once( CANVAS_EDITOR_DIRECTORY.'object'.DIRECTORY_SEPARATOR.'canvas'.DIRECTORY_SEPARATOR.'object'.DIRECTORY_SEPARATOR.'editable.object.php' );
    /** CANVAS COORDINATE OBJECT */
    include_once( CANVAS_EDITOR_DIRECTORY.'object'.DIRECTORY_SEPARATOR.'canvas'.DIRECTORY_SEPARATOR.'object'.DIRECTORY_SEPARATOR.'object'.DIRECTORY_SEPARATOR.'coordinate.object.php' );
    /** CANVAS DIMENSION OBJECT */
    include_once( CANVAS_EDITOR_DIRECTORY.'object'.DIRECTORY_SEPARATOR.'canvas'.DIRECTORY_SEPARATOR.'object'.DIRECTORY_SEPARATOR.'object'.DIRECTORY_SEPARATOR.'dimension.object.php' );
  }