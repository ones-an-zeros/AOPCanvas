<?php
  /**
   * Coordinate
   *
   *
   *
   * @package Canvas
   * @version 1.0.0
   * @author  Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor\Area\Canvas
  {

    class Coordinate
    {
      const x = 0;

      const y = 1;

      private $collection = [ self::x => null, self::y => null, ];

      public function __construct( $x, $y )
      {
        $this->setX( $x );

        $this->setY( $y );
      }

      public function __destruct()
      {
        unset(
          $this->collection[self::x],
          $this->collection[self::y],
          $this->collection
        );
      }

      public function x()
      {
        return $this->collection[self::x];
      }

      public function y()
      {
        return $this->collection[self::y];
      }


      private function setX( $x )
      {
        $this->collection[self::x] = $x;
      }

      private function setY( $y )
      {
        $this->collection[self::y] = $y;
      }
    }
  }