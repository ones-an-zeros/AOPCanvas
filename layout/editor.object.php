<?php
  /**
   * Editor
   *
   * This file contains the object in charge of generating the editor
   *
   * @package Canvas
   * @version 1.0.0
   * @author  Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor
  {

    /**
     * Class Editor
     *
     * This is the Editor object. It will create an editor
     *
     * @package Canvas\Editor
     */
    class Editor
    {
      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      /** @var \Canvas\Canvas $canvas This will contain the canvas instance */
      private $canvas;
      /** @var string $id The id of the canvas container element */
      private $id = CANVAS_CONTAINER_ID;
      /** @var string $html The html string to populate when making the html */
      private $html = '<div id="%s">%s<div style="clear:left;"></div></div>';

      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */

      /**
       * Editor constructor.
       *
       * This is the constructor for the Editor object
       *
       * @method  __construct
       * @access  public
       */
      public function __construct()
      {
        /** @var \Canvas\Canvas $this->canvas This is the instance of the Canvas module */
        $this->canvas = \Canvas\Canvas::getInstance();
      }

      /**
       * Editor destructor.
       *
       * This is the destructor for the Editor object
       *
       * @method  __destruct
       * @access  public
       */
      public function __destruct()
      {
        unset(
          $this->canvas,
          $this->id,
          $this->html
        );
      }

      /**
       * Render
       *
       * This is the method that generates the editor html
       *
       * @method  render
       * @return  string
       * @access  public
       */
      public function render()
      {
        return sprintf(
          $this->html,
          $this->id,
          "Content"
        );
      }
    }
  }
/**
 * $this->titleArea->render().
 * $this->canvasArea->render().
 * $this->palletArea->render()
 */