<?php
  /**
   * Canvas Program
   *
   * This is the canvas program module. This file contains the main interface for the canvas program. This is
   * the only file that should be accessed from outside the canvas directory. Let it do the work for you!
   *
   * @package canvas
   * @version 1.0.0
   * @author Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas
  {

    use Canvas\Editor\Editor;

    /** *********************************************************************************************************** */
    /**                                                  INCLUDES                                                   */
    /** *********************************************************************************************************** */

    include_once('configuration/include.configuration.php');


    /**
     * Class Canvas
     *
     * @package Canvas
     */
    class Canvas
    {
      /** *********************************************************************************************************** */
      /**                                                 VARIABLES                                                   */
      /** *********************************************************************************************************** */

      /** @var Editor $editor The html container */
      private $editor;
      /** @var string $cssTag The css tag string we can use sprintf to build a css tag */
      private static $cssTag = '<link href="%s" rel="stylesheet" />';
      /** @var array $cssFiles An array of the css files */
      private static $cssFiles = [
        '//fonts.googleapis.com/css?family=Open+Sans',
        'style/container.css',
        'style/canvas.css',
        'style/pallet.css',
        'style/title.css'
      ];
      /** @var string $javascriptTag The javascript tag string we can use sprintf to build a javascript tag */
      private static $javascriptTag = '<script src="%s" type="text/javascript"></script>';
      /** @var array $javascriptFiles An array of the javascript files */
      private static $javascriptFiles = [
        'javascript/pallet.object.js',
        '//use.fontawesome.com/637b859a5b.js',
        '//code.jquery.com/jquery-1.12.4.min.js'
      ];
      /** @var string $onReady The javascript tag string we can use for the onload */
      private static $onReady = '<script type="text/javascript">$(document).ready(function(){ %s });</script>';

      /** *********************************************************************************************************** */
      /**                                                OBJECTS                                                      */
      /** *********************************************************************************************************** */

      private $log;

      private $styleBuilder;

      private $scriptBuilder;


      /** *********************************************************************************************************** */
      /**                                                METHODS                                                      */
      /** *********************************************************************************************************** */

      private function constructor()
      {
        try {

        } catch ( \Exception $exception ){
          self::exception( $exception );
        }
      }

      /** *********************************************************************************************************** */
      /**                                               RENDERING                                                     */
      /** *********************************************************************************************************** */

      /**
       * Render
       *
       * This will render the canvas interface
       *
       * @method  render
       * @param   array   $data
       * @return  string
       * @access  public
       * @static
       */
      public static function render( $data )
      {
        try{
          /** @var \Canvas\Canvas $instance The current instance of the Canvas object */
          $instance = self::getInstance();
          /** @var Editor editor The Editor object */
          $instance->editor = new Editor( $data );
          return $instance->editor->render();
        } catch ( \Exception $exception ){
          self::exception( $exception );
        }
      }

      /**
       * Javascript On Ready
       *
       * This function will load all of the javascript that needs to run on
       * document ready.
       *
       * @method  javascriptOnReady
       * @return  string
       * @access  public
       * @static
       */
      public static function javascriptOnReady()
      {
        try {
          return sprintf (self::$onReady, 'CanvasPallet.initialize();');
        } catch ( \Exception $exception ){
          self::exception( $exception );
        }
      }

      /**
       * Javascript
       *
       * This method builds and returns all of the javascript tags
       *
       * @method  javascript
       * @return  string
       * @access  public
       * @static
       */
      public static function javascript()
      {
        try {
          $html = self::buildTags (self::$javascriptFiles, self::$javascriptTag);
          /** Check if we are in development mode */
          if (CANVAS_DEVELOPMENT_MODE) {
            /** Append the development javascript files */
            $html .= self::buildTags (['javascript/development.object.js'], self::$javascriptTag);
          }
          return $html;
        } catch ( \Exception $exception ){
          self::exception( $exception );
        }
      }

      /**
       * CSS
       *
       * This method builds and returns all of the required css tags
       *
       * @method  css
       * @return  string
       * @access  public
       * @static
       */
      public static function css()
      {
        try{
          $html = self::buildTags( self::$cssFiles, self::$cssTag );
          /** Check if we are in development mode */
          if( CANVAS_DEVELOPMENT_MODE ){
            /** Append the development css files */
            $html .= self::buildTags( ['style/development.css'], self::$cssTag );
          }
          return $html;
        } catch ( \Exception $exception ){
          self::exception( $exception );
        }
      }

      /**
       * Build Tags
       *
       * This method builds the requested tags from the passed array of files
       *
       * @method  buildTags
       * @param   array     $files
       * @param   string    $tag
       * @return  string
       * @access  private
       * @static
       */
      private static function buildTags( $files, $tag )
      {
        try {
          $html = '';
          $path = CANVAS_DEVELOPMENT_MODE ? CANVAS_DEVELOPMENT_URL : CANVAS_LIVE_URL;
          foreach ($files as $file) {
            $fullpath = $path.$file;
            if( substr($file, 0, 2) === '//' ){
              $fullpath = $_SERVER['REQUEST_SCHEME'].':'.$file;
            }
            $html .= sprintf ($tag, $fullpath).PHP_EOL;
          }
          return $html;
        } catch ( \Exception $exception ){
          self::exception( $exception );
        }
      }

      /** *********************************************************************************************************** */
      /**                                               EXCEPTION                                                     */
      /** *********************************************************************************************************** */

      private static function exception( $exception )
      {
        echo $exception->prettyPrint();
      }

      /** *********************************************************************************************************** */
      /**                                               SINGLETON                                                     */
      /** *********************************************************************************************************** */

      /** @var \Canvas\Canvas $instance This is the active canvas instance or null */
      private static $instance;

      /**
       * Singleton constructor.
       *
       * Set the constructor method to private so that it can not be called on externally. Or used
       * in any way. Singletons should always use the get instance function
       *
       * @method  __construct
       * @access  protected
       */
      protected function __construct(){}
      /**
       * Clone
       *
       * Set the __clone method to private and final. This will avoid the chance for it to be called
       * or re-written. A singleton object should never be cloned.
       *
       * @method  __clone
       * @access  private
       * @final
       */
      private final function __clone(){}
      /**
       * Wake up
       *
       * Set the __wakeup method to public and final. This will avoid the chance for it to be called
       * or re-written. A singleton object should be put to sleep or woken up.
       *
       * @method  __wakeup
       * @access  public
       * @final
       */
      public final function __wakeup(){}
      /**
       * Get an Instance
       *
       * Check if an instances of the object using this trait has been created. If an instance of the
       * object has been created return that instance. If an instance has not been created make a
       * new one. and return that.
       *
       * @method  getInstance
       * @return  \Canvas\Canvas
       * @access  public
       * @static
       */
      public static function getInstance()
      {
        /** Check if an instance of this object exists */
        if( !(self::$instance instanceof self) ){
          /** No instances exists use late state binding to make one */
          self::$instance = new self;
          /** Check if this object has a sub constructor */
          if( method_exists(self::$instance, 'constructor') ){
            /** Run the constructor */
            self::$instance->constructor();
          }
        }
        /** Return the object instance */
        return self::$instance;
      }
    }
  }