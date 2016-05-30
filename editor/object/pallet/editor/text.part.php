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
    class Text
    {
      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      private $labelHTML = '<label for="%s">%s</label>';

      private $inputHTML = '<input type="text" id="%s" name="%s" placeholder="%s" />';

      private $placeholder;

      private $testValues;

      private $testMessages;


      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */

      public function __construct( $part )
      {

        $this->setType( $part->type );

        $this->setLabel( $part->label );

        $this->setPlaceholder( $part->placeholder );

        $this->setTestValues( $part->testValues );

        $this->setTestMessages( $part->testMessages );

      }

      public function __destruct()
      {

      }

      /** ************************************************************* */
      /**                           RENDERING                           */
      /** ************************************************************* */

      public function render()
      {
        return $this->renderLabel().$this->renderInput();
      }

      private function renderLabel()
      {
        return sprintf( $this->labelHTML, $this->getKey(), $this->getLabel() );
      }

      private function renderInput()
      {
        return sprintf( $this->inputHTML, $this->getKey(), $this->getKey(), $this->getPlaceholder() );
      }


      /**
       * public function isValid( $value )
      {
        $messages = [];

        if( !is_null( $this->minLength ) && strlen( $value ) >= $this->minLength ){
          $messages[] = $this->minLengthMessage;
        }

        if( !is_null( $this->maxLength ) && strlen( $value ) <= $this->maxLength ){
          $messages[] = $this->maxLengthMessage;
        }

        return [
          'outcome' => sizeof( $messages ) === 0 ? false : true,
          'messages' => $messages
        ];
      }
       */

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