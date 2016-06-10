<?php

    namespace Canvas\Editor\Area\Pallet
    {

        class Action
        {

            const type      = 0;

            const target    = 1;

            const attribute = 2;

            private $collection = [
                self::type      => null,
                self::target    => null,
                self::attribute => null
            ];

            private $legend = [
                self::type      => 'canvas:action:type',
                self::target    => 'canvas:action:target',
                self::attribute => 'canvas:action:attribute'
            ];



            public function __construct( $type, $target, $attribute )
            {
                $this->setType( $type );
                $this->setTarget( $target );
                $this->setAttribute( $attribute );
            }

            public function __destruct()
            {

            }

            public function render()
            {
                $attributes = '';
                foreach( $this->collection as $key => $value ){
                    $attributes .= $this->legend[$key].'="'.$value.'"';
                }
                return $attributes;
            }

            public function type()
            { return $this->collection[self::type]; }

            public function target()
            { return $this->collection[self::target]; }

            public function attribute()
            { return $this->collection[self::attribute]; }

            private function setType( $type )
            { $this->collection[self::type] = $type; }

            private function setTarget( $target )
            { $this->collection[self::target] = $target; }

            private function setAttribute( $attribute )
            { $this->collection[self::attribute] = $attribute; }
        }

    }