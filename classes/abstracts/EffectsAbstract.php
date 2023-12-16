<?php

namespace classes\abstracts;

use classes\enums\EffectTypesEnum;

abstract class EffectsAbstract
{
    protected array $effects;
    abstract public function setEffects(EffectAbstract ...$effect):void;
    abstract public function setEffect(EffectAbstract $effect):void;
    abstract public function getEffects():array;
    abstract public function removeEffects():void;
    abstract public function calculateByType(EffectTypesEnum $effect_type):int;

}