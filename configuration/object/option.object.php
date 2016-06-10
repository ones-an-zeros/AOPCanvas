<?php

    namespace Canvas\Configuration\Object
    {

        class Option extends Configuration
        {

            const developmentMode = 0;

            private $legend = [
                self::developmentMode => 'developmentMode'
            ];

            private $collection = [
                self::developmentMode => false
            ];

            protected static $dataFile = "option.configuration.json";


            protected static function constructor()
            {
                $instance = self::getInstance();
                parent::constructor( $instance );
                $instance->processData( $instance->parseDataFile( self::$dataFile ) );
            }

            private function processData( $data )
            {
                foreach( $this->legend as $key => $value ){
                    if( isset($data->{$value}) ){
                        $this->setValue( $key, $value );
                    }
                }
            }

            private function setValue( $key, $value )
            {
                switch( $key ){
                    case self::developmentMode: $this->setDevelopmentMode( $value ); break;
                }
            }

            public function developmentMode()
            { return $this->collection[self::developmentMode]; }


            private function setDevelopmentMode( $developmentMode )
            { $this->collection[self::developmentMode] = $developmentMode; }

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