<?php
namespace classes\enums;

enum BodyTypesEnum: string {
    case Head = 'Голова';
    case LeftHand = 'Левая рука';
    case RightHand = 'Правая Рука';
    case Body = 'Тело';
    case Legs = 'Ноги';
    case Feets = 'Ступни';
    case Inventory = 'Инвентарь';
    case AnyBody = 'Любая часть тела';
    case NoBody = 'Пусто';

}
