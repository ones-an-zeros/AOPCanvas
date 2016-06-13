<?php
  /**
   * Text Object
   *
   * This is a support object for the editors. This is the text part.
   *
   * @package Canvas
   * @version 1.0.0
   * @author  Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor\Area\Pallet\Editor
  {

    /**
     * Class text
     *
     * @package Canvas\Editor\Area\Pallet\Editor
     */
    class Text extends PartAbstract implements PartInterface
    {
      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      private $inputHTML = '<input type="text" id="%s" name="%s" placeholder="%s" class="part-input" />';

      private $placeholder;

      private $testValues;

      private $testMessages;


      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */

      public function __construct( $data )
      {

        $this->setType( $data->type );

        $this->setLabel( $data->label );

        $this->setPlaceholder( $data->placeholder );

        $this->setTestValues( $data->testValues );

        $this->setTestMessages( $data->testMessages );

        $this->constructAction( $data->action );

        $this->constructTest( $data );

      }

      public function __destruct()
      {

      }

      /** ************************************************************* */
      /**                           RENDERING                           */
      /** ************************************************************* */

      public function render()
      { return $this->renderContainer($this->renderLabel().$this->renderInput()); }
      
      private function renderInput()
      {
        return sprintf( $this->inputHTML, $this->getKey(), $this->getKey(), $this->getPlaceholder() );
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      private function getPlaceholder()
      {
        return $this->placeholder;
      }

      private function getTestValues()
      {
        return $this->testValues;
      }

      private function getTestMessages()
      {
        return $this->testMessages;
      }

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      private function setPlaceholder( $placeholder = null )
      {
        if( $placeholder === null ){
          $placeholder = 'No placeholder provided';
        }
        $this->placeholder = $placeholder;
      }

      private function setTestValues( $testValues = null )
      {
        if( $testValues === null ){
          $testValues = [];
        }
        $this->testValues = $testValues;
      }

      private function setTestMessages( $testMessages = null )
      {
        if( $testMessages === null ){
          $testMessages = [];
        }
        $this->testMessages = $testMessages;
      }
    }
  }