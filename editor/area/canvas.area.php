<?php
  /**
   * Canvas Area
   *
   * This is the object that will generate the html for the canvas area
   *
   * @package Canvas
   * @version 1.0.0
   * @author Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor\Area
  {

    /**
     * Class CanvasArea
     *
     * @package Canvas\Editor\Area
     */
    class CanvasArea
    {
      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      /** @var string $containerID This is the id for the container */
      private $containerID = CANVAS_CANVAS_CONTAINER_ID;
      /** @var string $canvasID This is the id for the canvas itself */
      private $canvasID = CANVAS_CANVAS_ID;
      /** @var int $width This is the width for the canvas */
      private $width;
      /** @var int $height This is the height for the canvas */
      private $height;
      /** @var string $container This is the container string to generate the container html */
      private $container = '<section id="%s">%s</section>';
      /** @var string $canvas This is the canvas string to generate the canvas html */
      private $canvas = '<canvas id="%s" style="width:%s;height:%s;">%s</canvas>';

      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */

      /**
       * CanvasArea constructor.
       *
       * This is the construct for the canvasArea object
       *
       * @method  __construct
       * @param   int         $width
       * @param   int         $height
       * @access  public
       */
      public function __construct( $width, $height )
      {
        /** Set the Canvas width */
        $this->setWidth( $width );
        /** Set the Canvas height */
        $this->setHeight( $height );
      }

      /**
       * CanvasArea destructor.
       *
       * This is the destruct for the canvasArea object
       *
       * @method  __destruct
       * @access  public
       */
      public function __destruct()
      {
        unset(
          $this->containerID,
          $this->canvasID,
          $this->width,
          $this->height,
          $this->container,
          $this->canvas
        );
      }

      /** ************************************************************* */
      /**                           RENDERING                           */
      /** ************************************************************* */

      /**
       * Render
       *
       * This is the public interface for rendering this area
       *
       * @method  render
       * @return  string
       * @access  public
       */
      public function render()
      {
        $canvas = sprintf( $this->canvas, $this->canvasID, $this->getWidth(), $this->getHeight(), 'stuff' );
        return sprintf( $this->container, $this->containerID, $canvas );
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      /**
       * Get Width
       *
       * Get and return the width attribute with the px attached
       *
       * @method  getWidth
       * @return  string
       * @access  private
       */
      private function getWidth()
      {
        return "{$this->width}px";
      }

      /**
       * Get Height
       *
       * Get and return the height attribute with the px attached
       *
       * @method  getHeight
       * @return  string
       * @access  private
       */
      private function getHeight()
      {
        return "{$this->height}px";
      }

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      /**
       * Set Width
       *
       * Set the width value
       *
       * @method  setWidth
       * @param   int       $width
       * @access  private
       */
      private function setWidth( $width )
      {
        $this->width = $width;
      }

      /**
       * Set Height
       *
       * Set the height value
       *
       * @method  setHeight
       * @param   int         $height
       * @access  private
       */
      private function setHeight( $height )
      {
        $this->height = $height;
      }
    }
  }