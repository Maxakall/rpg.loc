<?php

namespace classes\abstracts;

abstract class BodyTypeAbstract
{
    protected string $name;
    protected string $type;
    protected array $items;
    abstract public function getType():string;
    abstract public function getItems(): array;
    abstract public function setItems(EquipmentAbstract ...$items):void;

}