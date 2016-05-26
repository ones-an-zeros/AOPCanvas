<?php
  /**
   * Editor
   *
   * This is the editor object for the pallet area
   *
   * @package Canvas
   * @version 1.0.0
   * @author  Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor\Area\Pallet
  {

    /**
     * Class Editor
     *
     * @package Canvas\Editor\Area\Pallet
     */
    class Editor
    {
      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */
      
      private $key;

      private $label;

      private $containerHTML = '<li id="%s">%s%s</li>';

      private $labelHTML = '<span>%s</span>';

      private $editorHTML = '<span>%s%s</span>';

      private $buttonHTML = '<button id="%s" name="%s">%s</button>';

      private $containerID;

      private $buttonID;

      private $buttonText;

      private $parts = [];

      protected $partClasses = [
        0 => 'text'
      ];

      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */

      public function __construct( $editor )
      {

        $this->setKey( $editor->key );

        $this->setLabel( $editor->label );

        $this->setContainerID( null );

        $this->setButtonID( null );

        $this->setButtonText( null );

        $this->constructParts( $editor->parts );

      }

      public function __destruct()
      {
        unset(
          $this->key,
          $this->label,
          $this->buttonText,
          $this->container,
          $this->button,
          $this->parts,
          $this->partClasses
        );
      }

      /** ************************************************************* */
      /**                           RENDERING                           */
      /** ************************************************************* */

      public function render()
      {
        return sprintf( $this->containerHTML, $this->getKey(), $this->renderLabel(), $this->renderEditor() );
      }

      private function renderLabel()
      {
        return sprintf( $this->labelHTML, $this->getLabel() );
      }

      private function renderEditor()
      {
        $editor = '';
        foreach( $this->parts as $part ){
          $editor .= $part->render();
        }
        return sprintf( $this->editorHTML, $editor, $this->renderButton() );
      }

      private function renderButton()
      {
        return sprintf( $this->buttonHTML, $this->getKey(), $this->getKey(), $this->getButtonText() );
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      private function getKey()
      {
        return $this->key;
      }

      private function getLabel()
      {
        return $this->label;
      }

      private function getContainerID()
      {
        return $this->containerID;
      }

      private function getButtonID()
      {
        return $this->buttonID;
      }

      private function getButtonText()
      {
        return $this->buttonText;
      }

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      private function setKey( $key = null )
      {
        if( $key === null ){
          $key = 01;
        }
        $this->key = $key;
      }

      private function setLabel( $label = null )
      {
        if( $label === null ){
          $label = 'No Label Provided';
        }
        $this->label = $label;
      }

      private function setContainerID( $ID = null )
      {
        if( $ID === null ){
          $ID = 02;
        }
        $this->containerID = $ID;
      }

      private function setButtonID( $ID = null )
      {
        if( $ID === null ){
          $ID = 03;
        }
        $this->buttonID = $ID;
      }

      private function setButtonText( $text = null )
      {
        if( $text === null ){
          $text = 'Button Text Not Provided';
        }
        $this->buttonText = $text;
      }

      /** ************************************************************* */
      /**                         CONSTRUCTORS                          */
      /** ************************************************************* */

      private function constructParts( $parts )
      {
        foreach( $parts as $part ){
          $this->parts[] = new \Canvas\Editor\Area\Pallet\Editor\Text( $part );
        }
      }


      private function editorIDString()
      {
        return "Editor:{$this->key}";
      }

      private function buttonIDString()
      {
        return "EditorButton:{$this->key}";
      }

      private function buttonNameString()
      {
        return "EditorButton:{$this->key}";
      }
    }
  }

/**
 * $this->key = $parameters['key'];

$this->label = $parameters['label'];

$this->buttonText = $parameters['buttonText'];

foreach( $parameters['parts'] as $editorData ){
$editorClass = $this->partClasses[$editorData['partKey']];
$this->parts[] = new $editorClass();
}
 *
 * public function getEditor()
{

$content = '';

foreach( $this->parts as $part ){

  $content .= $part->getEditor();
}

$button = sprintf(
  $this->button,
  $this->buttonIDString(),
  $this->buttonNameString(),
  $this->buttonText
);

return sprintf(
  $this->container,
  $this->editorIDString(),
  $content,
  $button
);
}
 */