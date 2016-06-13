<?php

    namespace Canvas\Editor\Area\Pallet\Editor\Select
    {

        class Option
        {

            const value = 0;

            const text  = 1;

            const style = 2;

            private $collection = [
                self::value => null,
                self::text  => null,
                self::style => null
            ];

            public function __construct( $value, $text, $style = [] )
            {
                $this->setValue( $value );
                $this->setText( $text );
                $this->setStyle( $style );
            }

            public function destruct()
            {
                unset(
                    $this->collection[self::value],
                    $this->collection[self::text],
                    $this->collection
                );
            }
            
            public function value()
            { return $this->collection[self::value]; }

            public function text()
            { return $this->collection[self::text]; }

            public function style()
            { return $this->collection[self::style]; }

            private function setValue( $value )
            { $this->collection[self::value] = $value; }

            private function setText( $text )
            { $this->collection[self::text] = $text; }

            private function setStyle( $styles )
            {
                foreach( $styles as $name => $value ){
                    $this->collection[self::style][$name] = $value;
                }
            }
        }
    }