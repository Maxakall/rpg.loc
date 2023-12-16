<?php

namespace classes\abstracts;

use classes\Effects;
use classes\enums;
use classes\enums\bodyTypesEnum;
use classes\interfaces\LockingInterface;

/**
 * TODO: Нужно привязать предмет к юниту, либо к инвентарю юнита, либо к координатам на карте.
 * Если предмет не у персонажа, то должен быть шанс дропа этого предмета после смерти юнита.
 * Так же предмет может занимать как одну часть тела, так и несколько.
 * Важно, что несколько предметов могут быть одеты на на одну часть тела: в руку можно взять меч и одеть кольцо.
 * Нужно проверить куда присваивается предмет, если шлем одевают на руку, он должен попадать в инвентарь.
 */

abstract class EquipmentAbstract implements LockingInterface
{
    protected string $name;
    protected BodyTypesEnum $type;
    protected int $defense;
    protected int $attack;
    protected Effects $effects;
    protected array $locking=[];

    abstract function getAttack(): int;
    abstract function getDefense(): int;
    abstract function getName(): string;
    abstract function setEffects(Effects|null $effects): void;
    abstract function getEffects(): EffectsAbstract;
    abstract function getType(): BodyTypesEnum;

}