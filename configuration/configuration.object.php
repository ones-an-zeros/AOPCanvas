<?php

  namespace Canvas\Configuration
  {

    include_once('abstract' . DIRECTORY_SEPARATOR . 'configuration.abstract.php' );

    include_once('object' . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . 'element.object.php' );

    include_once('object' . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR .'collection.object.php' );

    include_once('object' . DIRECTORY_SEPARATOR . 'fileInclude.object.php' );

    include_once('object' . DIRECTORY_SEPARATOR . 'option.object.php' );

    include_once('object' . DIRECTORY_SEPARATOR . 'layout.object.php' );

    include_once('object' . DIRECTORY_SEPARATOR . 'constant.object.php' );


    use Canvas\Configuration\Object\FileInclude;
    use Canvas\Configuration\Object\Option;
    use Canvas\Configuration\Object\Layout;
    use Canvas\Configuration\Object\Constant;

    class Configuration
    {

      const fileInclude   = 0;

      const option        = 1;

      const layout        = 2;

      const constant      = 3;


      private $collection = [
        self::fileInclude   => null,
        self::option        => null,
        self::layout        => null,
        self::constant      => null
      ];

      private static function constructor()
      {

        $instance = self::getInstance();

        $instance->constructFileInclude();

        $instance->constructOption();

        $instance->constructLayout();

        $instance->constructConstant();
      }

      public function option()
      { return $this->collection[self::option]; }

      public function layout()
      { return $this->collection[self::layout]; }

      public function constant()
      { return $this->collection[self::constant]; }


      private function constructFileInclude()
      { $this->collection[self::fileInclude] = FileInclude::getInstance(); }

      private function constructOption()
      { $this->collection[self::option] = Option::getInstance(); }

      private function constructLayout()
      { $this->collection[self::layout] = Layout::getInstance(); }

      private function constructConstant()
      { $this->collection[self::constant] = Constant::getInstance(); }

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

