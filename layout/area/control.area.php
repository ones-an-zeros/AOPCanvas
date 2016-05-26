<?php

namespace Canvas
{

  class ControlArea
  {

    /** @var string $id The id of the canvas container element */
    private $id = CANVAS_CONTROL_ID;
    /** @var string $html The html string to populate when making the html */
    private $html = '<section id="%s">%s</section>';

    private $saveButton = '<button id="%s">%s</button>';

    private $saveButtonID = 'canvasSaveButton';

    private $saveButtonText = 'Save';

    private $resetButton = '<button id="%s">%s</button>';

    private $resetButtonID = 'canvasResetButton';

    private $resetButtonText = 'Reset';

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    private function saveButton()
    {
      return sprintf( $this->saveButton, $this->saveButtonID, $this->saveButtonText );
    }

    private function resetButton()
    {
      return sprintf( $this->resetButton, $this->resetButtonID, $this->resetButtonText );
    }

    public function render()
    {
      return sprintf(
        $this->html,
        $this->id,
        $this->resetButton().
        $this->saveButton()
      );
    }
  }
}