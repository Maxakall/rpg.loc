<?php

namespace classes;

class Type {
    public string $title;
    public string $type_modificator;

    public function __construct($title, $type_modificator)
    {
        $this->title = $title;
        $this->type_modificator = $type_modificator;
    }
}