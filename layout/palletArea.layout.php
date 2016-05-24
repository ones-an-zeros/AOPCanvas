<?php

namespace Canvas
{

  class PalletArea
  {

    /** @var string $id The id of the canvas container element */
    private $id = CANVAS_PALLET_ID;
    /** @var string $html The html string to populate when making the html */
    private $html = '<section id="%s">%s</section>';

    private $controlArea;

    public function __construct()
    {
      $this->controlArea = new ControlArea();
    }

    public function __destruct()
    {

    }

    public function render()
    {
      return sprintf( $this->html, $this->id, '<ul>
        <li>
          <i class="fa fa-plus-square" aria-hidden="true"></i>Menu Group 1
          <ul>
            <li>Option 1</li>
            <li>Option 2</li>
            <li>Option 3</li>
            <li>Option 4</li>
            <li>Option 5</li>
          </ul>
        </li>
        <li class="active">
          <i class="fa fa-plus-square" aria-hidden="true"></i>Menu Group 2
          <ul>
            <li>Option 1</li>
            <li>Option 2</li>
            <li>Option 3</li>
            <li>Option 4</li>
            <li>Option 5</li>
          </ul>
        </li>
        <li>
          <i class="fa fa-plus-square" aria-hidden="true"></i>Menu Group 3
          <ul>
            <li>Option 1</li>
            <li>Option 2</li>
            <li>Option 3</li>
            <li>Option 4</li>
            <li>Option 5</li>
          </ul>
        </li>
      </ul>'.
        $this->controlArea->render()
    );
    }
  }
}