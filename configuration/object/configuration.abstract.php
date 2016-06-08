<?php

    namespace Canvas\Configuration\Object
    {

        abstract class Configuration
        {
            protected $dataDirectory = null;
            
            protected static function constructor( $instance )
            {
                $instance->dataDirectory = substr( __DIR__, 0, -6 ).'data'.DIRECTORY_SEPARATOR;
            }

            protected function parseDataFile( $dataFile )
            { return json_decode( file_get_contents( $this->dataDirectory.$dataFile ) ); }
        }
    }