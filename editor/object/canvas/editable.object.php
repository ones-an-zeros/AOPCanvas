<?php


  namespace Canvas\Editor\Area\Canvas
  {

    class Editable
    {
      const coordinate  = 0;

      const dimension   = 1;
      
      private $coordinate;

      private $dimension;

      private $content = 'editable';



      public function __construct( $data )
      {

        $this->constructCoordinate( $data['x'], $data['y'] );

        $this->constructDimension( $data['width'], $data['height'] );
      }

      public function __destruct()
      {

      }


      private function constructCoordinate( $x, $y )
      {
        $this->coordinate = new Coordinate( $x, $y );
      }

      private function constructDimension( $width, $height )
      {
        $this->dimension = new Dimension( $width, $height );
      }
    }
  }