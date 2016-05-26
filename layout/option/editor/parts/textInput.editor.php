<?php

    namespace Canvas
    {

        class textArea
        {

            protected $html = '<input type="text" id="%s" name="%s" placeholder="%s" />';

            protected $default;

            protected $id;

            protected $name;

            protected $placeholder;

            protected $minLength;

            protected $minLengthMessage;

            protected $maxLength;

            protected $maxLengthMessage;

            public function isValid( $value )
            {
                $messages = [];

                if( !is_null( $this->minLength ) && strlen( $value ) >= $this->minLength ){
                    $messages[] = $this->minLengthMessage;
                }

                if( !is_null( $this->maxLength ) && strlen( $value ) <= $this->maxLength ){
                    $messages[] = $this->maxLengthMessage;
                }

                return [
                    'outcome' => sizeof( $messages ) === 0 ? false : true,
                    'messages' => $messages
                ];
            }

            public function getEditor()
            {
                return sprintf(
                    $this->html,
                    $this->id,
                    $this->name,
                    $this->placeholder
                );
            }



        }
    }