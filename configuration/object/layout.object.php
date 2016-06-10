<?php

  namespace Canvas\Configuration\Object
  {

    use Canvas\Configuration\Object\Layout\Collection;

    class Layout extends Configuration
    {
      
      const container = 0;

      const title     = 1;

      const canvas    = 2;

      const pallet    = 3;

      const control   = 4;


      private $collection = [
        self::container => null,
        self::title     => null,
        self::canvas    => null,
        self::pallet    => null,
        self::control   => null
      ];

      protected static $dataFile = "layout.configuration.json";


      protected static function constructor()
      {
        $instance = self::getInstance();
        parent::constructor( $instance );
        $instance->processData( $instance->parseDataFile( self::$dataFile ) );
      }

      private function processData( $data )
      {
        $this->setContainer( $data->container );
        $this->setTitle( $data->title );
        $this->setCanvas( $data->canvas );
        $this->setPallet( $data->pallet );
        $this->setControl( $data->control );
      }

      private function setContainer( $data )
      {
        $this->collection[self::container] = new Collection( $this->getId( $data ), $this->getText( $data ) );
        $this->generateChildren( self::container, $data );
      }

      private function setTitle( $data )
      {
        $this->collection[self::title] = new Collection( $this->getId( $data ), $this->getText( $data ) );
        $this->generateChildren( self::title, $data );
      }

      private function setCanvas( $data )
      {
        $this->collection[self::canvas] = new Collection( $this->getId( $data ), $this->getText( $data ) );
        $this->generateChildren( self::canvas, $data );
      }

      private function setPallet( $data )
      {
        $this->collection[self::pallet] = new Collection( $this->getId( $data ), $this->getText( $data ) );
        $this->generateChildren( self::pallet, $data );
      }

      private function setControl( $data )
      {
        $this->collection[self::control] = new Collection( $this->getId( $data ), $this->getText( $data ) );
        $this->generateChildren( self::control, $data );
      }

      private function getId( $object )
      {
        if( isset( $object->id ) ){
          return $object->id;
        }
        return null;
      }

      private function getText( $object )
      {
        if( isset( $object->text ) ){
          return $object->text;
        }
        return null;
      }

      private function generateChildren( $selector, $data )
      {
        if( isset( $data->children )){
          foreach( $data->children as $name => $child ){
            $this->collection[$selector]->addChild(
              $name,
              $this->getId( $child ),
              $this->getText( $child )
            );
          }
        }
      }

      public function container()
      { return $this->collection[self::container]; }

      public function title()
      { return $this->collection[self::title]; }

      public function canvas()
      { return $this->collection[self::canvas]; }

      public function pallet()
      { return $this->collection[self::pallet]; }

      public function control()
      { return $this->collection[self::control]; }



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