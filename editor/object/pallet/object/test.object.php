<?php

  namespace Canvas\Editor\Area\Pallet
  {

    class Test
    {
      const value         = 0;

      const message       = 1;

      private $collection = [
        self::value       => null,
        self::message     => null
      ];

      private $testHTML   = '<span class="editor-test" style="visibility: hidden;display: none;">{"value": %s, "message": %s}</span>';

      public function __construct( $values, $messages )
      {
        $this->collection[self::value]  = $this->constructValue( $values );
        $this->collection[self::message]= $this->constructMessage( $messages );
      }

      public function __destruct()
      {

      }

      public function render()
      {
        return sprintf(
          $this->testHTML,
          json_encode($this->collection[self::value]),
          json_encode($this->collection[self::message])
        );
      }

      private function value( $key = 0 )
      { return $this->collection[self::value][$key]; }

      private function message( $key = 0 )
      { return $this->collection[self::message][$key]; }

      private function setValue( $value, $key = 0 )
      { $this->collection[self::value][$key] = $value; }

      private function setMessage( $value, $key = 0 )
      { $this->collection[self::message][$key] = $value; }

      private function constructValue( $values )
      {
        $return = [];
        if(!count( $values )){ return $return; }
        foreach( $values as $key => $value ){
          $return[$key] = $value;
        }
        return $return;
      }

      private function constructMessage( $messages )
      {
        $return = [];
        if(!count( $messages )){ return $return; }
        foreach( $messages as $key => $value ){
          $return[$key] = $value;
        }
        return $return;
      }
    }
  }