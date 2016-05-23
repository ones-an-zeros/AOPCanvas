<?php

  namespace Canvas
  {

    class Container
    {


      private $id = CANVAS_CONTAINER_ID;

      private $html = '<div id="%s">%s</div>';

      public function __construct()
      {

      }

      public function __destruct()
      {

      }


      public function render()
      {


        return sprintf( $this->html, $this->id, 'Hey' );
      }
    }
  }