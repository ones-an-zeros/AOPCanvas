<?php

    namespace Canvas
    {

        class EditorPartAbstract
        {
            protected $editorKey;

            protected $partKey;

            protected $html;

            protected $default;

            protected $id;

            protected $name;

            protected $placeholder;

            protected $testValues;

            protected $testMessages;

            /** ************************************************************* */
            /**                            GETTERS                            */
            /** ************************************************************* */

            public function getEditorKey()
            {
                return $this->editorKey;
            }

            public function getPartKey()
            {
                return $this->partKey;
            }

            public function getHTML()
            {
                return $this->html;
            }

            public function getID()
            {
                return $this->id;
            }

            public function getName()
            {
                return $this->name;
            }

            public function getPlaceholder()
            {
                return $this->placeholder;
            }

            public function getTestValues()
            {
                return $this->testValues;
            }

            public function getMessages()
            {
                return $this->testMessages;
            }

            /** ************************************************************* */
            /**                            SETTERS                            */
            /** ************************************************************* */

            protected function setEditorKey( $key )
            {
                $this->editorKey = $key;
            }

            protected function setPartKey( $key )
            {
                $this->partKey = $key;
            }

            protected function setHTML( $html )
            {
                $this->html = $html;
            }

            protected function setID(){
                $this->id = "{$this->getEditorKey()}:{$this->getPartKey()}";
            }

            protected function setName()
            {
                $this->name = "{$this->getEditorKey()}:{$this->getPartKey()}";
            }

            protected function setPlaceholder( $placeholder )
            {
                $this->placeholder = $placeholder;
            }

            protected function setTestValues( $values )
            {
                $this->testValues = $values;
            }

            protected function setMessages( $messages )
            {
                $this->testMessages = $messages;
            }
        }
    }