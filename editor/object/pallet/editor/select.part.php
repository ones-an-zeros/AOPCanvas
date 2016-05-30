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
     * Class select
     *
     * @package Canvas\Editor\Area\Pallet\Editor
     */
    class select
    {

      /** @var string $selectHTML The string used to generate the select container */
      private $selectHTML = '<select id="%s">%s</select>';
      /** @var string $optionHTML The string used to generate the option container */
      private $optionHTML = '<option value="%s">%s</option>';


      public function __construct()
      {

      }

      public function __destruct()
      {

      }


    }
  }