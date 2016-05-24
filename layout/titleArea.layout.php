<?php

namespace Canvas
{

  class TitleArea
  {

    /** @var string $id The id of the canvas container element */
    private $id = CANVAS_TITLE_ID;
    /** @var string $productTitle The product title for editor */
    private $productTitle = 'Product Title';
    /** @var string $palletTitle The product title for editor */
    private $palletTitle  = 'Customizations';
    /** @var string $html The html string to populate when making the html */
    private $html = '<section id="%s"><h1>%s</h1><h2>%s</h2></section>';

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function render()
    {
      return sprintf(
        $this->html,
        $this->id,
        $this->productTitle,
        $this->palletTitle
      );
    }
  }
}