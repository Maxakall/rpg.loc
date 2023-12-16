<?php

namespace classes;

use classes\abstracts\EffectAbstract;
use classes\enums\activationEventEnum;
use classes\enums\EffectTypesEnum;

class Effect extends EffectAbstract
{
    /**
     * @return int
     */
    public function getActionTime(): int
    {
        return $this->action_time;
    }

    /**
     * @param int $action_time
     */
    public function setActionTime(int $action_time): void
    {
        $this->action_time = $action_time;
    }

    /**
     * @return activationEventEnum
     */
    public function getActivationEvent(): activationEventEnum
    {
        return $this->activation_event;
    }

    /**
     * @param activationEventEnum $activation_event
     */
    public function setActivationEvent(activationEventEnum $activation_event): void
    {
        $this->activation_event = $activation_event;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     */
    public function setDistance(int $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return EffectTypesEnum
     */
    public function getEffectType(): EffectTypesEnum
    {
        return $this->effect_type;
    }

    /**
     * @param EffectTypesEnum $effect_type
     */
    public function setEffectType(EffectTypesEnum $effect_type): void
    {
        $this->effect_type = $effect_type;
    }

    /**
     * @return int
     */
    public function getExpirationTime(): int
    {
        return $this->expiration_time;
    }

    /**
     * @param int $expiration_time
     */
    public function setExpirationTime(int $expiration_time): void
    {
        $this->expiration_time = $expiration_time;
    }

    /**
     * @return bool
     */
    public function isAccumulative(): bool
    {
        return $this->is_accumulative;
    }

    /**
     * @param bool $is_accumulative
     */
    public function setIsAccumulative(bool $is_accumulative): void
    {
        $this->is_accumulative = $is_accumulative;
    }

    /**
     * @return bool
     */
    public function isFriendly(): bool
    {
        return $this->is_friendly;
    }

    /**
     * @param bool $is_friendly
     */
    public function setIsFriendly(bool $is_friendly): void
    {
        $this->is_friendly = $is_friendly;
    }

    /**
     * @return bool
     */
    public function isPercent(): bool
    {
        return $this->is_percent;
    }

    /**
     * @param bool $is_percent
     */
    public function setIsPercent(bool $is_percent): void
    {
        $this->is_percent = $is_percent;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    /**
     * @param EffectTypesEnum $effect
     * @param activationEventEnum $activation_event
     * @param int $value
     * @param bool $is_percent
     * @param int $distance
     * @param bool $is_friendly
     * @param bool $is_accumulative
     * @param int $expiration_time
     * @param int $action_time
     */
    public function __construct(EffectTypesEnum     $effect_type,
                                ActivationEventEnum $activation_event,
                                int                 $value,
                                bool                $is_percent,
                                int                 $distance,
                                bool                $is_friendly,
                                bool                $is_accumulative,
                                int                 $expiration_time,
                                int                 $action_time,
    )
    {
        $this->effect_type = $effect_type;
        $this->activation_event = $activation_event;
        $this->value = $value;
        $this->is_percent = $is_percent;
        $this->distance = $distance;
        $this->is_friendly = $is_friendly;
        $this->is_accumulative = $is_accumulative;
        $this->expiration_time = $expiration_time;
        $this->action_time = $action_time;
    }

}