<?php

namespace classes\interfaces;

use classes\enums\bodyTypesEnum;

interface LockingInterface
{
// Функция блокировки частей тела
    public function setLocking(BodyTypesEnum ...$bodyType):void;
// Функция разблокировки частей тела
    public function getLocking():array;
}