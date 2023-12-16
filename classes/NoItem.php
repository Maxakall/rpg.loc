<?php

namespace classes;

use classes\abstracts\EffectsAbstract;
use classes\abstracts\EquipmentAbstract;
use classes\enums\bodyTypesEnum;
use classes\traits\SingletonTrait;

class NoItem extends EquipmentAbstract
{
    use SingletonTrait;

    function getAttack(): int
    {
        return 0;
    }

    function getDefense(): int
    {
        return 0;
    }

    function getName(): string
    {
        return '';
    }

    function getType(): BodyTypesEnum
    {
        return BodyTypesEnum::AnyBody;
    }

    public function setLocking(bodyTypesEnum ...$bodyType): void
    {
        // TODO: Implement setLock() method.
    }

    public function getLocking(): array
    {
        // TODO: Implement setUnlock() method.
        return [];
    }

    function setEffects(?Effects $effects): void
    {
        // TODO: Implement setEffects() method.
    }

    function getEffects(): EffectsAbstract
    {
        return NoEffects::getInstance();
    }
}