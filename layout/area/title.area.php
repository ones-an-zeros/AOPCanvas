<?php
  /**
   * Title Area
   *
   * This is the Title area for the editor
   *
   * @package canvas
   * @version 1.0.0
   * @author Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas
  {

    /**
     * Class TitleArea
     *
     * This is the title area
     *
     * @package Canvas
     */
    class TitleArea
    {
      /** ************************************************************* */
      /**                          VARIABLES                            */
      /** ************************************************************* */

      /** @var string $id The id of the canvas container element */
      private $id = CANVAS_TITLE_ID;
      /** @var string $html The html string to populate when making the html */
      private $html = '<section id="%s"><h1>%s</h1><h2>%s</h2></section>';
      /** @var string $productTitle The product title for editor */
      private $productTitle = 'Product Title';
      /** @var string $palletTitle The product title for editor */
      private $palletTitle = 'Customizations';

      /** ************************************************************* */
      /**                        BASE METHODS                           */
      /** ************************************************************* */

      /**
       * TitleArea constructor.
       *
       * This will construct the title area
       *
       * @method  __construct
       * @param   string        $productTitle
       * @param   string        $palletTitle
       * @access  public
       */
      public function __construct( $productTitle, $palletTitle )
      {
        /** @var string $this->productTitle The name of the product */
        $this->setProductTitle( $productTitle );
        /** @var string palletTitle The pallet title */
        $this->setPalletTitle( $palletTitle );
      }

      /**
       * TitleArea destruct.
       *
       * This will destruct the title area
       *
       * @method  __destruct
       * @access  public
       */
      public function __destruct()
      {
        unset(
          $this->id,
          $this->html,
          $this->productTitle,
          $this->palletTitle
        );
      }

      /**
       * Render
       *
       * This will render the title area of the editor
       *
       * @method  render
       * @return  string
       * @access  public
       */
      public function render()
      {
        return sprintf(
          $this->html,
          $this->id,
          $this->getProductTitle(),
          $this->getPalletTitle()
        );
      }

      /** ************************************************************* */
      /**                            GETTERS                            */
      /** ************************************************************* */

      /**
       * Get Product Title
       *
       * Get the value of the product title
       *
       * @method  getProductTitle
       * @return  string
       * @access  private
       */
      private function getProductTitle()
      {
        return $this->productTitle;
      }

      /**
       * Get Pallet Title
       *
       * Get the value of the pallet title
       *
       * @method  getPalletTitle
       * @return  string
       * @access  private
       */
      private function getPalletTitle()
      {
        return $this->palletTitle;
      }

      /** ************************************************************* */
      /**                            SETTERS                            */
      /** ************************************************************* */

      /**
       * Set Product Title
       *
       * Set the value of the product title
       *
       * @method  setProductTitle
       * @param   string            $productTitle
       * @access  private
       */
      private function setProductTitle( $productTitle )
      {
        $this->productTitle = $productTitle;
      }

      /**
       * Set Pallet Title
       *
       * Set the value of the pallet title
       *
       * @method  setPalletTitle
       * @param   string          $palletTitle
       * @access  private
       */
      private function setPalletTitle( $palletTitle )
      {
        $this->palletTitle = $palletTitle;
      }
    }
  }