<?php

namespace classes;

use classes\abstracts\EffectAbstract;
use classes\abstracts\EffectsAbstract;
use classes\enums\EffectTypesEnum;
use classes\traits\SingletonTrait;

class NoEffects extends EffectsAbstract
{
    use SingletonTrait;
    public function setEffects(EffectAbstract ...$effects):void {
    }

    public function setEffect(EffectAbstract $effect): void
    {
    }

    public function getEffects(): array
    {
        return [];
    }

    public function removeEffects(): void
    {
        // TODO: Implement removeEffects() method.
    }
    public function calculateByType(EffectTypesEnum $effect_type):int {
        return 0;
    }

}