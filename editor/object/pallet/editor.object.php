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

      private $containerHTML = '<li id="%s" class="active">%s%s</li>';

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

      /**
       * Editor constructor.
       *
       * This is the constructor for the editor object
       *
       * @method  __construct
       * @param   resource      $editor
       * @access  public
       */
      public function __construct( $editor )
      {
        /** Set the key value */
        $this->setKey( $editor->key );
        /** Set the label value */
        $this->setLabel( $editor->label );
        /** Set the container value */
        $this->setContainerID( null );
        /** Set the button ID */
        $this->setButtonID( null );
        /** Set the button text */
        $this->setButtonText( null );
        /** Construct all the parts */
        $this->constructParts( $editor->parts );
      }

      /**
       * Editor destructor.
       *
       * This is the destructor for the editor object
       *
       * @method  __destruct
       * @access  public
       */
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

      /**
       * Render
       *
       * This method does all the leg work to render this editor
       *
       * @method  render
       * @return  string
       * @access  public
       */
      public function render()
      {
        return sprintf( $this->containerHTML, $this->getKey(), $this->renderLabel(), $this->renderEditor() );
      }

      /**
       * Render Label
       *
       * This function will generate the label html
       *
       * @method  renderLabel
       * @return  string
       * @access  private
       */
      private function renderLabel()
      {
        return sprintf( $this->labelHTML, $this->getLabel() );
      }

      /**
       * Render Editor
       *
       * This method will generate all the html returned from the parts and return it
       *
       * @method  renderEditor
       * @return  string
       * @access  private
       */
      private function renderEditor()
      {
        $editor = '';
        foreach( $this->parts as $part ){
          $editor .= $part->render();
        }
        return sprintf( $this->editorHTML, $editor, $this->renderButton() );
      }

      /**
       * Render Button
       *
       * This method will generate the button html and return it
       *
       * @method  renderButton
       * @return  string
       * @access  private
       */
      private function renderButton()
      {
        return sprintf( $this->buttonHTML, $this->getKey(), $this->getKey(), $this->getButtonText() );
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      /**
       * Get Key
       *
       * Get the value of the key member
       *
       * @method  getKey
       * @return  int
       * @access  private
       */
      private function getKey()
      {
        return $this->key;
      }

      /**
       * Get Label
       *
       * Get the value of the Label member
       *
       * @method  getLabel
       * @return  int
       * @access  private
       */
      private function getLabel()
      {
        return $this->label;
      }

      /**
       * Get ContainerID
       *
       * Get the value of the ContainerID member
       *
       * @method  getContainerID
       * @return  int
       * @access  private
       */
      private function getContainerID()
      {
        return $this->containerID;
      }

      /**
       * Get ButtonID
       *
       * Get the value of the ButtonID member
       *
       * @method  getButtonID
       * @return  int
       * @access  private
       */
      private function getButtonID()
      {
        return $this->buttonID;
      }

      /**
       * Get ButtonText
       *
       * Get the value of the ButtonText member
       *
       * @method  getButtonText
       * @return  int
       * @access  private
       */
      private function getButtonText()
      {
        return $this->buttonText;
      }

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      /**
       * Set Key
       *
       * Set the value of the Key member
       *
       * @method  setKey
       * @access  private
       */
      private function setKey( $key = null )
      {
        if( $key === null ){
          $key = 01;
        }
        $this->key = $key;
      }

      /**
       * Set Label
       *
       * Set the value of the Label member
       *
       * @method  setLabel
       * @access  private
       */
      private function setLabel( $label = null )
      {
        if( $label === null ){
          $label = 'No Label Provided';
        }
        $this->label = $label;
      }

      /**
       * Set ContainerID
       *
       * Set the value of the ContainerID member
       *
       * @method  setContainerID
       * @access  private
       */
      private function setContainerID( $ID = null )
      {
        if( $ID === null ){
          $ID = 02;
        }
        $this->containerID = $ID;
      }

      /**
       * Set ButtonID
       *
       * Set the value of the ButtonID member
       *
       * @method  setButtonID
       * @access  private
       */
      private function setButtonID( $ID = null )
      {
        if( $ID === null ){
          $ID = 03;
        }
        $this->buttonID = $ID;
      }

      /**
       * Set ButtonText
       *
       * Set the value of the ButtonText member
       *
       * @method  setButtonText
       * @access  private
       */
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