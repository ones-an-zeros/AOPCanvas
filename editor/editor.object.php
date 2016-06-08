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
    /** ************************************************************* */
    /**                         NAMESPACES                            */
    /** ************************************************************* */
    use Canvas\Editor\Area\ControlArea;
    use Canvas\Editor\Area\PalletArea;
    use Canvas\Editor\Area\TitleArea;
    use Canvas\Editor\Area\CanvasArea;

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

      /** @var \Canvas\Canvas $canvasModule */
      private $canvasModule;
      /** @var string $id The id of the canvas container element */
      private $id = CANVAS_CONTAINER_ID;
      /** @var string $html The html string to populate when making the html */
      private $html = '<div id="%s">%s<div style="clear:left;"></div></div>';

      /** ************************************************************* */
      /**                          AREA OBJECTS                         */
      /** ************************************************************* */

      /** @var \Canvas\Editor\Area\TitleArea $titleArea */
      private $titleArea;
      /** @var \Canvas\Editor\Area\CanvasArea $canvasArea */
      private $canvasArea;
      /** @var \Canvas\Editor\Area\PalletArea $palletArea */
      private $palletArea;
      /** @var \Canvas\Editor\Area\ControlArea $controlArea */
      private $controlArea;

      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */

      /**
       * Editor constructor.
       *
       * This is the constructor for the Editor object
       *
       * @method  __construct
       * @param   resource       $data
       * @access  public
       */
      public function __construct( $data )
      {
        /** Set the Canvas Module so we have access to our parent */
        $this->setCanvasModule();
        /** Construct the Title Area */
        $this->constructTitleArea( $data->name, 'Customizations' );
        /** Construct the Canvas Area */
        $this->constructCanvasArea( $data->width, $data->height );
        /** Construct the Pallet Area */
        $this->constructPalletArea( $data->groups );
        /** Construct the Control Area */
        $this->constructControlArea();


        echo '<pre>'.print_r( $data, true ).'</pre>';
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

      /** ************************************************************* */
      /**                           RENDERING                           */
      /** ************************************************************* */

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
          $this->titleArea->render().
          $this->canvasArea->render().
          $this->palletArea->render().
          $this->controlArea->render()
        );
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      private function setCanvasModule()
      {
        $this->canvasModule = \Canvas\Canvas::getInstance();
      }

      /** ************************************************************* */
      /**                         CONSTRUCTORS                          */
      /** ************************************************************* */

      private function constructTitleArea( $productTitle, $palletTitle )
      {
        $this->titleArea = new TitleArea( $productTitle, $palletTitle );
      }

      private function constructCanvasArea( $width, $height )
      {
        $this->canvasArea = new CanvasArea( $width, $height );
      }

      private function constructPalletArea( $groups )
      {
        $this->palletArea = new PalletArea( $groups );
      }

      private function constructControlArea( $saveID = null, $resetID = null, $saveText = null, $resetText = null )
      {
        $this->controlArea = new ControlArea( $saveID, $resetID, $saveText, $resetText );
      }
    }
  }