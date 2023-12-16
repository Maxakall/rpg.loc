<?php

namespace classes;

class Body {
    protected array $types;

    public function addBodyType(BodyType $bodyType):void
    {
        $this->types[$bodyType->getType()] = $bodyType;
    }

    public function getBodyTypes():array {
        return $this->types;
    }

}