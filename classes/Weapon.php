<?php

namespace classes;

use classes\abstracts\EquipmentAbstract;
use classes\abstracts\EffectsAbstract;
use classes\enums\bodyTypesEnum;


class Weapon extends EquipmentAbstract
{
    public function __construct($name, BodyTypesEnum $type, $defense, $attack, Effects|null $effects = null, BodyTypesEnum|null ...$locking)
    {
        $this->name = $name;
        $this->type = $type;
        $this->defense = $defense;
        $this->attack = $attack;
        $this->setEffects($effects);
        $this->setLocking(...$locking);
    }

    function getAttack(): int
    {
        return $this->attack;
    }

    function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return BodyTypesEnum
     */
    public function getType(): BodyTypesEnum
    {
        return $this->type;
    }

    public function setLocking(bodyTypesEnum ...$locking): void
    {
        $this->locking = empty($locking) ? [bodyTypesEnum::NoBody] : $locking;
    }

    public function getLocking(): array
    {
        // TODO: Implement setUnlock() method.
    }

    public function setEffects(?Effects $effects): void
    {
        $this->effects = $effects ?? new Effects(NoEffect::getInstance());
    }

    public function getEffects(): EffectsAbstract
    {
        return $this->effects;
    }
}