<?php

    namespace Canvas\Editor\Area\Canvas {

        class Key
        {

            const group = 0;

            const editor = 1;


            private $collection = [
                self::group => null,
                self::editor => null
            ];

            public function __construct( $group, $editor )
            {
                $this->setGroup( $group );
                $this->setEditor( $editor );
            }

            public function __destruct()
            {
                unset(
                    $this->collection[self::group],
                    $this->collection[self::editor],
                    $this->collection
                );
            }

            public function editableID()
            { return "editable:{$this->group()}:{$this->editor()}"; }


            private function group()
            { return $this->collection[self::group]; }

            private function editor()
            { return $this->collection[self::editor]; }


            private function setGroup( $group )
            { $this->collection[self::group] = $group; }

            private function setEditor( $editor )
            { $this->collection[self::editor] = $editor; }
        }
    }