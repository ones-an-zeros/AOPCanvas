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

    use Canvas\Editor\Area\Canvas\Editable;

    /**
     * Class CanvasArea
     *
     * @package Canvas\Editor\Area
     */
    class CanvasArea
    {
      /** ************************************************************* */
      /**                    COLLECTION CONSTANTS                       */
      /** ************************************************************* */

      /** @const int containerHTML This is the key for container html in the collection object */
      const containerHTML = 0;
      /** @const int canvasHTML This is the key for the canvas html in the collection object */
      const canvasHTML    = 1;
      /** @const int containerID This is the key for the container ID in the collection object */
      const containerID   = 2;
      /** @const int canvasID This is the key for the Canvas ID in the collection object */
      const canvasID      = 3;
      /** @const int width This is the key for width in the collection object */
      const width         = 4;
      /** @const int height This is the key for height in the collection object */
      const height        = 5;
      /** @const int editable This is the key for the editables in the collection object */
      const editable      = 6;

      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      /** @var array $collection This is the main collection all data will be stored here */
      private $collection = [
        self::containerHTML   => '<section id="%s">%s</section>',
        self::canvasHTML      => '<div id="%s" style="width:%s;height:%s;">%s</div>',
        self::containerID     => CANVAS_CANVAS_CONTAINER_ID,
        self::canvasID        => CANVAS_CANVAS_ID,
        self::width           => null,
        self::height          => null,
        self::editable        => []
      ];

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
      public function __construct( $width, $height, $editables )
      {
        $this->setWidth( $width );
        $this->setHeight( $height );
        $this->constructEditables( $editables );
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
        return sprintf(
          $this->collection[self::containerHTML],
          $this->collection[self::containerID],
          $this->renderCanvas()
        );
      }

      private function renderCanvas()
      {
        return sprintf(
            $this->collection[self::canvasHTML],
            $this->collection[self::canvasID],
            $this->collection[self::width],
            $this->collection[self::height],
            $this->renderEditables()
        );
      }

      private function renderEditables()
      {
        $HTML = '';
        if( count( $this->collection[self::editable] ) ){
          foreach( $this->collection[self::editable] as $editable ){
            $HTML .= $editable->render();
          }
        }
        return $HTML;
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      /**
       * Get Width
       *
       * Get and return the width attribute with the px attached
       *
       * @method  width
       * @return  string
       * @access  private
       */
      private function width()
      { return $this->collection[self::width]; }

      /**
       * Get Height
       *
       * Get and return the height attribute with the px attached
       *
       * @method  height
       * @return  string
       * @access  private
       */
      private function height()
      { return $this->collection[self::height]; }

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
      { $this->collection[self::width] = $width; }

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
      { $this->collection[self::height] = $height; }

      /**
       * Set Editables
       *
       * Set the editables array
       *
       * @method  setEditables
       * @param   array         $editables
       * @access  private
       */
      private function setEditables( $editables )
      { $this->collection[self::editable] = $editables; }





      private function constructEditables( $editables )
      {
        if( count($editables) ){
          foreach( $editables as $key => $editable ){
            $this->collection[self::editable][] = new Editable( $key, $editable );
          }
        }
      }
    }
  }