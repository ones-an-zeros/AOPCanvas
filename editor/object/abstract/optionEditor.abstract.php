<?php

    namespace Canvas
    {

        abstract class OptionEditorAbstract
        {
            protected $type;

            protected $moveAble;

            protected $editor;

            protected $tests;

            public function __construct( $parameters )
            {
                foreach( $parameters as $key => &$value ){
                    if( property_exists( $this, $key ) ){
                        $this->{$key} = $value;
                    }
                }
            }

            public function __destruct()
            {

            }

            /** ************************************************************* */
            /**                             TESTS                             */
            /** ************************************************************* */

            public function isMoveAble()
            {
                return $this->moveAble;
            }

            public function inputIsValid()
            {
                $messages = [];

                if( !is_array( $this->tests ) || sizeof( $this->tests ) === 0 ){
                    return true;
                }

                foreach( $this->tests as $method ){

                    $result = $this->{$method}();

                    if( !$result['outcome'] ){
                        $messages[] = [
                            'element' => $result['element'],
                            'message' => $result['message']
                        ];
                    }
                }

                return [
                    'outcome' => sizeof($messages) === 0 ? false : true,
                    'messages' => $messages
                ];
            }

            /** ************************************************************* */
            /**                            GETTERS                            */
            /** ************************************************************* */

            public function getType()
            {
                return $this->type;
            }

            public function getMoveAble()
            {
                return $this->moveAble;
            }

            public function getEditor()
            {
                return $this->editor;
            }

            public function getTests()
            {
                return $this->tests;
            }

            /** ************************************************************* */
            /**                            SETTERS                            */
            /** ************************************************************* */

            protected function setType( $type )
            {
                $this->type = $type;
            }

            protected function setMoveAble( $moveAble )
            {
                $this->moveAble = $moveAble;
            }

            protected function setEditor( $editor )
            {
                $this->editor = $editor;
            }

            protected function setTests( $tests )
            {
                $this->tests = $tests;
            }
        }
    }