<?php
  /**
   * Canvas Exception
   *
   * This is the base exception object for canvas exceptions
   *
   * @package canvas
   * @version 1.0.0
   * @author  Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Exception
  {

    /**
     * Class CanvasException
     *
     * @package Canvas\Exception
     */
    class CanvasException extends \ErrorException
    {

      /**
       * Pretty Print
       *
       * Return a more humanly readable exception report
       *
       * @method  prettyPrint
       * @return  string
       * @access  public
       */
      public function prettyPrint()
      {
        return '<div id="prettyPrint">
          <h1>'.get_class($this).'</h1>
          <span class="message"><label>Message: </label> '.$this->getMessage().'</span><br />
          <span class="file"><label>File: </label>'.$this->getFile().'</span><br />
          <span class="line"><label>Line: </label>'.$this->getLine().'</span><br />
          <span class="stack"><lable>Stack Trace: </lable><br />
            <pre>'.print_r( $this->getTrace(), true).'</pre>
          </span>
        </div>';
      }
    }
  }