<?php

  namespace Canvas\Editor\Area\Pallet\Editor
  {

    use Canvas\Editor\Area\Pallet\Editor\Select\Option;

    class Select extends PartAbstract implements PartInterface
    {

      const selectHTML    = 0;

      const optionHTML    = 1;

      const label         = 2;

      const placeholder   = 3;

      const options       = 4;


      private $collection = [
        self::selectHTML  => '<select id="%s">%s</select>',
        self::optionHTML  => '<option%s value="%s">%s</option>',
        self::label       => null,
        self::placeholder => null,
        self::options     => []
      ];


      public function __construct( $data )
      {
        $this->setLabel( $data->label );

        $this->setPlaceholder( $data->placeholder) ;

        $this->constructOptions( $data->options );

        $this->constructAction( $data->action );




        $this->constructTest( $data );
      }

      public function __destruct()
      {

      }

      public function render()
      { return $this->renderContainer($this->renderLabel().$this->renderSelect ()); }

      private function renderSelect()
      {
        return sprintf(
          $this->collection[self::selectHTML],
          "",
          $this->renderOptions ()
        );
      }

      private function renderOptions()
      {
        $html = sprintf ($this->collection[self::optionHTML], null, null, $this->collection[self::placeholder]);
        foreach ($this->collection[self::options] as $option) {
          $html .= sprintf (
            $this->collection[self::optionHTML],
            $this->renderStyle ($option->style ()),
            $option->value (),
            $option->text ()
          );
        }
        return $html;
      }

      private function setPlaceholder($placeholder)
      { $this->collection[self::placeholder] = $placeholder; }


      private function constructOptions($data)
      {
        foreach ($data as $option) {
          $this->collection[self::options][] = new Option(
            $option->value,
            $option->text,
            isset($option->style) ? $option->style : []
          );
        }
      }
    }
  }