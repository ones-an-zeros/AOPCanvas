<?php
  /**
   * Pallet Area
   *
   * This is the object that will generate the html for the canvas area
   *
   * @package Canvas
   * @version 1.0.0
   * @author Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor\Area
  {

    /**
     * Class PalletArea
     *
     * @package Canvas\Editor\Area
     */
    class PalletArea
    {
      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      private $containerID;

      private $containerHTML = '<section id="%s"><ul>%s</ul></section>';

      private $groups = [];

      public function __construct( $groups )
      {

        $this->setContainerID();

        $this->constructGroups( $groups );
      }

      public function __destruct()
      {

      }

      public function render()
      {
        return sprintf( $this->containerHTML, $this->containerID, $this->renderGroups() );
      }

      private function renderGroups()
      {
        $html = '';
        foreach( $this->groups as $group ){
          $html .= $group->render();
        }
        return $html;
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      private function setContainerID( $ID = null )
      {
        if( $ID === null ){
          $ID = CANVAS_PALLET_ID;
        }
        $this->containerID = $ID;
      }

      /** ************************************************************* */
      /**                         CONSTRUCTORS                          */
      /** ************************************************************* */

      private function constructGroups( $groups )
      {
        foreach( $groups as $group ){
          $this->groups[] = new \Canvas\Editor\Area\Pallet\Group( $group );
        }
      }
    }
  }
/**
 * <ul>
<li>
<i class="fa fa-plus-square" aria-hidden="true"></i>Menu Group 1
<ul>
<li>Option 1</li>
<li>Option 2</li>
<li>Option 3</li>
<li>Option 4</li>
<li>Option 5</li>
</ul>
</li>
<li class="active">
<i class="fa fa-plus-square" aria-hidden="true"></i>Menu Group 2
<ul>
<li>Option 1</li>
<li>Option 2</li>
<li>Option 3</li>
<li>Option 4</li>
<li>Option 5</li>
</ul>
</li>
<li>
<i class="fa fa-plus-square" aria-hidden="true"></i>Menu Group 3
<ul>
<li>Option 1</li>
<li>Option 2</li>
<li>Option 3</li>
<li>Option 4</li>
<li>Option 5</li>
</ul>
</li>
</ul>
 */