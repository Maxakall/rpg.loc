<?php

namespace classes\enums;

enum EffectTypesEnum: string {
    case Speed = 'Движение';
    case FireDamage = 'Урон огнём';
    case FireResistance ='Сопротивление огню';
    case IceDamage = 'Урон льдом';
    case IceResistance ='Сопротивление холоду';
    case Attack = 'Атака';
    case Defense = 'Защита';
    case MpRegeneration = 'Регенерация маны';
    case HpRegeneration = 'Регенерация здоровья';
    case NoEffect = 'Нет эффекта';

}
