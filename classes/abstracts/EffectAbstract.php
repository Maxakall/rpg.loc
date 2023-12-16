<?php

namespace classes\abstracts;

use classes\enums\ActivationEventEnum;
use classes\enums\EffectTypesEnum;

abstract class EffectAbstract
{
    protected EffectTypesEnum $effect_type;
    protected activationEventEnum $activation_event; // Условие активации
    protected int $value;
    protected bool $is_percent; //true: в процентах; false: в числах;
    protected int $distance; //0 - на себя; 1+ на окружение;
    protected bool $is_friendly; //true: на себя и союзников; false: на остальных;
    protected bool $is_accumulative; //true: стыкуется с себе подобными; false: берётся наибольшее значение;
    protected int $expiration_time; // Время жизни эффекта в единицах времени;
    protected int $action_time; // Время действия;
    abstract public function getEffectType():EffectTypesEnum;

}