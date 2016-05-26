<?php
    /**
     * Editor
     *
     * This is the editor for the canvas program
     *
     * @package canvas
     * @version 1.0.0
     * @author Corey Rosamond <corey@ones-n-zeros.com>
     */

    namespace Canvas\Editor\Editors
    {

        class Editor
        {

            protected $key;

            protected $label;

            protected $buttonText;

            protected $container = '<div id="%s">%s%s</div>';

            protected $button = '<button id="%s" name="%s">%s</button>';

            protected $parts = [];

            protected $partClasses = [
              0 => 'textInput'
            ];


            public function __construct( $parameters )
            {
                $this->key = $parameters['key'];

                $this->label = $parameters['label'];

                $this->buttonText = $parameters['buttonText'];

                foreach( $parameters['parts'] as $editorData ){
                    $editorClass = $this->partClasses[$editorData['partKey']];
                    $this->parts[] = new $editorClass();
                }
            }

            public function __destruct()
            {
                unset(
                    $this->key,
                    $this->label,
                    $this->buttonText,
                    $this->container,
                    $this->button,
                    $this->parts,
                    $this->partClasses
                );
            }

            public function getEditor()
            {
                /** @var string $content The editor content */
                $content = '';
                /** Loop through all the editor parts */
                foreach( $this->parts as $part ){
                    /** Append the editor parts the the content */
                    $content .= $part->getEditor();
                }
                /** @var string $button The populated code for the button */
                $button = sprintf(
                    $this->button,
                    $this->buttonIDString(),
                    $this->buttonNameString(),
                    $this->buttonText
                );
                /** Return the populated editor */
                return sprintf(
                    $this->container,
                    $this->editorIDString(),
                    $content,
                    $button
                );
            }


            private function editorIDString()
            {
                return "Editor:{$this->key}";
            }

            private function buttonIDString()
            {
                return "EditorButton:{$this->key}";
            }

            private function buttonNameString()
            {
                return "EditorButton:{$this->key}";
            }
        }
    }