<?php

  namespace Canvas\Configuration\Object\Layout
  {

    class Element
    {

      const id      = 0;

      const text    = 0;

      private $collection = [
        self::id    => null,
        self::text  => null
      ];

      public function __construct( $id, $text )
      {
        $this->setId( $id );
        $this->setText( $text );
      }

      public function __destruct()
      {
        unset(
          $this->collection[self::id],
          $this->collection[self::text],
          $this->collection
        );
      }

      public function id()
      { return $this->collection[self::id]; }

      public function text()
      { return $this->collection[self::text]; }

      private function setId( $id )
      { $this->collection[self::id] = $id; }

      private function setText( $text )
      { $this->collection[self::text] = $text; }
    }
  }
