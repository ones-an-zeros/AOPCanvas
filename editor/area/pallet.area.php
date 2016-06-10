<?php
  /**
   * Pallet Area
   *
   * This is the object that will generate the html for the canvas area
   *
   * @package Canvas
   * @version 1.0.0
   * @author  Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Editor\Area
  {
    /** ************************************************************* */
    /**                      NAMESPACE IMPORT                         */
    /** ************************************************************* */

    /** Import the Group class into this namespace */
    use \Canvas\Editor\Area\Pallet\Group;

    use Canvas\Configuration\Object\Layout;

    /**
     * Class PalletArea
     *
     * @package Canvas\Editor\Area
     */
    class PalletArea
    {
      /** ************************************************************* */
      /**                          CONSTANTS                            */
      /** ************************************************************* */

      /** @const int containerID The key for the container ID in the collection */
      const containerID   = 0;
      /** @const int containerHTML The key for the container html in the collection */
      const containerHTML = 1;
      /** @const int groups The key for the groups array in the collection */
      const groups        = 2;

      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      /** @var array $collection This is the data collection all information is stored here */
      private $collection = [
        self::containerID   => null,
        self::containerHTML => '<section id="%s"><ul>%s</ul></section>',
        self::groups        => null
      ];

      /** ************************************************************* */
      /**                         BASE METHODS                          */
      /** ************************************************************* */

      /**
       * PalletArea constructor.
       *
       * Construct the Pallet Area Object
       *
       * @method  _construct
       * @param   array       $groups
       * @access  public
       */
      public function __construct( $groups )
      {
        $layout = Layout::getInstance();
        $this->collection[self::containerID]  = $layout->pallet()->id();


        $this->constructGroups( $groups );
      }

      /**
       * PalletArea destructor.
       *
       * Destruct the Pallet Area Object
       *
       * @method  _destruct
       * @access  public
       */
      public function __destruct()
      {
        unset(
          $this->collection[self::containerID],
          $this->collection[self::containerHTML],
          $this->collection[self::groups],
          $this->collection
        );
      }

      /** ************************************************************* */
      /**                            RENDER                             */
      /** ************************************************************* */

      /**
       * Render
       *
       * This method renders the pallet area object html
       *
       * @method  render
       * @return  string
       * @access  public
       */
      public function render()
      {
        return sprintf(
          $this->collection[self::containerHTML],
          $this->collection[self::containerID],
          $this->renderGroups()
        );
      }

      /**
       * Render Groups
       *
       * This will render all of the group objects
       *
       * @method  renderGroups
       * @return  string
       * @access  private
       */
      private function renderGroups()
      {
        $html = '';
        foreach( $this->collection[self::groups] as $group ){
          $html .= $group->render();
        }
        return $html;
      }

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      /**
       * Set Container ID
       *
       * This will set the container ID
       *
       * @method  setContainerID
       * @param   int|null        $ID
       * @access  private
       */
      private function setContainerID( $ID = null )
      {
        if( $ID === null ){
          $ID = CANVAS_PALLET_ID;
        }
        $this->collection[self::containerID] = $ID;
      }

      /** ************************************************************* */
      /**                         CONSTRUCTORS                          */
      /** ************************************************************* */

      /**
       * Construct Groups
       *
       * This will construct all of the group objects
       *
       * @method  constructGroups
       * @param   array           $groups
       * @access  private
       */
      private function constructGroups( $groups )
      {
        foreach( $groups as $key => $group ){
          $this->collection[self::groups][] = new Group( $key, $group );
        }
      }
    }
  }