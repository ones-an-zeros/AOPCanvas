<?php

  namespace Canvas
  {

    class CanvasArea
    {

      /** @var string $id The id of the canvas container element */
      private $id = CANVAS_CANVAS_ID;
      /** @var string $html The html string to populate when making the html */
      private $html = '<section id="%s">%s</section>';

      public function __construct()
      {

      }

      public function __destruct()
      {

      }

      public function render()
      {

        return sprintf( $this->html, $this->id, 'Canvas Area' );
      }
    }
  }