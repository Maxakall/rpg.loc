<?php

namespace classes;

use classes\enums\EffectTypesEnum;

class Spirit
{

    public Type $type;
    public Race $race;
    public int $attack;
    public int $defense;
    public string $name;
    public string $stats;
    public string $behavior;
    public Body $body;

    public function __construct(Type $type, Race $race, $name, $stats, $behavior, Body $body)
    {
        $this->type = $type;
        $this->race = $race;
        $this->name = $name;
        $this->stats = $stats;
        $this->behavior = $behavior;
        $this->body = $body;
        $this->calculate();
    }

    public function calculate(): void
    {
        $this->attack = 0;
        $this->defense = 0;
        foreach ($this->body->getBodyTypes() as $bodyType) {
            $items = $bodyType->getItems();
            foreach ($items as $item) {
                $this->attack += $item->getAttack()+$item->getEffects()->calculateByType(EffectTypesEnum::Attack);
                $this->defense += $item->getDefense()+$item->getEffects()->calculateByType(EffectTypesEnum::Defense);
//                $this->attack += $item->getAttack()+$item->getEffects()->calculateByType(EffectTypesEnum::Attack);
//                $this->defense += $item->getDefense()+$item->getEffects()->calculateByType(EffectTypesEnum::Defense);
            }
        }

    }
}