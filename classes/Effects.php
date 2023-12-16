<?php

namespace classes;

use classes\abstracts\EffectAbstract;
use classes\abstracts\EffectsAbstract;
use classes\enums\EffectTypesEnum;

class Effects extends EffectsAbstract
{

    public function __construct(EffectAbstract ...$effect)
    {
        $this->setEffects(...$effect);
    }
    public function setEffects(EffectAbstract ...$effects):void {
        if(empty($effects)) {
            $this->setEffect(NoEffect::getInstance());
        }
        else
        {
            foreach ($effects as $effect) {
                $this->setEffect($effect);
            }
        }
    }

    public function setEffect(EffectAbstract $effect): void
    {
        $this->effects[$effect->getEffectType()->name][] = $effect;
    }

    public function getEffects(): array
    {
        return $this->effects;
    }

    public function getEffectsByType(EffectTypesEnum $effect_type): array
    {
        return $this->effects[$effect_type->name] ?? [];
    }

    public function removeEffects(): void
    {
        // TODO: Implement removeEffects() method.
    }
    public function calculateByType(EffectTypesEnum $effect_type):int {
        $effect_value = 0;
        foreach ($this->getEffectsByType($effect_type) as $effect) {
            $effect_value += $effect->getValue();
        }
        return $effect_value;
    }

}