<?php

namespace classes;

use classes\abstracts\BodyTypeAbstract;
use classes\abstracts\EquipmentAbstract;
use classes\enums\bodyTypesEnum;
use classes\interfaces\LockedInterface;
use classes\interfaces\LockingInterface;

class BodyType extends BodyTypeAbstract implements LockedInterface {

    public function __construct(BodyTypesEnum $type, EquipmentAbstract|null ...$items)
    {
        $this->name = $type->value;
        $this->type = $type->name;
        $this->setItems(...$items);
    }

    public function getType():string
    {
        return $this->type;
    }

    public function getItems(): array
    {
        return $this->items;
    }
    public function setItems(EquipmentAbstract ...$items): void
    {
        $this->items = empty($items)?[NoItem::getInstance()]:$items;
    }

    public function getLocked(): LockingInterface|bool
    {
        // TODO: Implement getLocked() method.
        return false;
    }
}