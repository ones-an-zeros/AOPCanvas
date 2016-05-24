<?php

  namespace Canvas
  {

    class Container
    {
      /** @var string $id The id of the canvas container element */
      private $id = CANVAS_CONTAINER_ID;
      /** @var string $html The html string to populate when making the html */
      private $html = '<div id="%s">%s<div style="clear:left;"></div></div>';


      public function __construct()
      {
        $this->titleArea  = new TitleArea();
        $this->canvasArea = new CanvasArea();
        $this->palletArea = new PalletArea();
      }

      public function __destruct()
      {

      }
      
      public function render()
      {
        return sprintf(
          $this->html,
          $this->id,
          $this->titleArea->render ().
          $this->canvasArea->render().
          $this->palletArea->render()
        );
      }
    }
  }