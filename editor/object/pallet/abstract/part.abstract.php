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

    use Canvas\Editor\Area\Pallet\Action;

    use Canvas\Editor\Area\Pallet\Test;

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

      protected $type;

      protected $key;

      protected $label;

      protected $action;

      protected $test;

      /** ************************************************************* */
      /**                        HTML CONTAINERS                        */
      /** ************************************************************* */

      protected $containerHTML  = '<span class="editor-part">%s %s %s</span>';

      protected $labelHTML      = '<label for="%s">%s</label>';

      /** ************************************************************* */
      /**                           RENDER                              */
      /** ************************************************************* */

      protected function renderContainer( $content )
      { return sprintf( $this->containerHTML, $content, $this->action->render(), $this->test->render() ); }


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


      protected function renderStyle( $styles )
      {
        if( !count( $styles ) ) {
          return "";
        }
        $html = ' style="';
        foreach( $styles as $name => $value ){
          $html .= $name.':'.$value.';';
        }
        return $html.'"';
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


      protected function constructAction( $data )
      {
        $this->action = new Action(
          $data->type,
          $data->target,
          $data->attribute
        );
      }

      protected function constructTest( $data )
      {
        $values   = isset($data->testValues)?$data->testValues:[];
        $messages = isset($data->testMessages)?$data->testMessages:[];
        $this->test = new Test( $values, $messages );
      }
    }
  }