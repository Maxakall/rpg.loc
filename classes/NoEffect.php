<?php

namespace classes;

use classes\abstracts\EffectAbstract;
use classes\enums\EffectTypesEnum;
use classes\traits\SingletonTrait;

class NoEffect extends EffectAbstract
{
    use SingletonTrait;

    public function getEffectType():EffectTypesEnum
    {
        return EffectTypesEnum::NoEffect;
    }
}