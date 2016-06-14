<?php

  namespace Canvas\Editor\Area\Pallet
  {

    class Action
    {
      const type      = 0;

      const target    = 1;

      const attribute = 2;

      const data      = 3;

      private $collection = [
        self::type      => null,
        self::target    => null,
        self::attribute => null,
        self::data      => null
      ];

      private $legend = [
        self::type      => 'type',
        self::target    => 'target',
        self::attribute => 'attribute',
        self::data      => 'data'
      ];

      private $actionHTML   = '<span class="editor-action" style="visibility: hidden;display: none;">%s</span>';


      public function __construct( $type, $target, $attribute, $data )
      {
        $this->setType( $type );
        $this->setTarget( $target );
        $this->setAttribute( $attribute );
        $this->setData( $data );
      }

      public function __destruct()
      {

      }

      public function render()
      {
        $json = "{";
        foreach( $this->collection as $key => $value ){
          /** Set the label */
          $json .= '"'.$this->legend[$key].'": ';
          /** Check if the value is an array */
          if(is_array($value)){
            /** Append starting array indicator */
            $arrayString = ' [';
            /** Loop over the array contents */
            foreach($value as $part){
              /** Encapsulate the part and add it to the string */
              $arrayString .= '"'.$part.'",';
            }
            /** Strip the last comma append ending array indicator and append to json */
            $json .= substr( $arrayString, 0, -1 )." ],";
          } else {
            /** If the value is not an array encapsulate it and append */
            $json .= '"' . $value . '",';
          }
        }
        $json = substr( $json, 0, -1 )."}";
        return sprintf( $this->actionHTML, $json );
      }

      public function type()
      { return $this->collection[self::type]; }

      public function target()
      { return $this->collection[self::target]; }

      public function attribute()
      { return $this->collection[self::attribute]; }

      public function data()
      { return $this->collection[self::data]; }

      private function setType( $type )
      { $this->collection[self::type] = $type; }

      private function setTarget( $target )
      { $this->collection[self::target] = $target; }

      private function setAttribute( $attribute )
      { $this->collection[self::attribute] = $attribute; }

      private function setData( $data )
      { $this->collection[self::data] = $data; }
    }
  }