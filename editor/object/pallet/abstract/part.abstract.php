<?php
  /**
   * Part Interface
   *
   * This is the part abstract it will provide all common methods
   *
   * @package Canvas
   * @version 1.0.0
   * @author  Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor\Area\Pallet\Editor
  {

    /**
     * Class PartAbstract
     *
     * @package Canvas\Editor\Area\Pallet\Editor
     */
    abstract class PartAbstract
    {
      /** ************************************************************* */
      /**                           VARIABLES                           */
      /** ************************************************************* */

      /** @var int $type The part type id */
      protected $type;
      /** @var int $key The part key */
      protected $key;
      /** @var string The label for this part */
      protected $label;

      /** ************************************************************* */
      /**                        HTML CONTAINERS                        */
      /** ************************************************************* */

      protected $labelHTML = '<label for="%s">%s</label>';

      /** ************************************************************* */
      /**                           RENDER                              */
      /** ************************************************************* */

      /**
       * Render Label
       *
       * Render the label html and return it populated
       *
       * @method  renderLabel
       * @param   null|string   $for
       * @param   null|string   $label
       * @return  string
       * @access  protected
       */
      protected function renderLabel( $for = null, $label = null )
      {
        if( $for === null ){
          $for = 'set me';
        }
        if( $label === null ){
          $label = $this->getLabel();
        }
        return sprintf( $this->labelHTML, $for, $label );
      }

      /** ************************************************************* */
      /**                           GETTERS                             */
      /** ************************************************************* */

      /**
       * Get Type
       *
       * Get the part Type value
       *
       * @method  getType
       * @return  int
       * @access  protected
       */
      protected function getType()
      {
        return $this->type;
      }

      /**
       * Get Key
       *
       * Get the part Key value
       *
       * @method  getKey
       * @return  int
       * @access  protected
       */
      protected function getKey()
      {
        return $this->key;
      }

      /**
       * Get Label
       *
       * Get the part Label value
       *
       * @method  getLabel
       * @return  string
       * @access  protected
       */
      protected function getLabel()
      {
        return $this->label;
      }

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      /**
       * Set Type
       *
       * Set the part Type value
       *
       * @method  setType
       * @param   null|int  $type
       * @access  protected
       */
      protected function setType( $type = null )
      {
        if( $type === null ){
          $type = 0;
        }
        $this->type = $type;
      }

      /**
       * Set Key
       *
       * Set the part Key value
       *
       * @method  setKey
       * @param   null|int  $key
       * @access  protected
       */
      protected function setKey( $key = null )
      {
        if( $key === null ){
          $key = 0;
        }
        $this->key = $key;
      }

      /**
       * Set Label
       *
       * Set the part Label value
       *
       * @method  setLabel
       * @param   null|int  $label
       * @access  protected
       */
      protected function setLabel( $label = null )
      {
        if( $label === null ){
          $label = 'No Label Provided';
        }
        $this->label = $label;
      }

    }
  }