<?php

  namespace Canvas\Configuration\Object\Layout
  {

    class Collection
    {

      private $main = null;

      private $children = [];

      public function __construct( $id, $text )
      {
        $this->main = new Element( $id, $text );
      }

      public function __destruct()
      {
        unset(
          $this->main,
          $this->children
        );
      }

      public function id( $selector = null )
      {
        $element = $this->selector( $selector );
        if( $element === null ){
          return "ID not set!";
        }
        return $element->id();
      }

      public function text( $selector = null )
      {
        $element = $this->selector( $selector );
        if( $element === null ){
          return "Text not set!";
        }
        return $element->text();
      }

      public function addChild( $name, $id, $text )
      {
        $this->children[$name] = new Element( $id, $text );
      }

      private function selector( $name )
      {
        if( $name === null ){
          return $this->main;
        }
        if( array_key_exists( $this->children, $name) ){
          return $this->children[$name];
        }
        return false;
      }
    }
  }
