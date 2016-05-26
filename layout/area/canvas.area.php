<?php

  namespace Canvas
  {

    class CanvasArea
    {

      /** @var \Canvas\ProductCanvas $productCanvas This is the product canvas object */
      private $productCanvas;
      /** @var string $id The id of the canvas container element */
      private $id = CANVAS_CANVAS_ID;
      /** @var string $html The html string to populate when making the html */
      private $html = '<section id="%s">%s</section>';

      public function __construct()
      {
        /** @var \Canvas\ProductCanvas $productCanvas This is the product canvas object */
        $this->productCanvas = new ProductCanvas();
      }

      public function __destruct()
      {

      }

      public function render()
      {
        return sprintf(
          $this->html,
          $this->id,
          $this->productCanvas->render()
        );
      }
    }
  }