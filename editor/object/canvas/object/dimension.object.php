<?php
  /**
   * Dimension
   *
   *
   *
   * @package Canvas
   * @version 1.0.0
   * @author  Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor\Area\Canvas
  {

    class Dimension
    {

      const width = 0;

      const height = 1;

      private $collection = [ self::width => null, self::height => null ];

      public function __construct( $width, $height )
      {

        $this->setWidth( $width );

        $this->setHeight( $height );
      }

      public function __destruct()
      {
        unset(
          $this->collection[self::width],
          $this->collection[self::height],
          $this->collection
        );
      }

      public function width()
      {
        return $this->collection[self::width];
      }

      public function height()
      {
        return $this->collection[self::height];
      }

      private function setWidth( $width )
      {
        $this->collection[self::width] = $width;
      }

      private function setHeight( $height )
      {
        $this->collection[self::height] = $height;
      }
    }
  }