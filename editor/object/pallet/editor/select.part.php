<?php

  namespace Canvas\Editor\Area\Pallet\Editor
  {

    use Canvas\Editor\Area\Pallet\Editor\Select\Option;
    use Canvas\Editor\Area\Pallet\Action;

    class Select extends PartAbstract implements PartInterface
    {
      const containerHTML   = 0;

      const selectHTML      = 1;

      const optionHTML      = 2;

      const label           = 3;

      const placeholder     = 4;

      const options         = 5;

      const action          = 6;


      private $collection = [
        self::containerHTML   => '<span class="action-data" %s>%s</span>',
        self::selectHTML      => '<select id="%s">%s</select>',
        self::optionHTML      => '<option%s value="%s">%s</option>',
        self::label           => null,
        self::placeholder     => null,
        self::options         => [],
        self::action          => null
      ];


      public function __construct( $data )
      {
        $this->setLabel( $data->label );
        $this->setPlaceholder( $data->placeholder );
        $this->constructOptions( $data->options );
        $this->constructAction( $data->action );
      }

      public function __destruct()
      {

      }

      public function render()
      {
        return sprintf(
            $this->collection[self::containerHTML],
            $this->collection[self::action]->render(),
            $this->renderLabel().$this->renderSelect()

        );
      }

      private function renderSelect()
      {
        return sprintf(
            $this->collection[self::selectHTML],
            "",
            $this->renderOptions()
        );
      }

      private function renderOptions()
      {
        $html = sprintf($this->collection[self::optionHTML], null, null, $this->collection[self::placeholder]);
        foreach( $this->collection[self::options] as $option ){
          $html .= sprintf(
              $this->collection[self::optionHTML],
              $this->renderStyle( $option->style() ),
              $option->value(),
              $option->text()
          );
        }
        return $html;
      }



      private function setPlaceholder( $placeholder )
      { $this->collection[self::placeholder] = $placeholder; }


      private function constructOptions( $data )
      {
        foreach( $data as $option ){
          $this->collection[self::options][] = new Option(
              $option->value,
              $option->text,
              isset( $option->style )?$option->style:[]
          );
        }
      }

      private function constructAction( $data )
      {
        $this->collection[self::action] = new Action(
            $data->type,
            $data->target,
            $data->attribute
        );
      }
    }
  }