<?php
  /**
   * Group Object
   *
   * This is the object that will generate the html for the canvas area
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

    /** Import the editor object into this namespace */
    use \Canvas\Editor\Area\Pallet\Editor;

    /**
     * Class Group
     *
     * @package Canvas\Editor\Area\Pallet
     */
    class Group
    {
      /** ************************************************************* */
      /**                          CONSTANTS                            */
      /** ************************************************************* */

      /** @const int containerID This is the key for the container ID in the collection */
      const containerID   = 0;
      /** @const int containerHTML This is the key for the container HTML in the collection */
      const containerHTML = 1;
      /** @const int iconHTML This is the key for the icon html in the collection */
      const iconHTML      = 2;
      /** @const int key This is the key for the key in the collection */
      const key           = 3;
      /** @const int label This is the key for the label in the collection */
      const label         = 4;
      /** @cosnt int editors This is the key for the editors in the collection */
      const editors       = 5;

      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      /** @var array $collection This is the main collection all information is stored here */
      private $collection = [
        self::containerID   => null,
        self::containerHTML => '<li id="%s" class="group"><span class="group-button">%s %s</span><ul>%s</ul></li>',
        self::iconHTML      => '<i class="fa fa-plus-square" aria-hidden="true">&nbsp;</i>',
        self::key           => null,
        self::label         => null,
        self::editors       => null
      ];

      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */

      /**
       * Group constructor.
       *
       * Construct the group object
       *
       * @method  __construct
       * @param   int           $key
       * @param   resource      $group
       * @access  public
       */
      public function __construct( $key, $group )
      {
        $this->setKey( $key );
        $this->setLabel( $group->label );
        $this->constructEditors( $group->editors );
      }

      /**
       * Group destructor.
       *
       * Destruct the group object
       *
       * @method  __destruct
       * @access  public
       */
      public function __destruct()
      {
        unset(
          $this->collection[self::containerID],
          $this->collection[self::containerHTML],
          $this->collection[self::iconHTML],
          $this->collection[self::key],
          $this->collection[self::label],
          $this->collection[self::editors],
          $this->collection
        );
      }

      /** ************************************************************* */
      /**                           RENDERING                           */
      /** ************************************************************* */

      /**
       * Render
       *
       * Render the group html
       *
       * @method  render
       * @return  string
       * @access  public
       */
      public function render()
      {
        return sprintf(
          $this->collection[self::containerHTML],
          $this->key(),
          $this->collection[self::iconHTML],
          $this->label(),
          $this->renderEditors()
        );
      }

      /**
       * Render Editors
       *
       * This will render all of the editor objects
       *
       * @method  renderEditors
       * @return  string
       * @access  private
       */
      private function renderEditors()
      {
        $html = '';
        foreach( $this->collection[self::editors] as $editor ){
          $html .= $editor->render();
        }
        return $html;
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      /**
       * Get Key
       *
       * Get and return the key value in the collection
       *
       * @method  key
       * @return  int
       * @access  private
       */
      private function key()
      { return $this->collection[self::key]; }

      /**
       * Get Label
       *
       * Get and return the value of label in the collection
       *
       * @method  label
       * @return  string
       * @access  private
       */
      private function label()
      { return $this->collection[self::label]; }

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      /**
       * Set Key
       *
       * Set the key value in the collection
       *
       * @method  setKey
       * @param   int               $key
       * @access  private
       */
      private function setKey( $key )
      {
        $this->collection[self::key] = $key;
      }

      /**
       * Set Label
       *
       * Set the label value in the collection
       *
       * @method  setLabel
       * @param   string            $label
       * @access  private
       */
      private function setLabel( $label )
      { $this->collection[self::label] = $label; }

      /** ************************************************************* */
      /**                         CONSTRUCTORS                          */
      /** ************************************************************* */

      /**
       * Construct Editors
       *
       * Construct the editor objects
       *
       * @method  constructEditors
       * @param   array             $editors
       * @access  private
       */
      private function constructEditors( $editors )
      {
        foreach( $editors as $editor ){
          $this->collection[self::editors][] = new Editor( $editor );
        }
      }
    }
  }