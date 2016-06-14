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
    /** ************************************************************* */
    /**                      NAMESPACE IMPORT                         */
    /** ************************************************************* */

    /**
     * Class Editor
     *
     * @package Canvas\Editor\Area\Pallet
     */
    class Editor
    {
      /** ************************************************************* */
      /**                          CONSTANTS                            */
      /** ************************************************************* */

      /** @const int containerHTML The key for the container html in the collection */
      const containerHTML   = 0;
      /** @const int iconHTML The key for the icon html in the collection */
      const iconHTML        = 1;
      /** @const int labelHTML The key for the label html in the collection */
      const labelHTML       = 2;
      /** @const int editorHTML The key for the editor html in the collection */
      const editorHTML      = 3;
      /** @const int buttonHTML The key for the button html in the collection */
      const buttonHTML      = 4;
      /** @const int containerID The key for the button html in the collection */
      const containerID     = 5;
      /** @const int editorID The key for the editor ID in the collection */
      const editorID        = 6;
      /** @const int buttonID The key for the button ID in the collection */
      const buttonID        = 7;
      /** @const int buttonText The key for the button text in the html */
      const buttonText      = 8;
      /** @const int key The key for the key in the collection */
      const key             = 9;
      /** @const int label The key for the label in the collection */
      const label           = 10;
      /** @const int parts The key for the parts in the collection */
      const parts           = 11;



      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      private $namespace = '\\Canvas\\Editor\\Area\\Pallet\\Editor\\';
      
      /** @var array $collection This is the main collection all data is stored here */
      private $collection = [
        self::containerHTML   => '<li class="editor">%s%s</li>',
        self::iconHTML        => '<i class="fa fa-plus-square" aria-hidden="true">&nbsp;</i>',
        self::labelHTML       => '<span class="editor-button">%s %s</span>',
        self::editorHTML      => '<span class="form">%s%s</span>',
        self::buttonHTML      => '<button id="%s" name="%s" class="submit"><i class="fa fa-check-square">&nbsp;</i>%s</button>',
        self::containerID     => null,
        self::editorID        => null,
        self::buttonID        => null,
        self::buttonText      => null,
        self::key             => null,
        self::label           => null,
        self::parts           => null,
      ];

      /** @var array $partClasses This is a collection of part classes */
      protected $partClasses = [
        0 => 'Text',
        1 => 'Select'
      ];

      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */

      public function __construct( $key, $editor )
      {
        /** Set the key value */
        $this->setKey( $key );
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
        return sprintf(
          $this->collection[self::containerHTML],
          $this->renderLabel(),
          $this->renderEditor()
        );
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
        return sprintf(
          $this->collection[self::labelHTML],
          $this->collection[self::iconHTML],
          $this->label()
        );
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
        if( count($this->collection[self::parts]) ) {
          foreach ($this->collection[self::parts] as $part) {
            $editor .= $part->render();
          }
        }
        return sprintf(
          $this->collection[self::editorHTML],
          $editor,
          $this->renderButton()
        );
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
        return sprintf(
          $this->collection[self::buttonHTML],
          $this->key(),
          $this->key(),
          $this->buttonText()
        );
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      /**
       * Get Key
       *
       * Get the value of the key member
       *
       * @method  key
       * @return  string
       * @access  private
       */
      private function key()
      { return $this->collection[self::key]; }

      /**
       * Get Label
       *
       * Get the value of the Label member
       *
       * @method  label
       * @return  string
       * @access  private
       */
      private function label()
      { return $this->collection[self::label]; }

      /**
       * Get ContainerID
       *
       * Get the value of the ContainerID member
       *
       * @method  containerID
       * @return  string
       * @access  private
       */
      private function containerID()
      { return $this->collection[self::containerID]; }

      /**
       * Get ButtonID
       *
       * Get the value of the ButtonID member
       *
       * @method  buttonID
       * @return  string
       * @access  private
       */
      private function buttonID()
      { return $this->collection[self::buttonID]; }

      /**
       * Get Button Text
       *
       * Get the value of the ButtonText member
       *
       * @method  buttonText
       * @return  string
       * @access  private
       */
      private function buttonText()
      { return $this->collection[self::buttonText]; }

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
        $this->collection[self::key] = $key;
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
          $label = '';
        }
        $this->collection[self::label] = $label;
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
          $ID = null;
        }
        $this->collection[self::containerID] = $ID;
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
          $ID = null;
        }
        $this->collection[self::buttonID] = $ID;
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
          $text = 'Save';
        }
        $this->collection[self::buttonText] = $text;
      }

      /** ************************************************************* */
      /**                         CONSTRUCTORS                          */
      /** ************************************************************* */

      /**
       * Construct Parts
       *
       * Construct all of the part objects
       *
       * @method  constructParts
       * @param   array           $parts
       * @access  private
       */
      private function constructParts( $parts )
      {
        foreach( $parts as $part ){
          $class = $this->partClass($part->type);
          $this->collection[self::parts][] = new $class( $part );
        }
      }

      private function partClass( $type )
      { return $this->namespace.$this->partClasses[$type]; }
    }
  }