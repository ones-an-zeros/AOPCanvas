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
    /** *********************************************************************************************************** */
    /**                                                  INCLUDES                                                   */
    /** *********************************************************************************************************** */

    include_once('configuration/include.configuration.php');



    class Canvas
    {

      /** *********************************************************************************************************** */
      /**                                                 VARIABLES                                                   */
      /** *********************************************************************************************************** */

      /** @var \Canvas\Container $container The html container */
      private $container;
      /** @var string $cssTag The css tag string we can use sprintf to build a css tag */
      private static $cssTag = '<link href="%s" rel="stylesheet" />'.PHP_EOL;
      /** @var array $cssFiles An array of the css files */
      private static $cssFiles = [
        'https://fonts.googleapis.com/css?family=Open+Sans',
        'style/container.css',
        'style/canvas.css',
        'style/pallet.css',
        'style/title.css'
      ];
      /** @var string $javascriptTag The javascript tag string we can use sprintf to build a javascript tag */
      private static $javascriptTag = '<script src="%s" type="text/javascript"></script>'.PHP_EOL;
      /** @var array $javascriptFiles An array of the javascript files */
      private static $javascriptFiles = [
        'https://use.fontawesome.com/637b859a5b.js',
        'javascript/canvas.js'
      ];

      /** *********************************************************************************************************** */
      /**                                                  METHODS                                                    */
      /** *********************************************************************************************************** */

      private function constructor()
      {
        /** @var \Canvas\Container container This is the canvas html container object and sub objects */
        $this->container = new container();
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
        return self::getInstance()->container->render();
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
        return self::buildTags( self::$javascriptFiles, self::$javascriptTag );
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
        $html = self::buildTags( self::$cssFiles, self::$cssTag );
        /** Check if we are in development mode */
        if( CANVAS_DEVELOPMENT_MODE ){
          /** Append the development css files */
          $html .= self::buildTags( ['style/development.css'], self::$cssTag );
        }
        return $html;
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
        $html = '';
        foreach( $files as $file ){
          $html .= sprintf( $tag, $file );
        }
        return $html;
      }

      /** *********************************************************************************************************** */
      /**                                             CONFIGURATION                                                   */
      /** *********************************************************************************************************** */


      private static function parseData( $data )
      {




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