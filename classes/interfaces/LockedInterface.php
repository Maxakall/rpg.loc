<?php

namespace classes\interfaces;

// Интерфейс для блокировки частей тела, к примеру персонаж потерял руку, взял двуручное оружие или получил проклятие,
// и часть его тела теперь не может использовать предметы или снимать их с себя.
interface LockedInterface
{
    public function getLocked():LockingInterface|bool;

}