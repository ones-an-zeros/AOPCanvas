<?php

    namespace Canvas
    {

        abstract class option
        {

            const label = 0;

            const editor = 1;

            const editable = 2;

            private $collection;

            public function __construct()
            {

            }

            public function __destruct()
            {

            }


            protected function setLabel( $label )
            {
                $this->collection[self::label] = $label;
            }

            protected function setEditor( $editor )
            {
                $this->collection[self::editor];
            }
            
            protected function setEditable( $editable )
            {
                $this->collection[self::editable];
            }


            public function getLabel()
            {
                return $this->collection[self::label];
            }

            public function getEditor()
            {
                return $this->collection[self::editor];
            }

            public function getEditable()
            {
                return $this->collection[self::editable];
            }
        }
    }