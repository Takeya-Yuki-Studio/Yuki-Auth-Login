<?php

class dbpara
{
    public $type;
    public $value;

    function __construct($type, $value)
    {
        $this->type = $type;
        $this->value = $value;
    }
}