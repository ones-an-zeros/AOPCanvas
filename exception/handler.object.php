<?php
  /**a
   * Part Interface
   *
   * This is the part abstract it will provide all common methods
   *
   * @package Canvas
   * @version 1.0.0
   * @author  Corey Rosamond <corey@ones-n-zeros.com>
   */

  namespace Canvas\Exception
  {
    /** *********************************************************************************************************** */
    /**                                                 PHP INI                                                     */
    /** *********************************************************************************************************** */
    ini_set('display_errors', 0);

    /** *********************************************************************************************************** */
    /**                                         IMPORT EXCEPTION CLASSES                                            */
    /** *********************************************************************************************************** */
    use Canvas\Exception\Type\ArrayToStringConversion;
    use Canvas\Exception\Type\CompileError;
    use Canvas\Exception\Type\CompileWarning;
    use Canvas\Exception\Type\CoreError;
    use Canvas\Exception\Type\CoreWarning;
    use Canvas\Exception\Type\IncludeOnce;
    use Canvas\Exception\Type\MissingArgument;
    use Canvas\Exception\Type\PropertyOfNoneObject;
    use Canvas\Exception\Type\Recoverable;
    use Canvas\Exception\Type\StandardDeprecated;
    use Canvas\Exception\Type\StandardNotice;
    use Canvas\Exception\Type\StandardParse;
    use Canvas\Exception\Type\StandardWarning;
    use Canvas\Exception\Type\Strict;
    use Canvas\Exception\Type\UnDefinedConstant;
    use Canvas\Exception\Type\UnDefinedIndex;
    use Canvas\Exception\Type\UnDefinedVariable;
    use Canvas\Exception\Type\UserDeprecated;
    use Canvas\Exception\Type\UserError;
    use Canvas\Exception\Type\UserNotice;
    use Canvas\Exception\Type\UserWarning;

    /**
     * Class Handle
     *
     * @package Canvas\Exception
     */
    class Handle
    {
      /** *********************************************************************************************************** */
      /**                                                 CONSTANTS                                                   */
      /** *********************************************************************************************************** */

      /** @const int name Index for the name value in match */
      const name        = 0;
      /** @const int matches Index for the matches value in match */
      const matches     = 1;
      /** @const int matchString Index for the match string in the sub matches array */
      const matchString = 0;
      /** @const int matchStart Index for the match start int in the sub matches array */
      const matchStart  = 1;
      /** @const int matchEnd Index for the match end int in the sub matches array */
      const matchEnd    = 2;
      /** @const int matchName Index for the match class n ame in the sub matches array */
      const matchName   = 3;

      /** *********************************************************************************************************** */
      /**                                                 VARIABLES                                                   */
      /** *********************************************************************************************************** */

      /** @var array $match This array contains all the data to qualify exceptions and turn them into more specific exceptions */
      private static $match = [
        E_WARNING => [
          self::name => 'Canvas\Exception\Type\StandardWarning',
          self::matches => [
            [ self::matchString => 'include_once(',                         self::matchStart => 0, self::matchEnd => 13, self::matchName => 'Canvas\Exception\Type\IncludeOnce' ],
            [ self::matchString => 'Missing argument',                      self::matchStart => 0, self::matchEnd => 16, self::matchName => 'Canvas\Exception\Type\MissingArgument' ]
          ]
        ],
        E_NOTICE => [
          self::name => 'Canvas\Exception\Type\StandardNotice',
          self::matches => [
            [ self::matchString => 'Array to string conversion',            self::matchStart => 0, self::matchEnd => 26, self::matchName => 'ArrayToStringConversion' ],
            [ self::matchString => 'Undefined index',                       self::matchStart => 0, self::matchEnd => 15, self::matchName => 'Canvas\Exception\Type\UnDefinedIndex' ],
            [ self::matchString => 'Undefined variable',                    self::matchStart => 0, self::matchEnd => 18, self::matchName => 'Canvas\Exception\Type\UnDefinedVariable' ],
            [ self::matchString => 'Use of undefined constant',             self::matchStart => 0, self::matchEnd => 25, self::matchName => 'Canvas\Exception\Type\UnDefinedConstant' ],
            [ self::matchString => 'Trying to get property of non-object',  self::matchStart => 0, self::matchEnd => 37, self::matchName => 'Canvas\Exception\Type\PropertyOfNoneObject' ]
          ]
        ],
        E_PARSE             => [ self::name => 'Canvas\Exception\Type\StandardParse',             self::matches => null ],
        E_ERROR             => [ self::name => 'Canvas\Exception\Type\StandardError',             self::matches => null ],
        E_CORE_ERROR        => [ self::name => 'Canvas\Exception\Type\CoreError',                 self::matches => null ],
        E_CORE_WARNING      => [ self::name => 'Canvas\Exception\Type\CoreWarning',               self::matches => null ],
        E_COMPILE_ERROR     => [ self::name => 'Canvas\Exception\Type\CompileError',              self::matches => null ],
        E_COMPILE_WARNING   => [ self::name => 'Canvas\Exception\Type\CompileWarning',            self::matches => null ],
        E_USER_ERROR        => [ self::name => 'Canvas\Exception\Type\UserError',                 self::matches => null ],
        E_USER_WARNING      => [ self::name => 'Canvas\Exception\Type\UserWarning',               self::matches => null ],
        E_USER_NOTICE       => [ self::name => 'Canvas\Exception\Type\UserNotice',                self::matches => null ],
        E_STRICT            => [ self::name => 'Canvas\Exception\Type\Strict',                    self::matches => null ],
        E_RECOVERABLE_ERROR => [ self::name => 'Canvas\Exception\Type\Recoverable',               self::matches => null ],
        E_DEPRECATED        => [ self::name => 'Canvas\Exception\Type\StandardDeprecated',        self::matches => null ],
        E_USER_DEPRECATED   => [ self::name => 'Canvas\Exception\Type\UserDeprecated',            self::matches => null ]
      ];

      /**
       * Handle Exception
       *
       * This method is called to handle an exception it will first check if an exception has matching sub types. These
       * sub typs are sub exceptions of the parent exception that may or may not give the handler the option to throw
       * a more type specific exception.
       *
       * @method  exception
       *
       * @param   int               $severity
       * @param   string            $message
       * @param   string            $file
       * @param   int               $line
       * @param   null|\Exception   $prev
       * @access  public
       * @static
       */
      public static function exception( $severity, $message, $file = __FILE__, $line = __LINE__, $prev = null )
      {
        /** @var string $exceptionName Default the name to the standard exception */
        $exceptionName = self::exceptionName( $severity );
        /** Check if we have a possible better exception to throw */
        if( self::hashMatches( $severity ) ){
          /** @var array $match Loop through the better exceptions and check if any of them make sense */
          foreach( self::$match[$severity][self::matches] as $match ){
            /** Test the exception */
            if( $match[self::matchString] === substr( $message, $match[self::matchStart], $match[self::matchEnd]) ){
              /** @var string $exceptionName We found a match set the exception name to the new exception */
              $exceptionName = $match[self::matchName];
            }
          }
        }
        /** Throw the exception */
        throw new $exceptionName( $message, 0, $severity, $file, $line );
      }

      /**
       * Fatal Exceptions
       *
       * Handle all fatal exceptions
       *
       * @method  fatal
       * @access  public
       * @static
       */
      public static function fatal()
      {

      }

      /**
       * Exception Name
       *
       * Get the matches exception name
       *
       * @method  exceptionName
       * @param   int             $type
       * @return  bool
       * @access  private
       * @static
       */
      private static function exceptionName( $type )
      {
        return self::$match[$type][self::name];
      }

      /**
       * Has Matches
       *
       * Test to see if a type has sub type matches
       *
       * @method  hasMatches
       * @param   int         $type
       * @return  bool
       * @access  private
       * @static
       */
      private static function hashMatches( $type )
      {
        return self::$match[$type][self::matches] !== null;
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
            //self::$instance->constructor();
          }
        }
        /** Return the object instance */
        return self::$instance;
      }
    }
    /** Instantiate the handler so we do not have to worry about it */
    Handle::getInstance();
    /** Set the exception handler */
    set_error_handler( array('Canvas\Exception\Handle', 'exception') );
    /** Set the shutdown function */
    register_shutdown_function( array('Canvas\Exception\Handle', 'fatal') );
  }