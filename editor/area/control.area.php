<?php
  /**
   * Control Area
   *
   * This is the object that will generate the html for the canvas area
   *
   * @package Canvas
   * @version 1.0.0
   * @author Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor\Area
  {

    use Canvas\Configuration\Object\Layout;

    /**
     * Class ControlArea
     *
     * @package Canvas\Editor\Area
     */
    class ControlArea
    {

      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      
      private $containerHTML = '<section id="%s">%s</section>';

      private $saveHTML = '<button id="%s">%s</button>';

      private $resetHTML = '<button id="%s">%s</button>';

      private $containerID;

      private $saveID;

      private $resetID;

      private $saveText;

      private $resetText;

      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */
      
      public function __construct( $saveID = null, $resetID = null, $saveText = null, $resetText = null )
      {

        $layout = Layout::getInstance();
        $this->containerID  = $layout->control()->id();
        $this->saveID       = $layout->control()->id('save');
        $this->resetID      = $layout->control()->id('reset');
        $this->saveText       = $layout->control()->text('save');
        $this->resetText      = $layout->control()->text('reset');



        //$this->setSaveText( $saveText );

        //$this->setResetText( $resetText );
      }

      public function __destruct()
      {

      }

      /** ************************************************************* */
      /**                           RENDERING                           */
      /** ************************************************************* */

      public function render()
      {
        return sprintf( $this->containerHTML, $this->getContainerID(), $this->resetButton(). $this->saveButton() );
      }

      private function saveButton()
      {
        return sprintf( $this->saveHTML, $this->getSaveID(), $this->getSaveText() );
      }

      private function resetButton()
      {
        return sprintf( $this->resetHTML, $this->getResetID(), $this->getResetText() );
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      private function getContainerID()
      {
        return $this->containerID;
      }

      private function getSaveID()
      {
        return $this->saveID;
      }

      private function getResetID()
      {
        return $this->resetID;
      }

      private function getSaveText()
      {
        return $this->saveText;
      }

      private function getResetText()
      {
        return $this->resetText;
      }

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      private function setContainerID( $ID = null )
      {
        if( $ID === null ){
          $ID = CANVAS_CONTROL_ID;
        }
        $this->containerID = $ID;
      }

      private function setSaveID( $ID )
      {
        if( $ID === null ){
          $ID = CANVAS_SAVE_BUTTON_ID;
        }
        $this->saveID = $ID;
      }

      private function setResetID( $ID )
      {
        if( $ID === null ){
          $ID = CANVAS_RESET_BUTTON_ID;
        }
        $this->resetID = $ID;
      }

      private function setSaveText( $text )
      {
        if( $text === null ){
          $text = CANVAS_DEFAULT_SAVE_TEXT;
        }
        $this->saveText = $text;
      }

      private function setResetText( $text )
      {
        if( $text === null ){
          $text = CANVAS_DEFAULT_RESET_TEXT;
        }
        $this->resetText = $text;
      }
    }
  }