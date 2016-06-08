<?php


  namespace Canvas\Editor\Area\Canvas
  {

    class Editable
    {
      const containerHTML   = 0;

      const coordinate      = 1;

      const dimension       = 2;

      const key             = 3;

      const content         = 4;

      const style           = 5;

      private $collection = [
        self::containerHTML   => '<div id="%s" style="position:absolute;top:%spx;left:%spx;width:%spx;height:%spx;%s">%s</div>',
        self::coordinate      => null,
        self::dimension       => null,
        self::key             => null,
        self::content         => null,
        self::style           => null
      ];



      public function __construct( $key, $data )
      {
        $this->setContent( $data->content );

        $this->constructStyle( $data->style );

        $this->constructKey( $data->key->group, $data->key->editor );

        $this->constructCoordinate( $data->coordinate->x, $data->coordinate->y );

        $this->constructDimension( $data->dimension->width, $data->dimension->height );
      }

      public function __destruct()
      {

      }


      public function render()
      {
        return sprintf(
          $this->collection[self::containerHTML],
          $this->collection[self::key]->editableID(),
          $this->collection[self::coordinate]->x(),
          $this->collection[self::coordinate]->y(),
          $this->collection[self::dimension]->width(),
          $this->collection[self::dimension]->height(),
          $this->renderStyle(),
          $this->collection[self::content]
        );
      }

      private function renderStyle()
      {
        $html = '';
        if( count( $this->collection[self::style] ) ){
          foreach( $this->collection[self::style] as $key => $value ){
            $html .= "{$key}:{$value};";
          }
        }
        return $html;
      }

      private function setContent( $content )
      { $this->collection[self::content] = $content; }

      private function constructStyle( $style )
      {
        if( count( $style ) ) {
          foreach ($style as $key => $value) {
            $this->collection[self::style][$key] = $value;
          }
        }
      }

      private function constructKey( $group, $editor )
      { $this->collection[self::key] = new Key( $group, $editor ); }

      private function constructCoordinate( $x, $y )
      { $this->collection[self::coordinate] = new Coordinate( $x, $y ); }

      private function constructDimension( $width, $height )
      { $this->collection[self::dimension] = new Dimension( $width, $height ); }
    }
  }