<?php
  /**
   * Group Object
   *
   * This is the object that will generate the html for the canvas area
   *
   * @package Canvas
   * @version 1.0.0
   * @author Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor\Area\Pallet
  {

    /**
     * Class Group
     *
     * @package Canvas\Editor\Area\Pallet
     */
    class Group
    {
      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      private $iconHTML = '<i class="fa fa-plus-square" aria-hidden="true">&nbsp;</i>';

      private $containerHTML = '<li id="%s" class="active">%s %s<ul>%s</ul></li>';

      private $containerID;

      private $key;

      private $label;

      private $editors;


      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */

      public function __construct( $group )
      {

        $this->setKey( $group->key );

        $this->setLabel( $group->label );

        $this->constructEditors( $group->editors );

      }

      public function __destruct()
      {

      }

      /** ************************************************************* */
      /**                           RENDERING                           */
      /** ************************************************************* */

      public function render()
      {
        return sprintf(
          $this->containerHTML,
          $this->getKey(),
          $this->iconHTML,
          $this->getLabel(),
          $this->renderEditors()
        );
      }


      private function renderEditors()
      {
        $html = '';
        foreach( $this->editors as $editor ){
          $html .= $editor->render();
        }
        return $html;
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

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      private function setKey( $key )
      {
        $this->key = $key;
      }

      private function setLabel( $label )
      {
        $this->label = $label;
      }

      /** ************************************************************* */
      /**                         CONSTRUCTORS                          */
      /** ************************************************************* */

      private function constructEditors( $editors )
      {
        foreach( $editors as $editor ){
          $this->editors[] = new \Canvas\Editor\Area\Pallet\Editor( $editor );
        }
      }
    }
  }