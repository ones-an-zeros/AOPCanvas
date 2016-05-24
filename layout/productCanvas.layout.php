<?php

namespace Canvas
{

  class ProductCanvas
  {

    /** @var string $id The id of the canvas container element */
    private $id = CANVAS_PRODUCT_CANVAS_ID;
    /** @var string $html The html string to populate when making the html */
    private $html = '<canvas id="%s">%s</canvas>';

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function render()
    {
      return sprintf( $this->html, $this->id, '' );
    }
  }
}