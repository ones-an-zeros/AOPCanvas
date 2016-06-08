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
      /**                    COLLECTION CONSTANTS                       */
      /** ************************************************************* */

      const canvasModule  = 0;

      const containerID   = 1;

      const containerHTML = 2;

      /** ************************************************************* */
      /**                       AREA CONSTANTS                          */
      /** ************************************************************* */

      const title     = 0;

      const canvas    = 1;

      const pallet    = 2;

      const control   = 3;

      /** ************************************************************* */
      /**                        DATA CONSTANTS                         */
      /** ************************************************************* */


      const productTitle    = 0;

      const palletTitle     = 1;

      const canvasWidth     = 0;

      const canvasHeight    = 1;

      const canvasEditables = 2;

      const palletGroups    = 0;

      /** ************************************************************* */
      /**                         COLLECTIONS                           */
      /** ************************************************************* */

      private $collection = [
        self::canvasModule  => null,
        self::containerID   => CANVAS_CONTAINER_ID,
        self::containerHTML => '<div id="%s">%s<div style="clear:left;"></div></div>'
      ];

      private $area = [
        self::title   => null,
        self::canvas  => null,
        self::pallet  => null,
        self::control => null,
      ];

      private $data = [
        self::title   => [ self::productTitle => null, self::palletTitle  => null, ],
        self::canvas  => [ self::canvasWidth => null, self::canvasHeight => null, self::canvasEditables => [] ],
        self::pallet  => [ self::palletGroups => [] ],
        self::control => [],
      ];

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
        /** Parse all of the data into the collectios */
        $this->parseData( $data );
        /** Set the Canvas Module so we have access to our parent */
        $this->setCanvasModule();
        /** Construct the Title Area */
        $this->constructTitleArea();
        /** Construct the Canvas Area */
        $this->constructCanvasArea();
        /** Construct the Pallet Area */
        $this->constructPalletArea();
        /** Construct the Control Area */
        $this->constructControlArea();
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
          $this->collection[self::containerHTML],
          $this->collection[self::containerID],
          $this->area[self::title]->render().
          $this->area[self::canvas]->render().
          $this->area[self::pallet]->render().
          $this->area[self::control]->render()
        );
      }

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      private function setCanvasModule()
      { $this->collection[self::canvasModule] = \Canvas\Canvas::getInstance(); }

      /** ************************************************************* */
      /**                            PARSERS                            */
      /** ************************************************************* */

      private function parseData( $data )
      {
        /** TITLE DATA */
        $this->data[self::title][self::productTitle]      = $data->title->product;
        $this->data[self::title][self::palletTitle]       = $data->title->pallet;
        /** CANVAS DATA */
        $this->data[self::canvas][self::canvasWidth]      = $data->canvas->width;
        $this->data[self::canvas][self::canvasHeight]     = $data->canvas->height;
        $this->data[self::canvas][self::canvasEditables]  = $data->canvas->editables;
        /** PALLET DATA */
        $this->data[self::pallet][self::palletGroups]     = $data->pallet->groups;
        /** CONTROL DATA */

      }

      /** ************************************************************* */
      /**                         CONSTRUCTORS                          */
      /** ************************************************************* */

      /**
       * Construct Title Area
       *
       * Construct the title area object
       *
       * @method  constructTitleArea
       * @access  private
       */
      private function constructTitleArea()
      {
        $data = $this->data[self::title];
        $this->area[self::title] = new TitleArea(
          $data[self::productTitle],
          $data[self::palletTitle]
        );
      }

      /**
       * Construct Canvas Area
       *
       * Construct the canvas area object
       *
       * @method  constructCanvasArea
       * @access  private
       */
      private function constructCanvasArea()
      {
        $data = $this->data[self::canvas];
        $this->area[self::canvas] = new CanvasArea(
          $data[self::canvasWidth],
          $data[self::canvasHeight],
          $data[self::canvasEditables]
        );
      }

      /**
       * Construct Pallet Area
       *
       * Construct the Pallet Area Object
       *
       * @method  constructPalletArea
       * @access  private
       */
      private function constructPalletArea()
      {
        $data = $this->data[self::pallet];
        $this->area[self::pallet] = new PalletArea( $data[self::palletGroups] );
      }

      /**
       * Construct Controller Area
       *
       * Construct the Controller Area object
       *
       * @method  constructControlArea
       * @param   null                  $saveID
       * @param   null                  $resetID
       * @param   null                  $saveText
       * @param   null                  $resetText
       * @access  private
       */
      private function constructControlArea( $saveID = null, $resetID = null, $saveText = null, $resetText = null )
      {
        $data = $this->data[self::control];
        $this->area[self::control] = new ControlArea(
          $saveID, $resetID, $saveText, $resetText
        );
      }
    }
  }